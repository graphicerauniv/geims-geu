<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Sidebar Logo Settings
$sidebar_logo = $options->get( 'sidebar_logo' );
$sidebar_logo_dimension = $options->get( 'sidebar_logo_dimension' );

//Home Three Logo Settings
$home_three_logo = $options->get( 'home_three_logo' );
$home_three_logo_dimension = $options->get( 'home_three_logo_dimension' );

//Home One Sticky Logo Settings
$home_sticky_logo3 = $options->get( 'home_sticky_logo_three' );
$home_sticky_logo_dimension3 = $options->get( 'home_sticky_logo_dimension_three' );

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
    <?php if( $options->get('show_sidebar_info') ):?>
    <!-- Start sidebar widget content -->
    <div class="xs-sidebar-group info-group info-sidebar">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">X</a>
                </div>
                <div class="sidebar-textwidget">
                    <div class="sidebar-info-contents">
                        <div class="content-inner">
                            <div class="logo">
                                <?php echo educamb_logo( $logo_type, $sidebar_logo, $sidebar_logo_dimension, $logo_text, $logo_typography ); ?>
                            </div>
                            <?php if($options->get('sidebar_title_v3') || $options->get('sidebar_text_v3')) { ?>
                            <div class="content-box">
                                <h4><?php echo wp_kses($options->get('sidebar_title_v3'), true); ?></h4>
                                <div class="inner-text">
                                    <p>
                                        <?php echo wp_kses($options->get('sidebar_text_v3'), true); ?>
                                    </p>
                                </div>
                            </div>
							<?php } ?>
                            <?php if($options->get('sidebar_form_title_v3')) { ?>
                            <div class="form-inner">
                                <h4><?php echo wp_kses($options->get('sidebar_form_title_v3'), true); ?></h4>
                                <?php echo do_shortcode($options->get('sidebar_form_code_v3')); ?>
                            </div>
							<?php } ?>
                            <?php if($options->get('sidebar_address_v3') || $options->get('sidebar_Phone_no_v3') || $options->get('sidebar_email_v3')) { ?>
                            <div class="sidebar-contact-info">
                                <?php if($options->get('sidebar_info_title_v3')) { ?><h4><?php echo wp_kses($options->get('sidebar_info_title_v3'), true); ?></h4><?php } ?>
                                <ul>
                                    <?php if($options->get('sidebar_address_v3')) { ?>
                                    <li>
                                        <span class="flaticon-map"></span> <?php echo wp_kses($options->get('sidebar_address_v3'), true); ?>
                                    </li>
                                    <?php } ?>
                                    <?php if($options->get('sidebar_Phone_no_v3')) { ?>
                                    <li>
                                        <span class="flaticon-telephone"></span>
                                        <a href="tel:<?php echo esc_attr($options->get('sidebar_Phone_no_v3')); ?>"><?php echo wp_kses($options->get('sidebar_Phone_no_v3'), true); ?></a>
                                    </li>
                                    <?php } ?>
                                    <?php if($options->get('sidebar_email_v3')) { ?>
                                    <li>
                                        <span class="flaticon-email"></span>
                                        <a href="mailto:<?php echo esc_attr($options->get('sidebar_email_v3')); ?>"><?php echo wp_kses($options->get('sidebar_email_v3'), true); ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <div class="thm-social-link1">
                                <?php
									$icons = $options->get( 'sheader_social_share_v3' );
									if ( ! empty( $icons ) ) :
								?>
								<ul class="social-box">
									<?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( educamb_set( $h_icon, 'data' ) ) );
									if ( educamb_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', educamb_set( $header_social_icons, 'icon' ) );
									?>
										<li><a href="<?php echo esc_url(educamb_set( $header_social_icons, 'url' )); ?>" <?php if( educamb_set( $header_social_icons, 'background' ) || educamb_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(educamb_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(educamb_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fa <?php echo esc_attr( educamb_set( $header_social_icons, 'icon' ) ); ?>" aria-hidden="true"></i></a></li>
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
    <!-- End sidebar widget content -->
	<?php endif; ?>
    <!-- Main header-->
    <header class="main-header header-style-three">

        <!--Start Header Top Style3-->
        <div class="header-top-style3">
            <div class="auto-container">
                <div class="outer-box">

                    <div class="header-top-style3-left">
                        <div class="main-logo-box-style3">
                            <?php echo educamb_logo( $logo_type, $home_three_logo, $home_three_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                        <?php if( $options->get('show_sidebar_info') ):?>
                        <div class="side-content-button-style1">
                            <a class="navSidebar-button" href="#">
                                <span class="icon-menu"></span>
                                <p><?php esc_html_e('Explore', 'educamb');?></p>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if( $options->get('show_seach_form_v3') ){?>
                        <div class="serach-button-style2">
                            <?php get_template_part('searchform2')?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="header-top-style3-right">
                        <?php if($options->get('btn_title_v3') || $options->get('btn_title2_v3')) { ?>
                        <div class="header-top-style3-right__btn">
                            <?php if($options->get('btn_title_v3')) { ?>
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v3')); ?>">
                                <span class="txt"><i class="icon-key"></i> <?php echo wp_kses($options->get('btn_title_v3'), true); ?></span>
                            </a>
                            <?php } ?>
							<?php if($options->get('btn_title2_v3')) { ?>
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link2_v3')); ?>">
                                <span class="txt"><i class="icon-right-arrow-1"></i> <?php echo wp_kses($options->get('btn_title2_v3'), true); ?></span>
                            </a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Top Style3-->

        <!--Start Header Style3-->
        <div class="header-style3">
            <div class="auto-container">
                <div class="outer-box">

                    <div class="header-middle">
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
                            <nav class="main-menu style3 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu2', 'container_id' => 'navbar-collapse-1',
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
                            <?php echo educamb_logo( $logo_type, $home_sticky_logo3, $home_sticky_logo_dimension3, $logo_text, $logo_typography ); ?>
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
                    if( $options->get('show_msocial_share_v3') ):
                    $icons = $options->get( 'mheader_social_share_v3' );
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