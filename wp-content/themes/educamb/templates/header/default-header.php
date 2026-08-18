<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home One Logo Settings
$home_logo1 = $options->get( 'home_logo_one' );
$home_logo_dimension1 = $options->get( 'home_logo_dimension_one' );

//Home One Sticky Logo Settings
$home_sticky_logo1 = $options->get( 'home_sticky_logo_one' );
$home_sticky_logo_dimension1 = $options->get( 'home_sticky_logo_dimension_one' );

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
    <header class="main-header header-style-one">
        <?php if($options->get('show_topbar_v1')){ ?>
        <!--Start Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="header-top-left">
                        <?php if($options->get('info_text_v1_show')) { ?>
                        <div class="info-box">
                            <span class="icon-info"></span>
                            <p><?php echo wp_kses($options->get('info_text_v1'), true); ?></p>
                        </div>
                        <?php } ?>
                        <?php if($options->get('select_box_v1_show')) { ?>
                        <div class="select-box">
                            <?php echo do_shortcode($options->get('select_box_v1')); ?>
                        </div>
                        <?php } ?>
                        <?php if($options->get('subscribe_v1')) { ?>
                        <div class="subscribe-box">
                            <div class="icon">
                                <span class="icon-email"></span>
                            </div>
                            <a href="<?php echo esc_url($options->get('subscribe_link_v1')); ?>"><?php echo wp_kses($options->get('subscribe_v1'), true); ?></a>
                        </div>
                        <?php } ?>
                        <div class="social-link-box-style1">
                            <?php if($options->get('social_title_v1')) { ?>
                            <div class="icon">
                                <span class="icon-share"></span>
                            </div>
                            <p><?php echo wp_kses($options->get('social_title_v1'), true); ?></p>
                            <?php } ?>
                            <?php									
                                $icons = $options->get( 'header_social_share_v1' );
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
                                <li><a href="<?php echo esc_url(educamb_set( $header_social_icons, 'url' )); ?>" <?php if( educamb_set( $header_social_icons, 'background' ) || educamb_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(educamb_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(educamb_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fa <?php echo esc_attr( educamb_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                            <?php endforeach; ?>
                            </ul>							  
                            <?php endif; ?>                                
                        </div>
                    </div>

                    <div class="header-top-right">
                        <div class="quick-link-box">
                            <?php if($options->get('quick_links_title_v1')) { ?>
                            <div class="inner-title">
                                <span class="icon-launch"></span>
                                <p><?php echo wp_kses($options->get('quick_links_title_v1'), true); ?></p>
                            </div>
                            <?php } ?>
                            <?php if( has_nav_menu( 'top_header_menu' ) ) { ?>
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
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Top-->
        <?php } ?>
        <!--Start Header-->
        <div class="header">
            <div class="auto-container">
                <div class="outer-box">
                    <?php if( $options->get('show_seach_form_v1') ){?>
                    <!--Start Header Left-->
                    <div class="header-left">                            
                        <div class="serach-button-style1 marleft30">
                            <button type="button" class="search-toggler">
                                <i class="icon-zoom"></i>
                                <?php esc_html_e('Search', 'educamb');?>
                            </button>
                        </div>
                    </div>
                    <!--End Header Left-->
                    <?php } ?>
                    <!--Start Header Left-->
                    <div class="header-middle">
                        <div class="main-logo-box">
                            <?php echo educamb_logo( $logo_type, $home_logo1, $home_logo_dimension1, $logo_text, $logo_typography ); ?>
                        </div>

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
                            <nav class="main-menu style1 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'left_menu', 'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false,
                                            'items_wrap' => '%3$s',
                                            'container'=>false,
                                            'depth'=>'3',
                                            'walker'=> new Bootstrap_walker()
                                        ) ); ?>
                                        <li class="blank-box"></li>
                                        <?php wp_nav_menu( array( 'theme_location' => 'right_menu', 'container_id' => 'navbar-collapse-1',
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
                    <?php if($options->get('login_text_v1') || $options->get('apply_text_v1')) { ?>
                    <!--Start Header Right-->
                    <div class="header-right">
                        <div class="header-right__menu">
                            <ul>
                                <?php if($options->get('login_text_v1')) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-account"></span>
                                    </div>
                                    <a href="<?php echo esc_url($options->get('login_link_v1')); ?>"><?php echo wp_kses($options->get('login_text_v1'), true); ?></a>
                                </li>
                                <?php } ?>
                                <?php if($options->get('apply_text_v1')) { ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-more"></span>
                                    </div>
                                    <a href="<?php echo esc_url($options->get('apply_link_v1')); ?>"><?php echo wp_kses($options->get('apply_text_v1'), true); ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!--End Header Right-->
                    <?php } ?>
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
                            <?php echo educamb_logo( $logo_type, $home_sticky_logo1, $home_sticky_logo_dimension1, $logo_text, $logo_typography ); ?>
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
                    if( $options->get('show_msocial_share_v1') ):
                    $icons = $options->get( 'mheader_social_share_v1' );
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
    <?php if( $options->get('show_seach_form_v1') ){?>
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
    