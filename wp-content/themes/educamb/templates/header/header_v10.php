<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Nine Logo Settings
$home_ten_logo = $options->get( 'home_ten_logo' );
$home_ten_logo_dimension = $options->get( 'header_ten_logo_dimension' );

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
    <header class="main-header header-style-ten">
		<?php if($options->get('show_topbar_v10')){ ?>
        <!--Start Header Top style10-->
        <div class="header-top-style10">
            <div class="container">
                <div class="outer-box">

                    <div class="header-top-style10-left">
                        <div class="logo-box-style10">
                            <?php echo educamb_logo( $logo_type, $home_ten_logo, $home_ten_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                        <?php if( $options->get('address_v10') ){?>
                        <div class="header-contact-info-style10">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <span class="flaticon-map"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($options->get('address_v10'), true); ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>


                    <div class="header-top-style10-right">
                        <?php if( $options->get('show_seach_form_v10') ){?>
                        <div class="search-box">
                            <button type="button" class="search-toggler">
                                <span class="icon-zoom"></span>
                            </button>
                        </div>
						<?php } ?>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Top style10-->
		<?php } ?>
        <!--Start Header Style10-->
        <div class="header-style10">
            <div class="container">
                <div class="outer-box">

                    <!--Start Header Style10 Left-->
                    <div class="header-style10-left">
                        <div class="nav-outer style10 clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <div class="inner">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <!-- Main Menu -->
                            <nav class="main-menu style10 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu9', 'container_id' => 'navbar-collapse-1',
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
					<?php if( $options->get('btn_title_v10') ){?>
                    <!--Start Header style10 Right-->
                    <div class="header-style10-right">
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v10')); ?>">
                                <span class="txt"><?php echo wp_kses($options->get('btn_title_v10'), true); ?></span>
                            </a>
                        </div>
                    </div>
                    <!--End Header style10 Right-->
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
                            <?php echo educamb_logo( $logo_type, $home_ten_logo, $home_ten_logo_dimension, $logo_text, $logo_typography ); ?>
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
                    if( $options->get('show_msocial_share_v10') ):
                    $icons = $options->get( 'mheader_social_share_v10' );
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
    <?php if( $options->get('show_seach_form_v10') ){?>
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