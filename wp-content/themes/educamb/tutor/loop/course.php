<?php

/**
 * A single course loop
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */
global $post, $authordata;
$course_id          = $post->ID;
$course_duration = get_tutor_course_duration_context();
$course_categories  = get_tutor_course_categories( $course_id );
?>

<div class="single-program-box-style1">
    <?php if( has_post_thumbnail() ):?>
    <div class="img-holder">
    	<?php the_post_thumbnail('educamb_270x200');?>
        <?php if( $course_duration ){?>
        <div class="overlay-content">
            <div class="inner">
                <ul class="d-flex justify-content-between align-items-center flex-wrap">
					<li><?php echo wp_kses( $course_duration, true ); ?></li>
                	<li><?php tutor_course_price(); ?></li>
                	<li><?php echo get_tutor_course_level();?></li>
                </ul>
            </div>
        </div>
        <?php };?>
    </div>
    <?php endif;?>
    <div class="text-holder">
        <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
        
        <?php if( !empty( $course_categories ) && is_array( $course_categories ) && count( $course_categories ) ) : ?>
        <?php
			$category_links = array();
			foreach ( $course_categories as $course_category ) :
				$category_name = $course_category->name;
				$category_link = get_term_link($course_category->term_id);
				$category_links[] = wp_sprintf( '<a href="%1$s">%2$s</a>', esc_url( $category_link ), esc_html( $category_name ) );
			endforeach;
			echo implode(', ', $category_links);
		?>
        <?php endif; ?>
    </div>
</div>