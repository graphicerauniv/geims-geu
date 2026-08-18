<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Two Logo Settings
$home_two_logo = $options->get( 'header_two_logo' );
$home_two_logo_dimension = $options->get( 'header_two_logo_dimension' );

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
    <header class="main-header header-style-two">
		<?php if($options->get('show_topbar_v2')){ ?>
        <!--Start Header Top Style2-->
        <div class="header-top-style2">
            <?php if($options->get('show_pattern_v2')){ ?>
            <div class="header-top-style2-shape1 float-bob-x">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/header-top-style2-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
            </div>
            <div class="header-top-style2-shape2 zoominout"></div>
            <div class="header-top-style2-shape3 float-bob-y">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/header-top-style2-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
            </div>
            <div class="header-top-style2-shape4 zoominout-2"></div>
            <div class="header-top-style2-shape5 float-bob-x">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/header-top-style2-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
            </div>
            <div class="header-top-style2-shape6 float-bob-x">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/header-top-style2-shape-4.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
            </div>
			<?php } ?>
            <div class="auto-container">
                <div class="outer-box">

                    <div class="header-top-style2__left">
                        <div class="header-contact-info-style2">
                            <?php if($options->get('top_bar_title_v2')){ ?>
                            <div class="inner-title">
                                <h3> <?php echo wp_kses($options->get('top_bar_title_v2'), true); ?></h3>
                            </div>
                            <?php } ?>
                            <?php if($options->get('top_address_v2') || $options->get('top_working_hours_v2')){ ?>
                            <ul>
                                <?php if($options->get('top_address_v2')){ ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-location-1"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($options->get('top_address_v2'), true); ?> </p>
                                    </div>
                                </li>
                                <?php } ?>
								<?php if($options->get('top_working_hours_v2')){ ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-clock-1"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($options->get('top_working_hours_v2'), true); ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="header-top-style2__right">
                        <?php if( has_nav_menu( 'top_header_menu' ) ) { ?>
                        <div class="quick-link-box-style2">
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
                        <?php } ?>
                        <div class="social-link-box-style2">
                            <?php                            
								$icons = $options->get( 'header_social_share_v2' );
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
        <!--End Header Top Style2-->
		<?php } ?>
        <!--Start Header-->
        <div class="header-style2">
            <div class="auto-container">
                <div class="outer-box">

                    <!--Start Header Left-->
                    <div class="header-style2__left">
                        <div class="main-logo-box-style2">
                            <?php echo educamb_logo( $logo_type, $home_two_logo, $home_two_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--End Header Left-->

                    <!--Start Header Left-->
                    <div class="header-style2__middle">
                        <div class="nav-outer style1 clearfix">

                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <div class="inner">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <!-- Main Menu -->
                            <nav class="main-menu style2 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu1', 'container_id' => 'navbar-collapse-1',
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
                    <!--End Header Left-->

                    <!--Start Header Right-->
                    <div class="header-style2__right">
                        <?php if( $options->get('show_seach_form_v2') ){?>
                        <div class="serach-button-style1">
                            <button type="button" class="search-toggler">
                                <i class="icon-zoom"></i>
                            </button>
                        </div>
                        <?php } ?>
                        <?php if( $options->get('btn_title_v2') ){?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v2')); ?>">
                                <span class="txt"><?php echo wp_kses($options->get('btn_title_v2'), true); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if( $options->get('phone_title_v2') || $options->get('phone_no_v2')){?>
                        <div class="phone-number-box1">
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="phone">
                                <?php if( $options->get('phone_title_v2') ){?><h4><?php echo wp_kses($options->get('phone_title_v2'), true); ?></h4><?php } ?>
                                <h3>
                                    <a href="tel:<?php echo esc_attr($options->get('phone_no_v2')); ?>"><?php echo wp_kses($options->get('phone_no_v2'), true); ?></a>
                                </h3>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!--End Header Right-->

                </div>
            </div>
        </div>
        <!--End header-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="sticky-header__inner clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <div class="img-responsive">
                            <?php echo educamb_logo( $logo_type, $home_two_logo, $home_two_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu style2 clearfix">
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
                    if( $options->get('show_msocial_share_v2') ):
                    $icons = $options->get( 'mheader_social_share_v2' );
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
    <?php if( $options->get('show_seach_form_v2') ){?>
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