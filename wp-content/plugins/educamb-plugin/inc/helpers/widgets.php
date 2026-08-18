<?php
///----footer One widgets---
//About Company
class Educamb_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company', /* Name */esc_html__('Educamb About Company','educamb'), array( 'description' => esc_html__('Show the About Company', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );


		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="our-company-info">
                <?php if($instance['content']) { ?>
                <div class="text-box">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                </div>
                <?php } ?>
                <?php if($instance['btn_title1'] || $instance['btn_title2']) { ?>
                <ul>
                    <?php if($instance['btn_title1']) { ?>
                    <li>
                        <div class="icon">
                            <span class="icon-map"></span>
                        </div>
                        <div class="text">
                            <a href="<?php echo esc_url($instance['btn_link1']); ?>"><?php echo wp_kses_post($instance['btn_title1']); ?></a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if($instance['btn_title2']) { ?>
                    <li>
                        <div class="icon">
                            <span class="icon-chat"></span>
                        </div>
                        <div class="text">
                            <a href="<?php echo esc_url($instance['btn_link2']); ?>"><?php echo wp_kses_post($instance['btn_title2']); ?></a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_title1'] = $new_instance['btn_title1'];
		$instance['btn_link1'] = $new_instance['btn_link1'];
		$instance['btn_title2'] = $new_instance['btn_title2'];
		$instance['btn_link2'] = $new_instance['btn_link2'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Campus', 'educamb');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title1 = ($instance) ? esc_attr($instance['btn_title1']) : '';
		$btn_link1 = ($instance) ? esc_attr($instance['btn_link1']) : '';
		$btn_title2 = ($instance) ? esc_attr($instance['btn_title2']) : '';
		$btn_link2 = ($instance) ? esc_attr($instance['btn_link2']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title1')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title1')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title1')); ?>" type="text" value="<?php echo esc_attr($btn_title1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link1')); ?>"><?php esc_html_e('Button Url:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link1')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link1')); ?>" type="text" value="<?php echo esc_attr($btn_link1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title2')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title2')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title2')); ?>" type="text" value="<?php echo esc_attr($btn_title2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link2')); ?>"><?php esc_html_e('Button Url:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link2')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link2')); ?>" type="text" value="<?php echo esc_attr($btn_link2); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Get In Touch
class Educamb_Get_In_Touch extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Get_In_Touch', /* Name */esc_html__('Educamb Get In Touch','educamb'), array( 'description' => esc_html__('Show the Get In Touch', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="pdtop50">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="footer-widget-contact-info">
                    <?php if($instance['content2']) { ?>
                    <p><?php echo wp_kses_post($instance['content2']); ?></p>
                    <?php } ?>
                    <ul>
                        <li><a href="tel:<?php echo esc_attr($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></li>
                        <li><a href="mailto:<?php echo esc_attr($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></li>
                    </ul>
                </div>
            </div>            
                           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content2'] = $new_instance['content2'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Get in Touch', 'educamb');
		$content2 = ($instance) ? esc_attr($instance['content2']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content2')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content2')); ?>" name="<?php echo esc_attr($this->get_field_name('content2')); ?>" ><?php echo wp_kses_post($content2); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('123-1234-1122', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>     
                
		<?php 
	}
	
}

///----footer Two widgets---
//About Company V2
class Educamb_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company_V2', /* Name */esc_html__('Educamb About Company V2','educamb'), array( 'description' => esc_html__('Show the About Company V2', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );


		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="our-company-info">
                <?php if($instance['content3']) { ?>
                <div class="text-box">
                    <p><?php echo wp_kses_post($instance['content3']); ?></p>
                </div>
				<?php } ?>
                <div class="footer-social-link">
                    <?php if($instance['footer2_social_title']) { ?>
                    <div class="inner-title">
                        <h3><?php echo wp_kses_post($instance['footer2_social_title']); ?></h3>
                    </div>
                    <?php } ?>
                    <!-- Social Box -->                    
                    <?php if( $instance['show'] ): ?>
                    <?php echo wp_kses_post(educamb_get_social_icon()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content3'] = $new_instance['content3'];
		$instance['footer2_social_title'] = $new_instance['footer2_social_title'];
		$instance['show'] = $new_instance['show'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Campus', 'educamb');
		$content3 = ($instance) ? esc_attr($instance['content3']) : '';
		$footer2_social_title = ($instance) ? esc_attr($instance['footer2_social_title']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content3')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content3')); ?>" name="<?php echo esc_attr($this->get_field_name('content3')); ?>" ><?php echo wp_kses_post($content3); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('footer2_social_title')); ?>"><?php esc_html_e('Social Icon Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Social Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('footer2_social_title')); ?>" name="<?php echo esc_attr($this->get_field_name('footer2_social_title')); ?>" type="text" value="<?php echo esc_attr($footer2_social_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'educamb'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>            
                
		<?php 
	}
	
}

