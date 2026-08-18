<?php
$options = educamb_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home Five Logo Settings
$home_five_logo = $options->get( 'home_five_logo' );
$home_five_logo_dimension = $options->get( 'home_five_logo_dimension' );

//Mobile Logo Settings
$mobile_logo1 = $options->get( 'mobile_logo_one' );
$mobile_logo_dimension1 = $options->get( 'mobile_logo_dimension_one' );

//Author Icon Image
$author_img5 = $options->get( 'author_logo5' );
$author_img5 = educamb_set( $author_img5, 'url', EDUCAMB_URI . 'assets/images/instructor/header-style4-user-1.jpg' );

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
    <header class="main-header header-style-four">
        <!--Start Header style4-->
        <div class="header-style4 header-style4--gray-bg">
            <div class="auto-container">
                <div class="outer-box">

                    <!--Start Header Left-->
                    <div class="header-style4__left">
                        <div class="logo-box-style4">
                            <?php echo educamb_logo( $logo_type, $home_five_logo, $home_five_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--End Header Left-->

                    <!--Start Header Left-->
                    <div class="header-style4__middle">
                        <div class="nav-outer nav-outer--style4 clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <div class="inner">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <!-- Main Menu -->
                            <nav class="main-menu main-menu--style4 navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu4', 'container_id' => 'navbar-collapse-1',
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
                    <div class="header-style4__right">
                        <div class="header-style4__user-cart-box">
                            <ul class="clearfix">
                                <?php if($options->get('author_img_link_v5')) {?>
                                <li>
                                    <div class="user-box-style1">
                                        <a href="<?php echo esc_url($options->get('author_img_link_v5')); ?>">
                                            <img src="<?php echo esc_url($author_img5); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                                        </a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php if($options->get('btn_title_v5')) {?>
                        <div class="btns-box">
                            <a class="btn-one" href="<?php echo esc_url($options->get('btn_link_v5')); ?>">
                                <span class="txt">
                                    <i class="flaticon-plus-sign"></i>
                                    <?php echo wp_kses($options->get('btn_title_v5'), true); ?>
                                </span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <!--End Header Right-->

                </div>
            </div>
        </div>
        <!--End Header style4-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="sticky-header__inner clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <div class="img-responsive">
                            <?php echo educamb_logo( $logo_type, $home_five_logo, $home_five_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu main-menu--style4 clearfix">
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
                    if( $options->get('show_msocial_share_v5') ):
                    $icons = $options->get( 'mheader_social_share_v5' );
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

