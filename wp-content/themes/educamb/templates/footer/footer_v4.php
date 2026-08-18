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
	
    <!--Start footer Style4 area -->
    <footer class="footer-style4-area">
        <?php if ( is_active_sidebar( 'footer-sidebar4' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-top-style4">
            <div class="container">
                <div class="row text-right-rtl">
					<?php dynamic_sidebar( 'footer-sidebar4' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>        
        <div class="footer-bottom-style4">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v4_copyright_text' )){?>
                    <div class="copyright-style4">
                        <p>
                            <?php echo wp_kses( $options->get( 'footer_v4_copyright_text'), true ); ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_v4_menu' )){?>
                    <div class="footer-menu-style4">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v4_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style4 area -->



    <button class="scroll-top scroll-top--style4 scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>