//Subscribe Us
class Educamb_Subscribe_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Subscribe_Us', /* Name */esc_html__('Educamb Subscribe Us','educamb'), array( 'description' => esc_html__('Show the Subscribe Us', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      		
        <div class="pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="footer-widget-subscribe-form-box">
                <?php if($instance['content4']) { ?>
                <div class="text">
                    <p><?php echo wp_kses_post($instance['content4']); ?></p>
                </div>
                <?php } ?>
                <div class="subscribe-form-box-outer">
                    <div class="newsletter-form">
                        <?php echo do_shortcode($instance['form_url']); ?>
                    </div>
                </div>
                <?php if($instance['form_content']) { ?>
                <div class="bottom-text">
                    <p><?php echo wp_kses_post($instance['form_content']); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
        
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content4'] = $new_instance['content4'];
		$instance['form_url'] = $new_instance['form_url'];
		$instance['form_content'] = $new_instance['form_content'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe Us';
		$content4 = ($instance) ? esc_attr($instance['content4']) : '';
		$form_url = ($instance) ? esc_attr($instance['form_url']) : '';
		$form_content = ($instance) ? esc_attr($instance['form_content']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content4')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content4')); ?>" name="<?php echo esc_attr($this->get_field_name('content4')); ?>" ><?php echo wp_kses_post($content4); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url')); ?>" type="text" value="<?php echo esc_attr($form_url); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_content')); ?>"><?php esc_html_e('Mail Chimp Form Content:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Content', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_content')); ?>" name="<?php echo esc_attr($this->get_field_name('form_content')); ?>" type="text" value="<?php echo esc_attr($form_content); ?>" />
        </p>
               
		<?php 
	}
	
}

///----footer Three widgets---
//Google Play
class Educamb_Google_Play extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Google_Play', /* Name */esc_html__('Educamb Google Play','educamb'), array( 'description' => esc_html__('Show the Google Play', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      	
        <div class="pdtop50">
            <div class="footer-widget-info-box-style3">
                <?php if($instance['title']) { ?><h2><?php echo wp_kses_post($instance['title']); ?></h2><?php } ?>
                <?php if($instance['content5']) { ?><p><?php echo wp_kses_post($instance['content5']); ?></p><?php } ?>
                <div class="btns-box">
                    <?php if($instance['google_btn']) { ?>
                    <a class="btn-one btn-one--style4 google-play" href="<?php echo esc_attr($instance['google_btn_link']); ?>">
                        <span class="txt">
                            <i class="icon-play-store"></i>
                            <?php echo wp_kses_post($instance['google_btn']); ?>
                        </span>
                    </a>
                    <?php } ?>
                    <?php if($instance['apple_link']) { ?><a class="apple" href="<?php echo esc_attr($instance['apple_link']); ?>"><span class="icon-apple"></span></a><?php } ?>
                </div>
            </div>
        </div>            
                           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['content5'] = $new_instance['content5'];
		$instance['google_btn'] = $new_instance['google_btn'];
		$instance['google_btn_link'] = $new_instance['google_btn_link'];
		$instance['apple_link'] = $new_instance['apple_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title = ( $instance ) ? esc_attr($instance['title']) : '';
		$content5 = ($instance) ? esc_attr($instance['content5']) : '';
		$google_btn = ($instance) ? esc_attr($instance['google_btn']) : '';
		$google_btn_link = ($instance) ? esc_attr($instance['google_btn_link']) : '';
		$apple_link = ($instance) ? esc_attr($instance['apple_link']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" ><?php echo wp_kses_post($title); ?></textarea>
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content5')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content5')); ?>" name="<?php echo esc_attr($this->get_field_name('content5')); ?>" ><?php echo wp_kses_post($content5); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google_btn')); ?>"><?php esc_html_e('Google Play Title:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google_btn')); ?>" name="<?php echo esc_attr($this->get_field_name('google_btn')); ?>" type="text" value="<?php echo esc_attr($google_btn); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google_btn_link')); ?>"><?php esc_html_e('Google Play Link:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('google_btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('google_btn_link')); ?>" type="text" value="<?php echo esc_attr($google_btn_link); ?>" />
        </p>     
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('apple_link')); ?>"><?php esc_html_e('Apple App Link:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('apple_link')); ?>" name="<?php echo esc_attr($this->get_field_name('apple_link')); ?>" type="text" value="<?php echo esc_attr($apple_link); ?>" />
        </p>
                
		<?php 
	}
	
}


