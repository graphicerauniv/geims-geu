<?php
/**
 * Blog Post Main File.
 *
 * @package EDUCAMB
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$options = educamb_WSH()->option();

$data    = \EDUCAMB\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-lg-9 col-md-12 col-sm-12';


if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
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
                    <div class="title">
                        <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( '' ) ); ?></h2>
                    </div>
                    <div class="breadcrumb-menu">
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

<!--Start Blog Details Page -->
<section class="blog-details-page">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'educamb_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-details-page__content">
                	
                    <div class="thm-unit-test">    
                        <div class="blog-details-page__content__inner">
                        	<?php if(has_post_thumbnail()){ ?>
                            <div class="blog-details-page__img-box">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        	<?php } ?>
                        	
                            <div class="text"><?php the_content(); ?></div>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links m-t30">'.esc_html__('Pages: ', 'educamb'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            
                            <?php if(has_tag()):?>
                            <div class="blog-details-page__tag-box">
                                <div class="inner-title">
                                    <h3><?php esc_html_e('# Posted In:', 'educamb'); ?></h3>
                                </div>
                                <ul>
                                    <li><?php the_tags( '', ', ', '' ); ?></li>
                                </ul>
                            </div>
                            <?php endif;?>
                            
                        	<?php if( $options->get( 'single_post_author_box' ) ):?>
                            <div class="blog-details-page__author-box">
                                <div class="blog-details-page__author-box__inner">
                                    <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                                    <div class="img-box">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text">
                                        <h3><?php the_author(); ?></h3>
                                        <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                    </div>
                                </div>
                            </div>
                        	<?php endif;?>
                            
						</div>
                        
                        <?php if((get_previous_post()) || (get_next_post())): ?>
						<div class="blog-details-page__prev-next-option">
                            <?php global $post; $prev_post = get_previous_post();
								if (!empty($prev_post)):
							?>
                            <div class="single-box left">
                                <div class="icon-box">
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                        <span class="icon-right-arrow-1"></span>
                                    </a>
                                </div>
                                <div class="title-box">
                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo wp_kses_post($prev_post->post_title); ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php global $post; $next_post = get_next_post();
								if (!empty($next_post)):
							?>
                            <div class="single-box right">
                                <div class="icon-box">
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                        <span class="icon-right-arrow-1"></span>
                                    </a>
                                </div>
                                <div class="title-box">
                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo wp_kses_post($next_post->post_title); ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                        <?php endif ?>                        
                                                
                        <!--End post-details-->
                        <?php comments_template(); ?>
                    
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'educamb_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
