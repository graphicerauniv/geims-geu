<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

// Prepare the nav items
$course_id          = get_the_ID();
$course_nav_item    = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), $course_id );
$is_public          = \TUTOR\Course_List::is_public( $course_id );
$is_mobile          = wp_is_mobile();
$data  = \EDUCAMB\Includes\Classes\Common::instance()->data( 'single-courses' )->get();

$enrollment_box_position            = tutor_utils()->get_option( 'enrollment_box_position_in_mobile', 'bottom' );
if ( '-1' === $enrollment_box_position ) {
    $enrollment_box_position = 'bottom';
}
$student_must_login_to_view_course  = tutor_utils()->get_option( 'student_must_login_to_view_course' );

tutor_utils()->tutor_custom_header();

if ( ! is_user_logged_in() && ! $is_public && $student_must_login_to_view_course ) {
    tutor_load_template( 'login' );
    tutor_utils()->tutor_custom_footer();
    return;
}
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
<section class="academy-course-details-area">
<?php do_action('tutor_course/single/before/wrap'); ?>
<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap tutor-wrap-parent'); ?>>
    <div class="tutor-course-details-page tutor-container">
        
        <div class="tutor-row tutor-gx-xl-5">
            <main class="tutor-col-xl-8">
                <div class="academy-course-details-content">
                <?php (isset($is_enrolled) && $is_enrolled) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
				<div class="mt-50"><?php tutor_utils()->has_video_in_single() ? tutor_course_video() : get_tutor_course_thumbnail(); ?></div>
	            <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                
                <?php if ( $is_mobile && 'top' === $enrollment_box_position ): ?>
                    <div class="tutor-mt-32">
                        <?php tutor_load_template( 'single.course.course-entry-box' ); ?>
                    </div>
                <?php endif; ?>

                <div class="course-details__tab-box">
                    <?php if ( is_array( $course_nav_item ) && count( $course_nav_item ) > 1 ) : ?>
                        <div class="tutor-is-sticky course-details-tab-button">
                            <?php tutor_load_template( 'single.course.enrolled.nav', array('course_nav_item' => $course_nav_item ) ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="tabs-content-box">
                        <?php foreach( $course_nav_item as $key => $subpage ) : ?>
                            <div class="tab-content-box-item <?php echo $key == 'info' ? ' tab-content-box-item-active' : ''; ?>" id="description<?php echo $key; ?>">
                            
                                <?php
                                    do_action( 'tutor_course/single/tab/'.$key.'/before' );
                                    
                                    $method = $subpage['method'];
                                    if ( is_string($method) ) {
                                        $method();
                                    } else {
                                        $_object = $method[0];
                                        $_method = $method[1];
                                        $_object->$_method(get_the_ID());
                                    }

                                    do_action( 'tutor_course/single/tab/'.$key.'/after' );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
	            <?php do_action('tutor_course/single/after/inner-wrap'); ?>
                </div>
            </main>

            <aside class="tutor-col-xl-4">
                <div class="tutor-single-course-sidebar tutor-mt-40 tutor-mt-xl-0">
                    <?php do_action('tutor_course/single/before/sidebar'); ?>
                    
                    <?php if ( ( $is_mobile && 'bottom' === $enrollment_box_position ) || ! $is_mobile ): ?>
                        <?php tutor_load_template( 'single.course.course-entry-box' ); ?>
                    <?php endif ?>

                    <div class="tutor-single-course-sidebar-more tutor-mt-24">
                        <?php tutor_course_instructors_html(); ?>
                        <?php tutor_course_requirements_html(); ?>
                        <?php tutor_course_tags_html(); ?>
                        <?php tutor_course_target_audience_html(); ?>
                    </div>

                    <?php do_action('tutor_course/single/after/sidebar'); ?>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php do_action('tutor_course/single/after/wrap'); ?>
</section>
<?php
tutor_utils()->tutor_custom_footer();