///----footer Four widgets---
//About Company V3
class Educamb_About_Company_v3 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company_V3', /* Name */esc_html__('Educamb About Company V3','educamb'), array( 'description' => esc_html__('Show the About Company V3', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php if($instance['widget_logo_img']){ ?>
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                </a>
            </div>
            <?php } ?>
            <div class="our-company-info">
                <?php if($instance['content6']) { ?>
                <div class="text-box">
                    <p><?php echo wp_kses_post($instance['content6']); ?></p>
                </div>
                <?php } ?>
                <div class="get-in-touch">
                    <h3><?php echo wp_kses_post($instance['contact_title']); ?></h3>
                    <ul>
                        <li><a href="tel:<?php echo esc_attr($instance['phone_no2']); ?>"><?php echo wp_kses_post($instance['phone_no2']); ?></a></li>
                        <li><a href="mailto:<?php echo esc_attr($instance['email2']); ?>"><?php echo wp_kses_post($instance['email2']); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content6'] = $new_instance['content6'];
		$instance['contact_title'] = $new_instance['contact_title'];
		$instance['phone_no2'] = $new_instance['phone_no2'];
		$instance['email2'] = $new_instance['email2'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ( $instance ) ? esc_attr($instance['widget_logo_img']) : '';
		$content6 = ($instance) ? esc_attr($instance['content6']) : '';
		$contact_title = ($instance) ? esc_attr($instance['contact_title']) : '';
		$phone_no2 = ($instance) ? esc_attr($instance['phone_no2']) : '';
		$email2 = ($instance) ? esc_attr($instance['email2']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Enter Logo Image:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content6')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content6')); ?>" name="<?php echo esc_attr($this->get_field_name('content6')); ?>" ><?php echo wp_kses_post($content6); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_title')); ?>"><?php esc_html_e('Contact Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_title')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_title')); ?>" type="text" value="<?php echo esc_attr($contact_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no2')); ?>"><?php esc_html_e('Phone Number:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('+123-1234-2211', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no2')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no2')); ?>" type="text" value="<?php echo esc_attr($phone_no2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email2')); ?>"><?php esc_html_e('Email Address:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email2')); ?>" name="<?php echo esc_attr($this->get_field_name('email2')); ?>" type="text" value="<?php echo esc_attr($email2); ?>" />
        </p>             
                
		<?php 
	}
	
}


///----footer Five widgets---
//New Offer
class Educamb_New_Offer extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_New_Offer', /* Name */esc_html__('Educamb New Offer','educamb'), array( 'description' => esc_html__('Show the New Offer', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <div class="footer-widget-banner-box">
                <?php if($instance['widget_bg_img']){ ?>
                <div class="footer-widget-banner-box-bg"
                    style="background-image: url(<?php echo esc_url($instance['widget_bg_img']); ?>);">
                </div>
                <?php } ?>
                <h3><?php echo wp_kses_post($instance['offer_title']); ?></h3>
                <p><?php echo wp_kses_post($instance['content7']); ?></p>
                <div class="offer-box">
                    <?php echo wp_kses_post($instance['offer_text']); ?>
                </div>
                <?php if($instance['btn_title3']) { ?>
                <div class="btns-box">
                    <a class="btn-one" href="<?php echo esc_url($instance['btn_link3']); ?>">
                        <span class="txt"><?php echo wp_kses_post($instance['btn_title3']); ?></span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_bg_img'] = $new_instance['widget_bg_img'];
		$instance['offer_title'] = $new_instance['offer_title'];
		$instance['content7'] = $new_instance['content7'];
		$instance['offer_text'] = $new_instance['offer_text'];
		$instance['btn_title3'] = $new_instance['btn_title3'];
		$instance['btn_link3'] = $new_instance['btn_link3'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_bg_img = ( $instance ) ? esc_attr($instance['widget_bg_img']) : '';
		$offer_title = ($instance) ? esc_attr($instance['offer_title']) : '';
		$content7 = ($instance) ? esc_attr($instance['content7']) : '';
		$offer_text = ($instance) ? esc_attr($instance['offer_text']) : '';
		$btn_title3 = ($instance) ? esc_attr($instance['btn_title3']) : '';
		$btn_link3 = ($instance) ? esc_attr($instance['btn_link3']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>"><?php esc_html_e('Enter BG Image:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('BG Image Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img')); ?>" type="text" value="<?php echo esc_attr($widget_bg_img); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('offer_title')); ?>"><?php esc_html_e('Title:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('offer_title')); ?>" name="<?php echo esc_attr($this->get_field_name('offer_title')); ?>" ><?php echo wp_kses_post($offer_title); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content7')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('content7')); ?>" name="<?php echo esc_attr($this->get_field_name('content7')); ?>" type="text" value="<?php echo esc_attr($content7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('offer_text')); ?>"><?php esc_html_e('Offer Text:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('offer_text')); ?>" name="<?php echo esc_attr($this->get_field_name('offer_text')); ?>" ><?php echo wp_kses_post($offer_text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title3')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title3')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title3')); ?>" type="text" value="<?php echo esc_attr($btn_title3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link3')); ?>"><?php esc_html_e('Button Link:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Link', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link3')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link3')); ?>" type="text" value="<?php echo esc_attr($btn_link3); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Popular Posts
