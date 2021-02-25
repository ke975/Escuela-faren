<?php
/**
 * theme options
 * @since Bizart 1.0
 */
if( !class_exists( 'Bizart_Theme_Options_Customizer' ) ){
	class Bizart_Theme_Options_Customizer extends Bizart_Customizer{

		public $fields = array();

		public function __construct( $panel ){

			$this->fields = array(
				array(
				    'id'     => 'primary-menu',
				    'title'  => esc_html__( 'Primary Menu','bizart' ),
				    'fields' => $this->primary_menu_options()
				),
				array(
				    'id'     => 'typography',
				    'title'  => esc_html__( 'Typography','bizart' ),
				    'fields' => $this->typography_options()
				),
				array(
				    'id'     => 'color-section',
				    'title'  => esc_html__( 'Color' ,'bizart' ),
				    'fields' => $this->color_options()
				),
				array(
				    'id'     => 'header_image', //default section
				    'fields' => $this->header_options()
				),
				array(
				    'id'     => 'breadcrumb-section',
				    'title'  => esc_html__( 'Breadcrumb' ,'bizart' ),
				    'fields' => $this->breadcrumb_options()
				),
				array(
				    'id'     => 'sidebar-section',
				    'title'  => esc_html__( 'Sidebar', 'bizart' ),
				    'fields' => $this->sidebar_options()
				),            
				array(
				    'id'     => 'post-section',
				    'title'  => esc_html__( 'Blog', 'bizart' ),
				    'fields' => $this->post_options()
				),                
				array(
				    'id'     => 'footer-section',
				    'title'  => esc_html__( 'Footer', 'bizart' ),
				    'fields' => $this->footer_options()
				),
				array(
				    'id'     => 'advanced-options-section',
				    'title'  => esc_html__( 'Advanced', 'bizart' ),
				    'fields' => $this->advanced_options()
				)
			);

			$this->add( $panel );
		}

		public static function get_fonts(){
			$fonts = bizart_get_fonts();
			$f = array();
			foreach( $fonts as $k => $v ){
				$f[$k] = $v['family'];
			}

			return $f;
		}

		public static function get_font_weights(){
			return array(
				'100' => 100,
				'200' => 200,
				'300' => 300,
				'400' => 400,
				'500' => 500,
				'600' => 600,
				'700' => 700,
				'800' => 800,
				'900' => 900 
			);
		}

		public function primary_menu_options(){
			return array(
				array(
					'id' => 'primary-menu-bg-color',
					'label' => esc_html__( 'Background Color', 'bizart' ),
					'default' => 'rgba(0,0,0,0.5)',
					'type' => 'color-picker'
				)
			);
		}

		public function typography_options(){
	        $message = esc_html__( 'The value is in px.', 'bizart' );
	        return array(  
	            array(
	                'id'          => 'site-info-font',
	                'label'       => esc_html__( 'Site Identity Font Family', 'bizart' ),
	                'description' => esc_html__( 'Font family for site title and tagline. Defaults to Hind', 'bizart' ),
	                'default'     => 'hind',
	                'type'        => 'select',
	                'choices'     => self::get_fonts(),
	            ),
	            array(
	                'id'      => 'body-font',
	                'label'   =>  esc_html__( 'Body Font Family', 'bizart' ),
	                'description' => esc_html__( 'Defaults to Hind.', 'bizart' ),
	                'default' => 'hind',
	                'type'    => 'select',
	                'choices' => self::get_fonts(),
	            ), 
	            array(
	                'id'      => 'body-font-weight',
	                'label'   =>  esc_html__( 'Body Font Weight', 'bizart' ),
	                'description' => esc_html__( 'Defaults to 300.', 'bizart' ),
	                'default' => '300',
	                'type'    => 'select',
	                'choices' => self::get_font_weights()
	            ),
	            array(
	                'id'          => 'heading-font',
	                'label'       =>  esc_html__( 'Headings Font Family', 'bizart' ),
	                'description' =>  esc_html__( 'h1 to h6. Defaults to Quicksand.', 'bizart' ),
	                'default'     => 'quicksand',
	                'type'        => 'select',
	                'choices'     => self::get_fonts(),
	            ),
	            array(
	                'id'      => 'heading-font-weight',
	                'label'   =>  esc_html__( 'Heading Font Weight', 'bizart' ),
	                'description' => esc_html__( 'Defaults to 300.', 'bizart' ),
	                'default' => '500',
	                'type'    => 'select',
	                'choices' => self::get_font_weights()
	            ),
	        );
	    }

	    public function color_options(){	
			return array(
				array(
					'id'      => 'primary-color',
					'label'   => esc_html__( 'Primary Color', 'bizart' ),
					'default' => '#1a55cb',
					'type'    => 'color',
				),
				array(
					'id'      => 'body-paragraph-color',
					'label'   => esc_html__( 'Body Text Color', 'bizart' ),
					'default' => '#5f5f5f',
					'type'    => 'color',
				),
				array(
					'id'      => 'link-color',
					'label'   => esc_html__( 'Link Color', 'bizart' ),
					'default' => '#145fa0',
					'type'    => 'color',
				),
				array(
					'id'      => 'link-hover-color',
					'label'   => esc_html__( 'Link Hover Color', 'bizart' ),
					'default' => '#737373',
					'type'    => 'color',
				),
			);
		}

		public function breadcrumb_options(){	
			return array(
				array(
				    'id'	  => 'show-breadcrumb',
				    'label'   => esc_html__( 'Show Breadcrumb', 'bizart' ),
				    'default' => true,
				    'type'    => 'toggle',
				)
			);
		}

		public function sidebar_options(){
			return array(
				array(
				'id'      => 'sidebar-position',
				'label'   => esc_html__( 'Sidebar' , 'bizart' ),
				'type'    => 'select',
				'default' => 'show',
				'choices' => array(
				    'show' => esc_html__( 'Show' , 'bizart' ),
				    'hide' => esc_html__( 'Hide', 'bizart' ),
				)
			));
		}

		public function post_options(){
			return array(
	            array(
	                'id'      => 'post-category',
	                'label'   =>  esc_html__( 'Show Categories or Tags', 'bizart' ),
	                'default' => true,
	                'type'    => 'toggle',
	            ),
	            array(
	                'id'      => 'post-date',
	                'label'   => esc_html__( 'Show Date', 'bizart' ),
	                'default' => true,
	                'type'    => 'toggle',
	            ),
	            array(
	                'id'      => 'post-author',
	                'label'   =>  esc_html__( 'Show Author', 'bizart' ),
	                'default' => true,
	                'type'    => 'toggle',
	            )
	     	);
		}

		public function header_options(){	
			return array(
				array(
					'id'      => 'hide-in-archive-page',
					'label'   => esc_html__( 'Hide in Archive pages.', 'bizart' ),
					'default' => false,
					'type'    => 'toggle'
				),
				array(
					'id'      	  => 'banner-title',
					'label'   	  => esc_html__( 'Title' , 'bizart' ),
					'default' 	  => esc_html__( 'Blog' , 'bizart' ),
					'type'	  	  => 'text'
				),
			    array(
			        'id'      => 'banner-title-color',
			        'label'   => esc_html__( 'Text Color' , 'bizart' ),
			        'type'    => 'color',
			        'default' => '#ffffff'
			    ),
			    array(
			        'id'      => 'banner-bg-color',
			        'label'   => esc_html__( 'Background Color' , 'bizart' ),
			        'type'    => 'color',
			        'default' => '#000000'
			    ),
			    array(
			    	'id' 	   => 'banner-bg-overlay',
			    	'label'    => esc_html__( 'Background Overlay', 'bizart' ),
			    	'default'  => 7,
			    	'type' 	   => 'number',
			    	'input_attrs' => array(
		                'min'   => 0,
		                'max'   => 10,
		                'step'  => 1,
		            ),
			    ),
				array(
				    'id'      	=> 'banner-height',
				    'label'   	=> esc_html__( 'Height (px)', 'bizart' ),
				    'type'    	=> 'slider',
		            'description' => esc_html__( 'The value is in px. Defaults to 420px.' , 'bizart' ),
		            'default' => array(
		        		'desktop' => 450,
		        		'tablet'  => 450,
		        		'mobile'  => 450,
		        	),
		    		'input_attrs' =>  array(
		                'min'   => 1,
		                'max'   => 1000,
		                'step'  => 1,
		            ),
				),
			);
		}

		public 	function footer_options(){
			return array(
				array(
					'id'      => 'footer-social-menu',
					'label'   => esc_html__( 'Show Social Menu', 'bizart' ),
					'description' => esc_html__( 'Please add Social menus for enabling Social menus. Go to Menus for setting up', 'bizart' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'      => 'footer-copyright-text',
					'label'   => esc_html__( 'Copyright Text', 'bizart' ),
					'default' => esc_html__( 'Copyright &copy; All right reserved', 'bizart' ),
					'type'    => 'textarea'
				)
			);
		}

		public 	function advanced_options(){
			return array(
				array(
					'id'	  => 'pre-loader',
					'label'   => esc_html__( 'Show Preloader', 'bizart' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'	  => 'enable-search',
					'label'   => esc_html__( 'Enable Search', 'bizart' ),
					'default' => true,
					'type'    => 'toggle',
				),
				array(
					'id'	  => 'enable-scroll-to-top',
					'label'   => esc_html__( 'Enable Scroll To Top', 'bizart' ),
					'default' => true,
					'type'    => 'toggle',
				)
			);
		}

	}
}
