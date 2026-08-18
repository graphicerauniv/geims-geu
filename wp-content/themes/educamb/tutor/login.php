<?php

/**
 * Display single login
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if ( ! defined( 'ABSPATH' ) )
	exit;


if(!tutor_utils()->get_option('enable_tutor_native_login', null, true, true)) {
    // Refer to login oage
    header('Location: '.wp_login_url($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
    exit;
}
    
tutor_utils()->tutor_custom_header();
$login_url = tutor_utils()->get_option('enable_tutor_native_login', null, true, true) ? '' : wp_login_url(tutor()->current_url);
$data  = \EDUCAMB\Includes\Classes\Common::instance()->data( 'single-courses' )->get();
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'educamb_banner', $data );?>
<?php else:?>
<!--Start breadcrumb area paroller-->
<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                        <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <ul>
                            <?php echo educamb_the_breadcrumb(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->
<?php endif;?>

<?php do_action('tutor/template/login/before/wrap'); ?>
<section class="login-dash-page academy-course-details-area">
    <div <?php tutor_post_class('tutor-page-wrap'); ?>>
        <div class="tutor-template-segment tutor-login-wrap">
    
            <div class="tutor-login-form-wrapper">
                <div class="tutor-fs-5 tutor-color-black tutor-mb-32">
                    <?php esc_html_e( 'Hi, Welcome back!', 'tutor' ); ?>
                </div>
                <?php
                    // load form template.
                    $login_form = trailingslashit( tutor()->path ) . 'templates/login-form.php';
                    tutor_load_template_from_custom_path(
                        $login_form,
                        false
                    );
                ?>
                <?php do_action("tutor_after_login_form"); ?>
            </div>
        </div>
    </div>
</section>
<?php 
    do_action('tutor/template/login/after/wrap');
    //tutor_load_template_from_custom_path(tutor()->path . '/views/modal/login.php');
    tutor_utils()->tutor_custom_footer();
?>