class Educamb_Popular_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Popular_Posts', /* Name */esc_html__('Educamb Popular Posts','educamb'), array( 'description' => esc_html__('Show the Popular Posts', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
		
        <div class="pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="footer-widget-blog-post">
                <ul>
                	<?php $query_string = array('showposts'=>$instance['number']);
						if ($instance['cat']) {
							$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
						}
						$this->posts($query_string); 
					?>                    
                </ul>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Posts', 'educamb');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'educamb'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'educamb'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <div class="img-box">
                    <div class="inner" style="background-image:url('<?php echo esc_url($post_thumbnail_url);?>'); ">
                        <div class="overlay-style-one">
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                                <span class="icon-right-arrow-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-box">
                    <p><span class="icon-calendar"></span> <?php echo get_the_date();?></p>
                    <h4>
                        <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>
            </li>            
			<?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


///----footer Seven widgets---
//Get In Touch V2
class Educamb_Get_In_Touch_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Get_In_Touch_V2', /* Name */esc_html__('Educamb Get In Touch V2','educamb'), array( 'description' => esc_html__('Show the Get In Touch V2', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      	
        <div class="pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="footer-widget-style7-contact-info-box">
                <ul>
                    <?php if($instance['address_title7'] || $instance['address7']) { ?>
                    <li>
                        <div class="icon">
                            <span class="flaticon-map"></span>
                        </div>
                        <div class="text">
                            <h4><?php echo wp_kses_post($instance['address_title7']); ?></h4>
                            <p><?php echo wp_kses_post($instance['address7']); ?></p>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if($instance['phone_title7'] || $instance['phone_no7']) { ?>
                    <li>
                        <div class="icon">
                            <span class="flaticon-telephone"></span>
                        </div>
                        <div class="text">
                            <h4><?php echo wp_kses_post($instance['phone_title7']); ?></h4>
                            <p><a href="tel:<?php echo esc_attr($instance['phone_no7']); ?>"><?php echo wp_kses_post($instance['phone_no7']); ?></a></p>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if($instance['email_title7'] || $instance['email7']) { ?>
                    <li>
                        <div class="icon">
                            <span class="flaticon-email"></span>
                        </div>
                        <div class="text">
                            <h4><?php echo wp_kses_post($instance['email_title7']); ?></h4>
                            <p><a href="mailto:<?php echo esc_attr($instance['email7']); ?>"><?php echo wp_kses_post($instance['email7']); ?></a></p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>            
                           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address_title7'] = $new_instance['address_title7'];
		$instance['address7'] = $new_instance['address7'];
		$instance['phone_title7'] = $new_instance['phone_title7'];
		$instance['phone_no7'] = $new_instance['phone_no7'];
		$instance['email_title7'] = $new_instance['email_title7'];
		$instance['email7'] = $new_instance['email7'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title = ( $instance ) ? esc_attr($instance['title']) : '';
		$address_title7 = ($instance) ? esc_attr($instance['address_title7']) : '';
		$address7 = ($instance) ? esc_attr($instance['address7']) : '';
		$phone_title7 = ($instance) ? esc_attr($instance['phone_title7']) : '';
		$phone_no7 = ($instance) ? esc_attr($instance['phone_no7']) : '';
		$email_title7 = ($instance) ? esc_attr($instance['email_title7']) : '';
		$email7 = ($instance) ? esc_attr($instance['email7']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address_title7')); ?>"><?php esc_html_e('Address Title:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address_title7')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title7')); ?>" type="text" value="<?php echo esc_attr($address_title7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address7')); ?>"><?php esc_html_e('Address:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address7')); ?>" name="<?php echo esc_attr($this->get_field_name('address7')); ?>" type="text" value="<?php echo esc_attr($address7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title7')); ?>"><?php esc_html_e('Phone Title:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title7')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title7')); ?>" type="text" value="<?php echo esc_attr($phone_title7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no7')); ?>"><?php esc_html_e('Phone Number:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('123-1234-1122', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no7')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no7')); ?>" type="text" value="<?php echo esc_attr($phone_no7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_title7')); ?>"><?php esc_html_e('Email Title:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title7')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title7')); ?>" type="text" value="<?php echo esc_attr($email_title7); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email7')); ?>"><?php esc_html_e('Email Address:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email7')); ?>" name="<?php echo esc_attr($this->get_field_name('email7')); ?>" type="text" value="<?php echo esc_attr($email7); ?>" />
        </p>     
                
		<?php 
	}
	
}

