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
	
    <!--Start footer Style5 area -->
    <footer class="footer-style5-area">
        <?php if ( is_active_sidebar( 'footer-sidebar5' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-top-style5">
            <div class="container">
                <div class="row text-right-rtl">
					<?php dynamic_sidebar( 'footer-sidebar5' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>
        <div class="footer-bottom-style5">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v5_copyright_text' )){?>
                    <div class="copyright-style5">
                        <p>
                            <?php echo wp_kses( $options->get( 'footer_v5_copyright_text'), true ); ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if($options->get( 'footer_v5_menu' )){?>
                    <div class="footer-menu-style5">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v5_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style5 area -->



    <button class="scroll-top scroll-top--style4 scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>