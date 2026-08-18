<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Theme Kalia
 * @author     Theme Kalia
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>
	
	<?php if( $data->get( 'banner_style' ) == 'banner_v2' ):?>
    <!-- 
	=============================================
		Kindergarten Home Page Banner
	============================================== 
	-->
	<!--Start breadcrumb area paroller-->
    <section class="breadcrumb-style2-area">
        <div class="breadcrumb-style2-area-bg"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="breadcrumb-style2-area-shape"
            style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/thm-shape-5.png);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style2">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
	<!-- 
	=============================================
		End Kindergarten Home Page Banner
	============================================== 
	-->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v3' ):?>
    <!-- 
    =============================================
        Academy Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb area paroller-->
    <section class="breadcrumb-style3-area">
        <div class="main-slider-style3__outer-content">
            
        </div>
        <div class="breadcrumb-style3-area__inner">
            <div class="breadcrumb-style3-area-bg"
                style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content">
                            <div class="breadcrumb-menu-style3">
                                <ul>
                                    <?php echo educamb_the_breadcrumb(); ?>
                                </ul>
                            </div>
                            <div class="title">
                                <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <!-- 
    =============================================
        End Academy Home Page Banner
    ============================================== 
    -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v4' ):?>
    <!-- 
    =============================================
        Instructor Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb area paroller-->
    <section class="breadcrumb-style4-area">
        <div class="parallax-scene parallax-scene-1">
            <div data-depth="0.20" class="parallax-layer">
                <div class="breadcrumb-style4-area-shape1">
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/breadcrumb-style4-area-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                </div>
            </div>
        </div>
        <div class="breadcrumb-style4-area-shape3">
            <img class="float-bob-y" src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/breadcrumb-style4-area-shape-3.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-style4__content">
                        <div class="breadcrumb-style4-area-shape2">
                            <img class="float-bob"
                                src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/instructor/shape/breadcrumb-style4-area-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb');?>">
                        </div>
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style4">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <!-- 
    =============================================
        End Instructor Home Page Banner
    ============================================== 
    -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v5' ):?>
	<!-- 
    =============================================
        Marketplace Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb style5 area-->
    <section class="breadcrumb-style5-area">
        <div class="thm-pattern-style5" style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/assets/images/pattern/thm-pattern-2.png);">
        </div>
        <div class="breadcrumb-style5-area-bg"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style5">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--End breadcrumb style5 area-->
    <!-- 
    =============================================
        End Marketplace Home Page Banner
    ============================================== 
    -->
	<?php elseif( $data->get( 'banner_style' ) == 'banner_v6' ):?>
	<!-- 
    =============================================
        Single Course Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb style6 area-->
    <section class="breadcrumb-style6-area">
        <div class="breadcrumb-style6-area-left float-bob-y"
            style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/assets/images/single-course/shape/breadcrumb-style6-area-left-shape.jpg);">
        </div>
        <div class="breadcrumb-style6-area-right"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style6">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb style6 area-->
    <!-- 
    =============================================
        End Single Course Home Page Banner
    ============================================== 
    -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v7' ):?>
	<!-- 
    =============================================
        Cooking Course Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb style7 area-->
    <section class="breadcrumb-style7-area">
        <div class="breadcrumb-style7-area-bg"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style7">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb style7 area-->
    <!-- 
    =============================================
        End Cooking Course Home Page Banner
    ============================================== 
    -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v8' ):?>
	<!--Start breadcrumb Style8 Area -->
    <section class="breadcrumb-style8-area">
        <div class="breadcrumb-style8-area-shape-1">
            <img class="float-bob-x" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/quiz-learning/shape/breadcrumb-style8-area-shape-1.png"
                alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="breadcrumb-style8-area-shape-2">
                            <img class="float-bob-x"
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/quiz-learning/shape/breadcrumb-style8-area-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                        </div>
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu-style8">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style8 Area -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v9' ):?>
	<!-- 
    =============================================
        College Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb area-->
    <section class="breadcrumb-style9-area">
        <div class="breadcrumb-style9-area-bg"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <!-- 
    =============================================
        End College Home Page Banner
    ============================================== 
    -->
    <?php elseif( $data->get( 'banner_style' ) == 'banner_v10' ):?>
      <!-- 
    =============================================
        High School Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb area-->
    <section class="breadcrumb-style10-area">
        <div class="breadcrumb-style10-area-bg"
            style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="main-slider-style10-shape-bg"
            style="background-image:url('<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/main-slider-style10-shape-bg.png')"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <!-- 
    =============================================
        End High School Home Page Banner
    ============================================== 
    --> 
       
	<?php else:?>
    <!-- 
    =============================================
        University Home Page Banner
    ============================================== 
    -->
    <!--Start breadcrumb area paroller-->
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <?php echo educamb_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
     
<?php endif; endif; ?>