//Our Gallery
class Educamb_Our_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Our_Gallery', /* Name */esc_html__('Educamb Our Gallery','educamb'), array( 'description' => esc_html__('Show the Our Gallery', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
		
        <div class="single-footer-widget-style7 pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="single-footer-widget-style7-instagram">
                <ul>
					<?php 
                        $args = array('post_type' => 'project', 'showposts'=>$instance['number']);
                        if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
                        $this->posts($args);
                    ?>
                </ul>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Posts', 'educamb');
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'educamb'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'educamb'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <div class="img-box" style="background-image:url('<?php echo esc_url($post_thumbnail_url);?>'); ">
                    <div class="overlay-content">
                        <a class="lightbox-image" data-fancybox="gallery"
                            href="<?php echo esc_url($post_thumbnail_url);?>">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </li>            
			<?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer Eight widgets---
//About Company V4
class Educamb_About_Company_v4 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company_v4', /* Name */esc_html__('Educamb About Company V4','educamb'), array( 'description' => esc_html__('Show the About Company V4', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php if($instance['widget_logo_img2']){ ?>
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($instance['widget_logo_img2']); ?>" alt="<?php esc_attr_e('Awesome Image', 'educamb'); ?>">
                </a>
            </div>
            <?php } ?>
            <?php if($instance['content8']){ ?>
            <div class="footer-widget-our-info">
                <p><?php echo wp_kses_post($instance['content8']); ?></p>
            </div>
            <?php } ?>
            <?php if($instance['phone_title8'] || $instance['phone_no8']){ ?>
            <div class="phone-number-box2">
                <div class="icon">
                    <span class="flaticon-phone-call"></span>
                </div>
                <div class="phone">
                    <h4><?php echo wp_kses_post($instance['phone_title8']); ?></h4>
                    <a href="tel:<?php echo esc_attr($instance['phone_no8']); ?>"><?php echo wp_kses_post($instance['phone_no8']); ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_logo_img2'] = $new_instance['widget_logo_img2'];
		$instance['content8'] = $new_instance['content8'];
		$instance['phone_title8'] = $new_instance['phone_title8'];
		$instance['phone_no8'] = $new_instance['phone_no8'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img2 = ( $instance ) ? esc_attr($instance['widget_logo_img2']) : '';
		$content8 = ($instance) ? esc_attr($instance['content8']) : '';
		$phone_title8 = ($instance) ? esc_attr($instance['phone_title8']) : '';
		$phone_no8 = ($instance) ? esc_attr($instance['phone_no8']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img2')); ?>"><?php esc_html_e('Enter Logo Image:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img2')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img2')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img2); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content8')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content8')); ?>" name="<?php echo esc_attr($this->get_field_name('content8')); ?>" ><?php echo wp_kses_post($content8); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title8')); ?>"><?php esc_html_e('Phone Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Phone Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title8')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title8')); ?>" type="text" value="<?php echo esc_attr($phone_title8); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no8')); ?>"><?php esc_html_e('Phone Number:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('+123-1234-2211', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no8')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no8')); ?>" type="text" value="<?php echo esc_attr($phone_no8); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Newsletter Form
