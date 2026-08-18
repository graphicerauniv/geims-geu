<?php

/**
 * Template for displaying lead info
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if (!defined('ABSPATH'))
    exit;

global $post, $authordata;

$profile_url        = tutor_utils()->profile_url( $authordata->ID, true );
$show_author        = tutor_utils()->get_option( 'enable_course_author' );
$course_categories  = get_tutor_course_categories();
$disable_reviews    = ! get_tutor_option( 'enable_course_review' );
$is_wish_listed     = tutor_utils()->is_wishlisted( $post->ID, get_current_user_id() );
$course_duration 	= get_tutor_course_duration_context();
?>

<div class="course-details__meta-box">
    <ul>
        <?php if( !empty( $course_categories ) && is_array( $course_categories ) && count( $course_categories ) ) : ?>
			<?php
                $category_links = array();
                foreach ( $course_categories as $course_category ) :
                    $category_name = $course_category->name;
                    $category_link = get_term_link($course_category->term_id);
                    $category_links[] = wp_sprintf( '<li><span class="icon-filter"></span><a href="%1$s">%2$s</a></li>', esc_url( $category_link ), esc_html( $category_name ) );
                endforeach;
                echo implode(', ', $category_links);
            ?>
        <?php else : ?>
            <?php _e('Uncategorized', 'tutor'); ?>
        <?php endif; ?>
        <?php if(!empty( $course_duration )){?>
        <li>
        	<span class="icon-signal-status"></span>
            <?php echo wp_kses( $course_duration, true ); ?>
        </li>
        <?php };?>
    </ul>
</div>

<div class="course-details_title">
    <h2><?php the_title();?></h2>
</div>

<div class="single-online-courses-style2__instructors-info-outer">
    <?php if ( $show_author ) : ?>
    <div class="single-online-courses-style2__instructors-info">
        <div class="img-box">
            <?php echo tutor_utils()->get_tutor_avatar( get_the_author_meta('ID') ); ?>
        </div>
        <div class="text-box">
            <h5><a href="<?php echo esc_url( $profile_url ); ?>"><?php echo get_the_author_meta('display_name'); ?></a></h5>
            <span><?php esc_html_e('Instructor', 'educamb') ?></span>
        </div>
    </div>
    <?php endif; ?>
    <div class="right">
        <ul>
            <li>
                <a href="#" class="tutor-btn tutor-btn-ghost tutor-course-wishlist-btn tutor-mr-16" data-course-id="<?php echo get_the_ID(); ?>">
                    <i class="<?php echo $is_wish_listed ? 'icon-heart-1' : 'icon-heart-1' ?> tutor-mr-8"></i> <?php esc_html_e( 'Whislist', 'educamb' );?>
                </a>
            </li>
            <li>
                <?php
				if ( tutor_utils()->get_option('enable_course_share', false, true, true) ) {
					tutor_load_template_from_custom_path(tutor()->path . '/views/course-share.php', array(), false);
				}
				?>
            </li>
        </ul>
    </div>
</div>