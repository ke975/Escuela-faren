<?php
/**
 * front page theme options
 * @since Bizart 1.0
 */
if( !class_exists( 'Bizart_Frontpage_Customizer' ) ){
	class Bizart_Frontpage_Customizer extends Bizart_Customizer{

		public $fields = array();

		public function __construct( $panel ){

			$this->fields = array(
				array(
					'id'    => 'general-frontpage-section',
					'title' => esc_html__( 'General', 'bizart' ),
					'fields' => $this->general_options()
				),
				array(
					'id'     => 'slider-frontpage-section',
					'title'  => esc_html__( 'Slider', 'bizart' ),
					'fields' => $this->slider_options()
				),
				array(
				    'id'     => 'service-section',
				    'title'  => esc_html__( 'Service', 'bizart' ),
				    'fields' => $this->service_options()
				),
				array(
				    'id'     => 'partner-section',
				    'title'  => esc_html__( 'Partner', 'bizart' ),
				    'fields' => $this->partner_options()
				),
				array(
				    'id'     => 'team-section',
				    'title'  => esc_html__( 'Team', 'bizart' ),
				    'fields' => $this->team_options()
				),
				array(
				    'id'     => 'testimonial-section',
				    'title'  => esc_html__( 'Testimonial', 'bizart' ),
				    'fields' => $this->testimonial_options()
				),
				array(
				    'id'     => 'blog-section',
				    'title'  => esc_html__( 'Blog', 'bizart' ),
				    'fields' => $this->blog_options()
				),
				array(
				    'id'     => 'cta-section',
				    'title'  => esc_html__( 'Call to action', 'bizart' ),
				    'fields' => $this->cta_options()
				),
				array(
					'id'     => 'contact-section',
					'title'  => esc_html__( 'Contact', 'bizart' ),
					'fields' => $this->contact_options()
				)
			);

			$this->add( $panel );
		}

		public function general_options(){
			return array(
				array(
					'id'      => 'svg-bg-color',
					'label'   => esc_html__( 'SVG Shape Color', 'bizart' ),
					'type'    => 'color',
					'default' => '#bfe5fc',
				),
				array(
					'id'      => 'frontpage-btn-bg-color',
					'label'   => esc_html__( 'Button Background Color', 'bizart' ),
					'type'    => 'color',
					'default' => '#1a55cb',
				),
				array(
					'id'      => 'frontpage-btn-bg-hover-color',
					'label'   => esc_html__( 'Button Background Hover Color', 'bizart' ),
					'type'    => 'color',
					'default' => '#2419b9',
				),
				array(
				    'id'      => 'show-content',
				    'label'   => esc_html__( 'Show Front Page Content', 'bizart' ),
				    'type'    => 'toggle',
				    'default' => true
				),
				array(
				    'id'      => 'show-content-above',
				    'label'   => esc_html__( 'Show Content Above', 'bizart' ),
				    'type'    => 'toggle',
				    'default' => false,
				    'active_callback' => array( __CLASS__, 'show_frontpage_content_above' )
				)
			);
		}

	    public function slider_options(){
			return array(
				array(
					'id'      => 'enable-slider',
					'label'   => esc_html__( 'Enable Slider', 'bizart' ),
					'type'    => 'toggle',
					'default' => true
				),
				array(
					'id' => 'slider-overlay-color',
					'label' => esc_html__( 'Overlay Color', 'bizart' ),
					'type' => 'color',
					'default' => '#132f66',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'slider-pages',
					'label' => esc_html__( 'Pages', 'bizart' ),
					'type'  => 'page-repeater',
					'limit' => 3,
					'default' => '',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'slider-autoplay',
					'label' => esc_html__( 'Auto Play', 'bizart' ),
					'type'  => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),			
				array(
					'id'    => 'slider-dots',
					'label' => esc_html__( 'Dots', 'bizart' ),
					'type'  => 'toggle',
					'default' => true,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),			
				array(
					'id'    => 'slider-infinite',
					'label' => esc_html__( 'Infinite Scroll', 'bizart' ),
					'type'  => 'toggle',
					'default' => true,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-slider-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'slider-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'default' => '',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function service_options(){
			return array(
				array(
					'id'      => 'enable-service',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'service-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-sub-text',
					'label' => esc_html__( 'Sub Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'What we do' ,'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-btn-text',
					'label' => esc_html__( 'Button Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'More Services' ,'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-pages',
					'label' => esc_html__( 'Sub Pages', 'bizart' ),
					'type'  => 'page-repeater',
					'limit' => 4,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-service-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'service-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback'  )
				)
			);
		}

		public function partner_options(){
			return array(
				array(
					'id'      => 'enable-partner',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'partner-pages',
					'label' => esc_html__( 'Partner Pages', 'bizart' ),
					'type'  => 'page-repeater',
					'limit' => 5,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id' => 'partner-slide-show',
					'label' => esc_html__( 'Slide To Show', 'bizart' ),
					'type'  => 'number',
					'default' => 5,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-partner-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'partner-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback'  )
				)
			);
		}

		public function team_options(){
			return array(
				array(
					'id'      => 'enable-team',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'team-shape',
					'label'   => esc_html__( 'Enable Shape', 'bizart' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-sub-text',
					'label' => esc_html__( 'Sub Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'Team Members' ,'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-btn-text',
					'label' => esc_html__( 'Button Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'View All Member' ,'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-pages',
					'label' => esc_html__( 'Sub Pages', 'bizart' ),
					'type'  => 'page-repeater',
					'description' => esc_html__( 'Recommended Title: Team Member Name', 'bizart' ) . ' <span>' . esc_html__( 'Designation', 'bizart' ) . '</span>',
					'limit' => 5,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-posts-per-page',
					'label' => esc_html__( 'Total team to show', 'bizart' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-col',
					'label' => esc_html__( 'Total column per row', 'bizart' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),		
				array(
					'id'    => 'team-archive-page',
					'label' => esc_html__( 'Select a Team Archive Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => 0,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				
				array(
					'id'      => 'enable-team-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'team-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function cta_options(){
			return array(
				array(
					'id'      => 'enable-cta',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id' => 'cta-overlay-color',
					'label' => esc_html__( 'Overlay Color', 'bizart' ),
					'type' => 'color',
					'default' => '#132f66',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-sub-text',
					'label' => esc_html__( 'Sub Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'Grow your business with us', 'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-btn-link',
					'label' => esc_html__( 'Button Link', 'bizart' ),
					'type'  => 'text',
					'default' => '#',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-btn-text',
					'label' => esc_html__( 'Button Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'GET IN TOUCH' ,'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-cta-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'cta-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function testimonial_options(){
			return array(
				array(
					'id'      => 'enable-testimonial',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'testimonial-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'testimonial-sub-text',
					'label' => esc_html__( 'Sub Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'What they are saying', 'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'testimonial-pages',
					'label' => esc_html__( 'Sub Pages', 'bizart' ),
					'type'  => 'page-repeater',
					'limit' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-testimonial-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'testimonial-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function blog_options(){
			return array(
				array(
					'id'      => 'enable-blog',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'blog-shape',
					'label'   => esc_html__( 'Enable Shape', 'bizart' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-sub-text',
					'label' => esc_html__( 'Sub Text', 'bizart' ),
					'type'  => 'text',
					'default' => esc_html__( 'News', 'bizart' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-posts-per-page',
					'label' => esc_html__( 'Total posts to show', 'bizart' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 4,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-col',
					'label' => esc_html__( 'Total column per row', 'bizart' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 4,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-blog-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'blog-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function contact_options(){
			return array(
				array(
					'id'      => 'enable-contact',
					'label'   => esc_html__( 'Enable', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'contact-page',
					'label' => esc_html__( 'Content Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id' => 'contact-form-shortcode',
					'label' => esc_html__( 'Contact Form 7 Shortcode', 'bizart' ),
					'type' => 'text',
					'default' => '',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'contact-map-page',
					'label' => esc_html__( 'Map Page', 'bizart' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-contact-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'bizart' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'contact-shortcode',
					'label' => esc_html__( 'Shortcode', 'bizart' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public static function show_frontpage_content_above(){
	        return self::get( 'show-content' );
	    }

	    public static function get_module_name( $control ){
	    	$id = str_replace( 'bizart-', '', $control->id );
	    	$arr = explode( '-', $id );
	    	if( is_array( $arr ) && isset( $arr[0] ) ){
	    		return $arr[0];
	    	}

	    	return false;
	    }
	    
	    public static function module_callback( $control ){
	    	$name = self::get_module_name( $control );
	    	if( $name ){
	    		return self::get( "enable-{$name}" );
	    	}

	    	return true;
	    }

	    public static function module_shortcode_callback( $control ){
	    	$name = self::get_module_name( $control );
	    	if( $name ){
	    		return self::get( "enable-{$name}-shortcode" );
	    	}
	    	return true;
	    }
	}
}
