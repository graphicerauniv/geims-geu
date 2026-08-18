<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Nine Logo Settings
$home_nine_logo = $options->get( 'home_nine_logo' );
$home_nine_logo_dimension = $options->get( 'header_nine_logo_dimension' );

//Home Nine Sticky Logo Settings
$home_sticky_logo9 = $options->get( 'home_sticky_logo_nine' );
$home_sticky_logo_dimension9 = $options->get( 'home_sticky_logo_dimension_nine' );

//Mobile Logo Settings
$mobile_logo1 = $options->get( 'mobile_logo_one' );
$mobile_logo_dimension1 = $options->get( 'mobile_logo_dimension_one' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper ltr">
	<?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close"><?php esc_html_e('x', 'educamb'); ?></div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <?php echo wp_kses($options->get('preloader_text'), true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
	<?php endif; ?>

    <!-- Main header-->
    <header class="main-header header-style-nine">
		<?php if($options->get('show_topbar_v9')){ ?>
        <!--Start Header Top style9-->
        <div class="header-top-style9">
            <div class="container">
                <div class="outer-box">
					<?php if($options->get('social_title_v9') || $options->get( 'header_v9_social_share' )) { ?>
                    <div class="header-top-style9-left">
                        <div class="social-link-box-style1">
                            <div class="icon">
                                <span class="icon-share"></span>
                            </div>
                            <p><?php echo wp_kses($options->get('social_title_v9'), true); ?></p>
                            <?php                            
								$icons = $options->get( 'header_v9_social_share' );
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
                            <?php } ?>
                        </div>
                    </div>
					<?php if( has_nav_menu( 'top_header_menu' ) ) { ?>
                    <div class="header-top-style9-right">
                        <div class="quick-link-box">
                            <div class="link-box">
                                <ul>
                                    <?php wp_nav_menu( array( 'theme_location' => 'top_header_menu', 'container_id' => 'navbar-collapse-1',
										'container_class'=>'navbar-collapse collapse navbar-right',
										'menu_class'=>'nav navbar-nav',
										'fallback_cb'=>false,
										'items_wrap' => '%3$s',
										'container'=>false,
										'depth'=>'3',
										'walker'=> new Bootstrap_walker()
									) ); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
        <!--End Header Top style9-->
		<?php } ?>
        <!--Start Header Style9-->
        <div class="header-style9">
            <div class="container">
                <div class="outer-box">

                    <!--Start Header Style9 Left-->
                    <div class="header-style9-left">
                        <div class="nav-outer style9 clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <div class="inner">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <!-- Main Menu -->
                            <nav class="main-menu style9 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu8', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false,
											'items_wrap' => '%3$s',
											'container'=>false,
											'depth'=>'3',
											'walker'=> new Bootstrap_walker()
										) ); ?>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>
                    </div>
                    <!--End Header Style9 Left-->

                    <!--Start Header Right-->
                    <div class="header-style9-right">
                        <ul class="clearfix">
                            <?php if( $options->get('icon_user_link_v9') ){?>
                            <li>
                                <a href="<?php echo esc_url($options->get('icon_user_link_v9')); ?>">
                                    <span class="flaticon-user"></span>
                                </a>
                            </li>
                            <?php } ?>
							<?php if( $options->get('show_seach_form_v9') ){?>                            
                            <li>
                                <button type="button" class="search-toggler">
                                    <span class="icon-zoom"></span>
                                </button>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--End Header Right-->

                </div>
            </div>
        </div>
        <!--End header-->

        <!--Start Header Bottom Style9-->
        <div class="header-bottom-style9">
            <div class="container">
                <div class="outer-box">
                    <div class="header-bottom-style9-left">
                        <div class="logo-box-style9">
                            <?php echo educamb_logo( $logo_type, $home_nine_logo, $home_nine_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <div class="header-bottom-style9-middle">
                        <div class="header-contact-info-style9">
                            <ul>
                                <?php if($options->get('address_v9')) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="flaticon-map"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($options->get('address_v9'), true); ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                                <?php if($options->get('phone_no_v9') || $options->get('email_address_v9')) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="flaticon-telephone"></span>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <a href="tel:<?php echo esc_attr($options->get('phone_no_v9')); ?>"><?php echo wp_kses($options->get('phone_no_v9'), true); ?></a><br>
                                            <a href="mailto:<?php echo esc_attr($options->get('email_address_v9')); ?>"><?php echo wp_kses($options->get('email_address_v9'), true); ?></a>
                                        </p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
					<?php if( $options->get('btn_title_v9') ){?>
                    <div class="header-bottom-style9-right">
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v9')); ?>">
                                <span class="txt"><?php echo wp_kses($options->get('btn_title_v9'), true); ?></span>
                            </a>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
        <!--End Header Bottom Style9-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="sticky-header__inner clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <div class="img-responsive">
                            <?php echo educamb_logo( $logo_type, $home_sticky_logo9, $home_sticky_logo_dimension9, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--End Sticky Header-->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
            <nav class="menu-box">
                <div class="nav-logo">
                    <?php echo educamb_logo( $logo_type, $mobile_logo1, $mobile_logo_dimension1, $logo_text, $logo_typography ); ?>
                </div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <!--Social Links-->
                <?php
                    if( $options->get('show_msocial_share_v9') ):
                    $icons = $options->get( 'mheader_social_share_v9' );
                    if ( ! empty( $icons ) ) :
                ?>
                <div class="social-links">
                    <ul class="clearfix">
                    <?php
                    foreach ( $icons as $h_icon ) :
                    $header_social_icons = json_decode( urldecode( educamb_set( $h_icon, 'data' ) ) );
                    if ( educamb_set( $header_social_icons, 'enable' ) == '' ) {
                        continue;
                    }
                    $icon_class = explode( '-', educamb_set( $header_social_icons, 'icon' ) );
                    ?>
                        <li><a href="<?php echo esc_url(educamb_set( $header_social_icons, 'url' )); ?>" <?php if( educamb_set( $header_social_icons, 'background' ) || educamb_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(educamb_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(educamb_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><span class="fab <?php echo esc_attr( educamb_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
                    <?php endforeach; ?>
                  </ul>
               </div>
            <?php endif; endif; ?>
            </nav>
        </div>
        <!-- End Mobile Menu -->

    </header>
    <?php if( $options->get('show_seach_form_v9') ){?>
    <!-- search-popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><i class="icon-close"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <?php get_template_part('searchform1')?>
            </div>
        </div>
    </div>
    <!-- search-popup end -->
    <?php } ?>