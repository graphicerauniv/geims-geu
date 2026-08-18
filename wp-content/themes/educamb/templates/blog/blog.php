<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage EDUCAMB
 * @author     Theme Kalia
 * @version    1.0
 */

if (class_exists('Erdunt_Resizer')) {
    $img_obj = new Erdunt_Resizer();
} else {
    $img_obj = array();
}
$options = educamb_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

global $post;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);

?>


<div <?php post_class(); ?>>
    
    <!--Start Single Blog Style1-->
    <div class="single-blog-style1">
        <div class="img-holder">
            <?php if(has_post_thumbnail()){ ?>
            <div class="inner">
                <?php the_post_thumbnail('educamb_1170x470'); ?>
            </div>
            <div class="category-box">
                <div class="dot-box"></div>
                <p><?php the_category(' '); ?></p>
            </div>
            <?php } ?>
        </div>
        <div class="text-holder">
            <h3>
                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="text">
                <?php the_excerpt(); ?>
            </div>
            <div class="bottom-box">
                <div class="btn-box">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                        <span class="icon-right-arrow-1"></span><?php esc_html_e('Read More', 'educamb'); ?>
                    </a>
                </div>
                <?php if( $options->get( 'blog_post_author' ) || $options->get( 'blog_post_date' ) || $options->get( 'blog_post_comments' ) ){ ?>
                <div class="meta-info">
                    <ul>
                    	<?php if( $options->get( 'blog_post_date' ) ){ ?>
                        <li>
                            <span class="icon-calendar"></span>
                            <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><?php echo wp_kses(get_the_date(), true); ?></a>
                        </li>
                        <?php } ?>
                        <?php if( $options->get( 'blog_post_author' ) ){ ?>
                        <li>
                            <span class="icon-user"></span>
                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a>
                        </li>
                        <?php } ?>
                        <?php if( $options->get( 'blog_post_comments' ) ){ ?>
                        <li>
                            <span
                                class="icon-chat-comment-oval-speech-bubble-with-text-lines"></span>
                            <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'educamb'), true), wp_kses(__('1 Comment' , 'educamb'), true), wp_kses(__('% Comments' , 'educamb'), true)); ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--End Single Blog Style1--> 
    
</div>