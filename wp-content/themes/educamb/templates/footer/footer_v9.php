<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$footer_logo9 = $options->get( 'footer_logo9' );
$footer_logo9 = educamb_set( $footer_logo9, 'url', EDUCAMB_URI . 'assets/images/footer/footer-logo-6.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
	<!--Start Footer Style9 area -->
    <footer class="footer-style9-area">

        <div class="footer-top-style9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-top-style9__inner">
                            <div class="left">
                                <div class="footer-logo-style9">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url($footer_logo9); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                    </a>
                                </div>
                                <?php if($options->get( 'footer_v9_content' )){?>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses( $options->get( 'footer_v9_content'), true ); ?></h3>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="right">
                                <div class="footer-social-link">
                                    <?php
										$icons = $options->get( 'footer_social_share_v9' );
										if ( ! empty( $icons ) ) :
									?>
									<ul class="clearfix">
										<?php
										foreach ( $icons as $h_icon ) :
										$header_social_icons = json_decode( urldecode( educamb_set( $h_icon, 'data' ) ) );
										if ( educamb_set( $header_social_icons, 'enable' ) == '' ) {
											continue;
										}
										$icon_class = explode( '-', educamb_set( $header_social_icons, 'icon' ) );
										?>
											<li><a href="<?php echo esc_url(educamb_set( $header_social_icons, 'url' )); ?>" <?php if( educamb_set( $header_social_icons, 'background' ) || educamb_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(educamb_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(educamb_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( educamb_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
										<?php endforeach; ?>
									</ul>
									<?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php if ( is_active_sidebar( 'footer-sidebar9' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-style9">
            <div class="container">
                <div class="row text-right-rtl">
                    <?php dynamic_sidebar( 'footer-sidebar9' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
        <?php } ?>
        <div class="footer-bottom-style9">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v9_copyright_text' )){?>
                    <div class="copyright-style9">
                        <p>
                            <?php echo wp_kses( $options->get( 'footer_v9_copyright_text'), true ); ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_v9_menu' )){?>
                    <div class="footer-menu-style9">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v9_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    
    </footer>
    <!--End footer Style9 area-->
    
    
    
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>