class Educamb_Newsletter_Form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Newsletter_Form', /* Name */esc_html__('Educamb Newsletter Form','educamb'), array( 'description' => esc_html__('Show the Newsletter Form', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      	
        <div class="margintop13 pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="footer-widget-style8-subscribe-box">
                <div class="text">
                    <p><?php echo wp_kses_post($instance['form_title']); ?></p>
                </div>
                <div class="subscribe-form">
                    <?php echo do_shortcode($instance['form_url8']); ?>
                </div>
            </div>
        </div>
        
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['form_title'] = $new_instance['form_title'];
		$instance['form_url8'] = $new_instance['form_url8'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$form_title = ($instance) ? esc_attr($instance['form_title']) : '';
		$form_url8 = ($instance) ? esc_attr($instance['form_url8']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_title')); ?>"><?php esc_html_e('Newsletter Form Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Newsletter Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_title')); ?>" name="<?php echo esc_attr($this->get_field_name('form_title')); ?>" type="text" value="<?php echo esc_attr($form_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url8')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url8')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url8')); ?>" type="text" value="<?php echo esc_attr($form_url8); ?>" />
        </p>
               
		<?php 
	}
	
}

///----footer Nine widgets---
//About Company V5
class Educamb_About_Company_V5 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company_V5', /* Name */esc_html__('Educamb About Company V5','educamb'), array( 'description' => esc_html__('Show the About Company V5', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="our-company-info">
                <?php if($instance['content9']) { ?>
                <div class="text-box">
                    <p><?php echo wp_kses_post($instance['content9']); ?></p>
                </div>
                <?php } ?>
                <?php if($instance['btn_title9']) { ?>
                <div class="button-box">
                    <a class="btn-one" href="<?php echo esc_url($instance['btn_link9']); ?>"><span class="txt"><?php echo wp_kses_post($instance['btn_title9']); ?></span></a>
                </div>
                <?php } ?>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content9'] = $new_instance['content9'];
		$instance['btn_title9'] = $new_instance['btn_title9'];
		$instance['btn_link9'] = $new_instance['btn_link9'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Campus', 'educamb');
		$content9 = ($instance) ? esc_attr($instance['content9']) : '';
		$btn_title9 = ($instance) ? esc_attr($instance['btn_title9']) : '';
		$btn_link9 = ($instance) ? esc_attr($instance['btn_link9']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content9')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content9')); ?>" name="<?php echo esc_attr($this->get_field_name('content9')); ?>" ><?php echo wp_kses_post($content9); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title9')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title9')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title9')); ?>" type="text" value="<?php echo esc_attr($btn_title9); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link9')); ?>"><?php esc_html_e('Button Url:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link9')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link9')); ?>" type="text" value="<?php echo esc_attr($btn_link9); ?>" />
        </p>             
                
		<?php 
	}
	
}

//Popular Posts V2
class Educamb_Popular_Posts_V2 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Popular_Posts_V2', /* Name */esc_html__('Educamb Popular Posts V2','educamb'), array( 'description' => esc_html__('Show the Popular Posts V2', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
		
        
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <div class="footer-widget-blog-post footer-widget-blog-post--style2">
            <ul>
                <?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?> 
            </ul>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Posts', 'educamb');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'educamb'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'educamb'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <div class="img-box">
                    <div class="inner" style="background-image:url('<?php echo esc_url($post_thumbnail_url);?>'); ">
                        <div class="overlay-style-one">
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                                <span class="icon-right-arrow-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-box">
                    <p><span class="icon-calendar"></span> <?php echo get_the_date();?></p>
                    <h4>
                        <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>
            </li>          
			<?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


