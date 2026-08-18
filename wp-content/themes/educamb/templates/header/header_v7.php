<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Two Logo Settings
$home_seven_logo = $options->get( 'home_seven_logo' );
$home_seven_logo_dimension = $options->get( 'header_seven_logo_dimension' );

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
    <header class="main-header header-style-seven">
		<?php if($options->get('show_topbar_v7')){ ?>
        <!--Start Header Top Style7-->
        <div class="header-top-style7">
            <div class="container">
                <div class="outer-box">
					<?php if( $options->get('show_seach_form_v7') ){?>
                    <div class="header-top-style7__left">
                        <div class="search-form-box-style7">
                            <?php get_template_part('searchform3')?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($options->get('top_header_text_v7') || $options->get('count_down_value_v7')){?>
                    <div class="header-top-style7__middle">
                        <div class="timer-box">
                            <?php if($options->get('top_header_text_v7')){?>
                            <div class="inner-title">
                                <i class="flaticon-limited-offer"></i>
                                <h5><?php echo wp_kses($options->get('top_header_text_v7'), true); ?></h5>
                            </div>
                            <?php } ?>
							<?php if($options->get('count_down_value_v7')){?>
                            <div class="countdown-timers">
                                <div class="countdown time-countdown" data-countdown-time="<?php echo wp_kses($options->get('count_down_value_v7'), true); ?>"></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="header-top-style7__right">
                        <div class="social-link-box-style1">
                            <?php if($options->get('social_title_v7') || $options->get( 'header_v7_social_share' )) { ?>
                            <div class="icon">
                                <span class="icon-share"></span>
                            </div>
                            <p><?php echo wp_kses($options->get('social_title_v7'), true); ?></p>
                            <?php                            
								$icons = $options->get( 'header_v7_social_share' );
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

                </div>
            </div>
        </div>
        <!--End Header Top Style7-->
		<?php } ?>
        <!--Start Header-->
        <div class="header-style7">
            <div class="container">
                <div class="outer-box">

                    <!--Start Header Left-->
                    <div class="header-style7__left">
                        <div class="main-logo-box-style7">
                            <?php echo educamb_logo( $logo_type, $home_seven_logo, $home_seven_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--End Header Left-->

                    <!--Start Header Left-->
                    <div class="header-style7__middle">
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
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu6', 'container_id' => 'navbar-collapse-1',
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
                    <div class="header-style7__right">
                        <ul class="clearfix">
                            <?php if( $options->get('icon_user_link_v7') ){?>
                            <li>
                                <a href="<?php echo esc_url($options->get('icon_user_link_v7')); ?>">
                                    <span class="flaticon-user"></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php if( $options->get('btn_title_v7') ){?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v7')); ?>">
                                <span class="txt"><?php echo wp_kses($options->get('btn_title_v7'), true); ?></span>
                            </a>
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
                            <?php echo educamb_logo( $logo_type, $home_seven_logo, $home_seven_logo_dimension, $logo_text, $logo_typography ); ?>
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
                    if( $options->get('show_msocial_share_v7') ):
                    $icons = $options->get( 'mheader_social_share_v7' );
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