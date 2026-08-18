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
	
    <!--Start Footer Style10 area -->
    <footer class="footer-style10-area">
        <?php if ( is_active_sidebar( 'footer-sidebar10' ) ) { ?>
        <!--Start Footer-->
        <div class="footer-style10">
            <div class="container">
                <div class="footer-style10__inner">
                    <div class="row">
						<?php dynamic_sidebar( 'footer-sidebar10' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php } ?>
        <div class="footer-bottom-style10">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get( 'footer_v10_copyright_text' )){?>
                    <div class="copyright-style10">
                        <p>
                           <?php echo wp_kses( $options->get( 'footer_v10_copyright_text'), true ); ?>
                        </p>
                    </div>
                    <?php } ?>
					<?php if($options->get( 'footer_v10_menu' )){?>
                    <div class="footer-menu-style10">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_v10_menu'), true ); ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer Style10 area-->



    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="icon-top"></span>
    </button>