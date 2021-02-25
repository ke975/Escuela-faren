<?php
/**
 * include customizer classes
 * @since Bizart 1.0
 */
function bizart_customizer_files( $files ){

	$new_files = array(
		'class-customizer.php',
		# custom controls for customizer
		'controls/toggle/class-toggle.php',
		'controls/color/class-color.php',
		'controls/page-repeater/class-page-repeater.php',
		'controls/slider/class-slider.php',
		'controls/link/class-link.php',

		# theme options
		'sections/class-frontpage.php',
		'sections/class-theme-options.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'bizart_modules_customizer', 'bizart_customizer_files' );

/**
 * Get theme mod
 * @since Bizart 1.0
 */
function bizart_get( $id ){
	return Bizart_Customizer::get( $id );
}

/**
 * Register customizer options
 * @since Bizart 1.0
 */
function bizart_customizer_register( $wp_customize ){

	$cus = new Bizart_Customizer();
	$cus->fields = array(
		array(
			'id'       => 'go-to-pro',
			'title'    => esc_html__( 'Need More Features ? - Buy Pro', 'bizart' ),
			'type'     => 'link',
			'url'      => esc_url( 'fanseethemes.com/downloads/bizart-pro/' ),
			'priority' => 0
		)
	);
	
	$cus->add();

	$panel = array(
		'id' => Bizart_Customizer::get_id( 'frontpage' ),
		'args' => array(
			'title'    => esc_html__( 'Front Page Options', 'bizart' ),
			'priority' => 10,
		)
	);
	new Bizart_Frontpage_Customizer( $panel );

	$panel = array(
		'id' => Bizart_Customizer::get_id( 'theme-options' ),
		'args' => array(
			'title'    => esc_html__( 'Theme Options', 'bizart' ),
			'priority' => 10,
		)
	);
	new Bizart_Theme_Options_Customizer( $panel );
	
}
add_action( 'init', 'bizart_customizer_register' );

/**
 * enqueue scripts and styles for customizer 
 * @since Bizart 1.0
 */
function bizart_custom_controls_script(){

	$script = get_theme_file_uri( 'assets/js/customizer.js' );
	$deps   = array( 'jquery', 'customize-base', 'jquery-ui-slider', 'jquery-ui-button' );
	$style  = get_theme_file_uri( 'assets/css/customizer.css' );

	wp_enqueue_script( 'bizart-customizer-js', $script, $deps, '1.0', true );
	wp_enqueue_style( 'bizart-customizer-css', $style );

	wp_localize_script( 'bizart-customizer-js', 'bizartColorPalette',
		array( 
			'colorPalettes' => array(
				'#000000',
				'#ffffff',
				'#dd3333',
				'#dd9933',
				'#eeee22',
				'#81d742',
				'#1e73be',
				'#8224e3',
			)
	 	)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'bizart_custom_controls_script', 99	);

/**
 * Modify default customizer placement
 * @since Bizart 1.0
 */
function bizart_customize_register( $wp_customize ){
	$color_section = 'bizart-color-section';
	$wp_customize->get_control( 'header_textcolor' )->section = $color_section;
	$wp_customize->get_control( 'background_color' )->section = $color_section;		

	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header', 'bizart' );
	$wp_customize->get_section( 'header_image' )->panel = 'bizart-theme-options';
}
add_action( 'customize_register', 'bizart_customize_register' );