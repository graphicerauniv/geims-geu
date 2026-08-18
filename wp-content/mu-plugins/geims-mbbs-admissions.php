<?php
/**
 * GEIMS MBBS landing-page admissions API.
 *
 * Uses WordPress' configured wp_mail() transport (WP Mail SMTP in production)
 * and stores enquiries in a dedicated table.
 */

defined( 'ABSPATH' ) || exit;

const GEIMS_MBBS_TABLE_VERSION = '1.1';
// Existing MBBS Contact Form 7 form. Change this ID if a separate CF7 form is created.
const GEIMS_MBBS_CF7_FORM_ID = 7394;

function geims_mbbs_table_name() {
	global $wpdb;
	return $wpdb->prefix . 'mbbs_admissions';
}

function geims_mbbs_ensure_table() {
	if ( get_option( 'geims_mbbs_table_version' ) === GEIMS_MBBS_TABLE_VERSION ) {
		return;
	}

	global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	$table_name      = geims_mbbs_table_name();
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		full_name varchar(190) NOT NULL,
		email varchar(190) NOT NULL,
		country_code varchar(10) NOT NULL,
		phone varchar(30) NOT NULL,
		neet_score varchar(20) NULL,
		utm_source varchar(190) NULL,
		utm_medium varchar(190) NULL,
		utm_campaign varchar(190) NULL,
		utm_content varchar(190) NULL,
		utm_term varchar(190) NULL,
		gclid varchar(190) NULL,
		fbclid varchar(190) NULL,
		landing_url text NULL,
		referrer_url text NULL,
		created_at datetime NOT NULL,
		PRIMARY KEY  (id),
		KEY email (email),
		KEY created_at (created_at)
	) {$charset_collate};";

	dbDelta( $sql );
	$created_table = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) );
	if ( $created_table === $table_name ) {
		update_option( 'geims_mbbs_table_version', GEIMS_MBBS_TABLE_VERSION, false );
	}
}

function geims_mbbs_email_key( $email ) {
	return 'geims_mbbs_otp_' . hash( 'sha256', strtolower( trim( $email ) ) );
}

function geims_mbbs_client_ip() {
	return isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
}

function geims_mbbs_register_routes() {
	geims_mbbs_ensure_table();

	register_rest_route(
		'geims/v1',
		'/admission/send-otp',
		array(
			'methods'             => WP_REST_Server::CREATABLE,
			'permission_callback' => '__return_true',
			'callback'            => 'geims_mbbs_send_otp',
		)
	);

	register_rest_route(
		'geims/v1',
		'/admission/verify-otp',
		array(
			'methods'             => WP_REST_Server::CREATABLE,
			'permission_callback' => '__return_true',
			'callback'            => 'geims_mbbs_verify_otp',
		)
	);

	register_rest_route(
		'geims/v1',
		'/admission/submit',
		array(
			'methods'             => WP_REST_Server::CREATABLE,
			'permission_callback' => '__return_true',
			'callback'            => 'geims_mbbs_submit',
		)
	);
}
add_action( 'rest_api_init', 'geims_mbbs_register_routes' );

function geims_mbbs_request_email( WP_REST_Request $request ) {
	$data  = $request->get_json_params();
	$email = isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '';
	return is_email( $email ) ? strtolower( $email ) : '';
}

/**
 * Mirror the enquiry into Contact Form CFDB7 when that plugin is installed.
 * CFDB7 stores all fields as a serialized array in {$prefix}db7_forms.
 */
function geims_mbbs_save_cfdb7_entry( $full_name, $email, $country, $phone, $neet_score, $tracking ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'db7_forms';
	if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) ) !== $table_name ) {
		return;
	}

	$form_value = array(
		'cfdb7_status'     => 'unread',
		'your-name'        => $full_name,
		'your-email'       => $email,
		'your-number'      => $phone,
		'your-neet-score'  => $neet_score,
		'pagetitle'        => 'MBBS',
		'utm_source'       => $tracking['utm_source'],
		'utm_medium'       => $tracking['utm_medium'],
		'utm_campaign'     => $tracking['utm_campaign'],
		'utm_content'      => $tracking['utm_content'],
		'utm_term'         => $tracking['utm_term'],
		'gclid'            => $tracking['gclid'],
		'fbclid'           => $tracking['fbclid'],
		'landing_url'      => $tracking['landing_url'],
		'referrer_url'     => $tracking['referrer_url'],
	);
	$wpdb->insert(
		$table_name,
		array(
			'form_post_id' => GEIMS_MBBS_CF7_FORM_ID,
			'form_value'   => serialize( $form_value ),
			'form_date'    => current_time( 'mysql' ),
		),
		array( '%d', '%s', '%s' )
	);
}