//About Company V6
class Educamb_About_Company_V6 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_About_Company_V6', /* Name */esc_html__('Educamb About Company V6','educamb'), array( 'description' => esc_html__('Show the About Company V6', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget);?>
      	
        <div class="marbtm50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="our-company-info">
                <?php if($instance['content10']) { ?>
                <div class="text-box">
                    <p><?php echo wp_kses_post($instance['content10']); ?></p>
                </div>
				<?php } ?>
                <?php if($instance['phone_no10'] || $instance['email10']) { ?>
                <div class="phone-number-box2">
                    <div class="icon">
                        <span class="flaticon-phone-call"></span>
                    </div>
                    <div class="phone">
                        <a href="tel:<?php echo esc_attr($instance['phone_no10']); ?>"><?php echo wp_kses_post($instance['phone_no10']); ?> </a>
                        <a href="mailto:<?php echo esc_attr($instance['email10']); ?>"><?php echo wp_kses_post($instance['email10']); ?></a>
                    </div>
                </div>
                <?php } ?>
                <div class="footer-social-link">
                    <!-- Social Box -->                    
                    <?php if( $instance['show'] ): ?>
                    <?php echo wp_kses_post(educamb_get_social_icon()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content10'] = $new_instance['content10'];
		$instance['phone_no10'] = $new_instance['phone_no10'];
		$instance['email10'] = $new_instance['email10'];
		$instance['show'] = $new_instance['show'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : '';
		$content10 = ($instance) ? esc_attr($instance['content10']) : '';
		$phone_no10 = ($instance) ? esc_attr($instance['phone_no10']) : '';
		$email10 = ($instance) ? esc_attr($instance['email10']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content10')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content10')); ?>" name="<?php echo esc_attr($this->get_field_name('content10')); ?>" ><?php echo wp_kses_post($content10); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no10')); ?>"><?php esc_html_e('Phone Number:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no10')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no10')); ?>" type="text" value="<?php echo esc_attr($phone_no10); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email10')); ?>"><?php esc_html_e('Email Address:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email10')); ?>" name="<?php echo esc_attr($this->get_field_name('email10')); ?>" type="text" value="<?php echo esc_attr($email10); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'educamb'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>            

                
		<?php 
	}
	
}

//Consult With Us
class Educamb_Consult_With_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Consult_With_Us', /* Name */esc_html__('Educamb Consult With Us','educamb'), array( 'description' => esc_html__('Show the Consult With Us', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>
      	
        <div class="footer-widget-style10-info-box">
            <p><?php echo wp_kses_post($instance['title10']); ?></p>
            <h3><?php echo wp_kses_post($instance['content10']); ?></h3>
            <ul>
                <?php if($instance['btn_title10']) { ?>
                <li>
                    <a class="btn-one" href="<?php echo esc_url($instance['btn_link10']); ?>">
                        <span class="txt"><?php echo wp_kses_post($instance['btn_title10']); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if($instance['btn_title11']) { ?>
                <li>
                    <a class="btn-one last" href="<?php echo esc_url($instance['btn_link11']); ?>">
                        <span class="txt"><?php echo wp_kses_post($instance['btn_title11']); ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title10'] = $new_instance['title10'];
		$instance['content10'] = $new_instance['content10'];
		$instance['btn_title10'] = $new_instance['btn_title10'];
		$instance['btn_link10'] = $new_instance['btn_link10'];
		$instance['btn_title11'] = $new_instance['btn_title11'];
		$instance['btn_link11'] = $new_instance['btn_link11'];
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title10 = ($instance) ? esc_attr($instance['title10']) : '';
		$content10 = ($instance) ? esc_attr($instance['content10']) : '';
		$btn_title10 = ($instance) ? esc_attr($instance['btn_title10']) : '';
		$btn_link10 = ($instance) ? esc_attr($instance['btn_link10']) : '';
		$btn_title11 = ($instance) ? esc_attr($instance['btn_title11']) : '';
		$btn_link11 = ($instance) ? esc_attr($instance['btn_link11']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title10')); ?>"><?php esc_html_e('Title:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title10')); ?>" name="<?php echo esc_attr($this->get_field_name('title10')); ?>" ><?php echo wp_kses_post($title10); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content10')); ?>"><?php esc_html_e('Content:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('content10')); ?>" name="<?php echo esc_attr($this->get_field_name('content10')); ?>" type="text" value="<?php echo esc_attr($content10); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title10')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title10')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title10')); ?>" type="text" value="<?php echo esc_attr($btn_title10); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link10')); ?>"><?php esc_html_e('Button Link:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Link', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link10')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link10')); ?>" type="text" value="<?php echo esc_attr($btn_link10); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title11')); ?>"><?php esc_html_e('Button Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title11')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title11')); ?>" type="text" value="<?php echo esc_attr($btn_title11); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link11')); ?>"><?php esc_html_e('Button Link:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Link', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link11')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link11')); ?>" type="text" value="<?php echo esc_attr($btn_link11); ?>" />
        </p>             
                
		<?php 
	}
	
}

///----Blog widgets---

