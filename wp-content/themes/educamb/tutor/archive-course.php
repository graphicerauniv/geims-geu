<?php

/**
 * Template for displaying courses
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.5.8
 */
tutor_utils()->tutor_custom_header();
$data  = \EDUCAMB\Includes\Classes\Common::instance()->data( 'archive' )->get();
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

<?php 
if ( isset( $_GET['course_filter'] ) ) {
	$filter = (new \Tutor\Course_Filter(false))->load_listing( $_GET, true );
	query_posts( $filter );
}
?>
<div class="program-style1-area">
<?php
// Load the 
tutor_load_template('archive-course-init', array_merge($_GET, array(
	'course_filter' => (bool) tutor_utils()->get_option('course_archive_filter', false),
	'supported_filters' => tutor_utils()->get_option('supported_course_filters', array()),
	'loop_content_only' => false
)));
?>
</div>

<?php

tutor_utils()->tutor_custom_footer(); 