function geims_mbbs_send_otp( WP_REST_Request $request ) {
	$email = geims_mbbs_request_email( $request );
	if ( ! $email ) {
		return new WP_Error( 'invalid_email', 'Please enter a valid email address.', array( 'status' => 400 ) );
	}

	$rate_key = 'geims_mbbs_rate_' . hash( 'sha256', $email . '|' . geims_mbbs_client_ip() );
	if ( get_transient( $rate_key ) ) {
		return new WP_Error( 'otp_rate_limited', 'Please wait one minute before requesting another OTP.', array( 'status' => 429 ) );
	}
	set_transient( $rate_key, 1, MINUTE_IN_SECONDS );

	$code = (string) random_int( 100000, 999999 );
	set_transient(
		geims_mbbs_email_key( $email ),
		array( 'hash' => wp_hash_password( $code ), 'email' => $email ),
		10 * MINUTE_IN_SECONDS
	);

	$subject = 'GEIMS MBBS admission email verification';
	$message = "Your GEIMS MBBS admission verification code is: {$code}\n\nThis code expires in 10 minutes. If you did not request it, you can ignore this email.";
	if ( ! wp_mail( $email, $subject, $message ) ) {
		return new WP_Error( 'email_failed', 'We could not send the OTP. Please try again later.', array( 'status' => 503 ) );
	}

	return new WP_REST_Response( array( 'message' => 'OTP sent. Check your email.' ), 200 );
}

function geims_mbbs_verify_otp( WP_REST_Request $request ) {
	$email = geims_mbbs_request_email( $request );
	$data  = $request->get_json_params();
	$code  = isset( $data['otp'] ) ? preg_replace( '/\D+/', '', (string) $data['otp'] ) : '';
	$otp   = $email ? get_transient( geims_mbbs_email_key( $email ) ) : false;

	if ( ! $otp || strlen( $code ) !== 6 || empty( $otp['hash'] ) || ! wp_check_password( $code, $otp['hash'] ) ) {
		return new WP_Error( 'invalid_otp', 'The OTP is incorrect or has expired.', array( 'status' => 400 ) );
	}

	$token = wp_generate_password( 48, false, false );
	delete_transient( geims_mbbs_email_key( $email ) );
	set_transient( 'geims_mbbs_verified_' . hash( 'sha256', $token ), $email, 15 * MINUTE_IN_SECONDS );

	return new WP_REST_Response( array( 'verification_token' => $token, 'message' => 'Email verified.' ), 200 );
}

function geims_mbbs_submit( WP_REST_Request $request ) {
	$data       = $request->get_json_params();
	$email      = geims_mbbs_request_email( $request );
	$token      = isset( $data['verification_token'] ) ? sanitize_text_field( $data['verification_token'] ) : '';
	$verified   = $token ? get_transient( 'geims_mbbs_verified_' . hash( 'sha256', $token ) ) : false;
	$full_name  = isset( $data['full_name'] ) ? sanitize_text_field( $data['full_name'] ) : '';
	$phone      = isset( $data['phone'] ) ? preg_replace( '/[^0-9]/', '', (string) $data['phone'] ) : '';
	$country    = isset( $data['country_code'] ) ? sanitize_text_field( $data['country_code'] ) : '';
	$neet_score = isset( $data['neet_score'] ) ? sanitize_text_field( $data['neet_score'] ) : '';
	$tracking   = array();
	foreach ( array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'gclid', 'fbclid' ) as $key ) {
		$tracking[ $key ] = isset( $data[ $key ] ) ? sanitize_text_field( $data[ $key ] ) : '';
	}
	$tracking['landing_url']  = isset( $data['landing_url'] ) ? esc_url_raw( $data['landing_url'] ) : '';
	$tracking['referrer_url'] = isset( $data['referrer_url'] ) ? esc_url_raw( $data['referrer_url'] ) : '';

	if ( ! $verified || ! hash_equals( (string) $verified, $email ) ) {
		return new WP_Error( 'email_not_verified', 'Please verify your email before submitting.', array( 'status' => 403 ) );
	}
	if ( ! $full_name || strlen( $phone ) < 7 || ! $country ) {
		return new WP_Error( 'invalid_form', 'Please complete your name and phone number.', array( 'status' => 400 ) );
	}
	if ( $neet_score && ! preg_match( '/^\d+$/', $neet_score ) ) {
		return new WP_Error( 'invalid_neet_score', 'NEET score must contain numbers only.', array( 'status' => 400 ) );
	}

	global $wpdb;
	$inserted = $wpdb->insert(
		geims_mbbs_table_name(),
		array(
			'full_name'    => $full_name,
			'email'        => $email,
			'country_code' => $country,
			'phone'        => $phone,
			'neet_score'   => $neet_score,
			'utm_source'   => $tracking['utm_source'],
			'utm_medium'   => $tracking['utm_medium'],
			'utm_campaign' => $tracking['utm_campaign'],
			'utm_content'  => $tracking['utm_content'],
			'utm_term'     => $tracking['utm_term'],
			'gclid'        => $tracking['gclid'],
			'fbclid'       => $tracking['fbclid'],
			'landing_url'  => $tracking['landing_url'],
			'referrer_url' => $tracking['referrer_url'],
			'created_at'   => current_time( 'mysql' ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);

	if ( false === $inserted ) {
		return new WP_Error( 'database_error', 'We could not save your enquiry. Please try again.', array( 'status' => 500 ) );
	}
	geims_mbbs_save_cfdb7_entry( $full_name, $email, $country, $phone, $neet_score, $tracking );
	delete_transient( 'geims_mbbs_verified_' . hash( 'sha256', $token ) );

	return new WP_REST_Response( array( 'message' => 'Thank you. Your enquiry has been submitted.' ), 201 );
}
