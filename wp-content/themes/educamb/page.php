<?php
/**
 * Default Template Main File.
 *
 * @package EDUCAMB
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \EDUCAMB\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
//$layout = ( $layout ) ? $layout : 'right';
//$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-9 col-md-12 col-sm-12';
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

<!--Start Blog Page Three -->
<section class="blog-page-three">
    <div class="container">
        <div class="row">		
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'educamb_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	<div class="blog-page-three__content">
                    <div class="row">
                        <div class="col-xl-12">
                    		<div class="thm-unit-test">
                            
								<?php while ( have_posts() ): the_post(); ?>
                                    <?php the_content(); ?>
                                <?php endwhile; ?>
                                
                                <div class="clearfix"></div>
                                <?php
                                $defaults = array(
                                    'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'educamb' ),
                                    'after'  => '</div>',
                
                                );
                                wp_link_pages( $defaults );
                                ?>
                                <?php comments_template() ?>
                             
                             </div>
                    	</div>
                    </div>
                 </div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'educamb_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