//Recent Posts
class Educamb_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Recent_Posts', /* Name */esc_html__('Educamb Recent Posts','educamb'), array( 'description' => esc_html__('Show the Blog Recent Posts', 'educamb' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <div class="sidebar-blog-post">
            <ul class="blog-post">
                <?php $query_string = array('showposts'=>$instance['number']);
				if ($instance['cat']) {
					$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($query_string); ?>                
            </ul>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Posts', 'educamb');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'educamb'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'educamb'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <div class="inner">
                    <div class="img-box" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);">
                        <div class="overlay-content">
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="title-box">
                        <div class="post-date">
                            <span class="icon-date"></span> <?php echo get_the_date();?>
                        </div>
                        <h4>
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php echo wp_trim_words( get_the_title(), 5, '...' );?></a>
                        </h4>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Team
class Educamb_Our_Team extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Our_Team', /* Name */esc_html__('Educamb Our Team','educamb'), array( 'description' => esc_html__('Show the Our Team', 'educamb' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <?php 
			$args = array('post_type' => 'instructors', 'showposts'=>$instance['number']);
			if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'instructors_cat','field' => 'id','terms' => (array)$instance['cat']));
			$this->posts($args);
		?>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 1;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'educamb'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'educamb'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'educamb'), 'selected'=>$cat, 'taxonomy' => 'instructors_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p> 
        
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);			
			?>
            <div class="sidebar-author-box text-center">
                <div class="top">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
                </div>
                <div class="img-holder" style="background-image:url('<?php echo esc_url($post_thumbnail_url);?>'); ">
                </div>
                <div class="info">
                    <ul>
                        <li><a href="mailto:<?php echo esc_attr(get_post_meta( get_the_id(), 'instructors_email', true ));?>"><?php echo (get_post_meta( get_the_id(), 'instructors_email', true ));?></a></li>
                        <li><a href="tel:<?php echo esc_attr(get_post_meta( get_the_id(), 'instructors_phone', true ));?>"><?php echo (get_post_meta( get_the_id(), 'instructors_phone', true ));?></a></li>
                    </ul>
                </div>
                <?php
                    $icons = get_post_meta( get_the_id(), 'social_profile', true );
                    if ( ! empty( $icons ) ) :
                ?>
                <ul class="social-links">
    
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
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Subscribe Us V2
class Educamb_Subscribe_Us_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Educamb_Subscribe_Us_V2', /* Name */esc_html__('Educamb Subscribe Us V2','educamb'), array( 'description' => esc_html__('Show the Subscribe Us V2', 'educamb' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="sidebar-subscribe-content-box">
                <div class="sidebar-subscribe-content-box-bg" <?php if($instance['bg_img']){ ?>
                    style="background-image: url(<?php echo esc_url($instance['bg_img']); ?>);"<?php } ?>>
                </div>
                <div class="inner-content">
                    <div class="inner-title">
                        <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                    </div>
                    <?php if($instance['mailchimp_form_url2']){ ?>
                    <div class="sidebar-subscribe-form">
                        <?php echo do_shortcode($instance['mailchimp_form_url2']); ?>
                    </div>
                    <?php } ?>
                    <?php if($instance['form_text']){ ?><p><?php echo wp_kses_post($instance['form_text']); ?></p><?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['bg_img'] = strip_tags($new_instance['bg_img']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['mailchimp_form_url2'] = $new_instance['mailchimp_form_url2'];
		$instance['form_text'] = $new_instance['form_text'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$bg_img = ($instance) ? esc_attr($instance['bg_img']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe<br> Our Newsletter';
		$mailchimp_form_url2 = ($instance) ? esc_attr($instance['mailchimp_form_url2']) : '';
		$form_text = ($instance) ? esc_attr($instance['form_text']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_img')); ?>"><?php esc_html_e('Background Image:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('BG Image Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_img')); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('mailchimp_form_url2')); ?>"><?php esc_html_e('MailChimp Form Url', 'educamb'); ?></label>
            <input placeholder="<?php esc_attr_e('MailChimp Form Url', 'educamb');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('mailchimp_form_url2')); ?>" name="<?php echo esc_attr($this->get_field_name('mailchimp_form_url2')); ?>" type="text" value="<?php echo esc_attr($mailchimp_form_url2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_text')); ?>"><?php esc_html_e('Bottom Description:', 'educamb'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('form_text')); ?>" name="<?php echo esc_attr($this->get_field_name('form_text')); ?>" ><?php echo wp_kses_post($form_text); ?></textarea>
        </p> 
               
		<?php 
	}
	
}




