<?php
/**
 * Footer Template  File
 *
 * @package EDUCAMB
 * @author  Template Path
 * @version 1.0
 */

$options = educamb_WSH()->option();

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    <div class="bottom-parallax2">
        <!--Start Footer Style3 Area-->
        <footer class="footer-style3-area">
            <!--Start Footer-->
            <div class="footer-style3">
                <div class="container">
					<?php if ( is_active_sidebar( 'footer-sidebar3' ) ) { ?>
                    <div class="row text-right-rtl">
                        <?php dynamic_sidebar( 'footer-sidebar3' ); ?>
                    </div>
					<?php } ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-subscribe-box">
                                <?php if($options->get( 'footer_v3_newsletter_title' )){?>
                                <div class="subscribe-title">
                                    <span class="icon-mail-1"></span>
                                    <h3><?php echo wp_kses( $options->get( 'footer_v3_newsletter_title'), true ); ?></h3>
                                </div>
                                <?php } ?>
                                <div class="subscribe-box">
                                    <div class="subscribe-form">
										<?php echo do_shortcode($options->get('newsletter_form_url')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Footer-->

            <div class="footer-bottom-style3">
                <div class="container">
                    <div class="bottom-inner">
                        <?php if($options->get( 'footer_v3_copyright_text' )){?>
                        <div class="copyright">
                            <p><?php echo wp_kses( $options->get( 'footer_v3_copyright_text'), true ); ?></p>
                        </div>
                        <?php } ?>
                        <div class="footer-social-link footer-social-link--style2">
                            <?php
								$icons = $options->get( 'footer_social_share_v3' );
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
                        <?php if($options->get( 'footer_v3_menu' )){?>
                        <div class="footer-menu-style3">
                            <ul>
                                <?php echo wp_kses( $options->get( 'footer_v3_menu'), true ); ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </footer>
        <!--End Footer Style3 Area-->
    </div>
    
    <!--Scroll to top-->    
    <button class="scroll-top scroll-top--style3 scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>