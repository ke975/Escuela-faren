<?php
/**
 * ------------------------------------------------------
 *  Required files for this module
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Bizart WordPress Theme
 */
function bizart_tgm_files( $files ){

	$new_files = array(
		'class-tgm-plugin-activation.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'bizart_modules_tgm', 'bizart_tgm_files' );

/**
 * ------------------------------------------------------
 *  Required plugins
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Bizart WordPress Theme
 */
function bizart_register_required_plugins(){
	$plugins = array(
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'bizart' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Fansee Themes Demo Data', 'fansee-business' ),
			'slug'     => 'fansee-themes-demo-data',
			'required' => false
		),
		array(
			'name'     => esc_html__( 'Contact Form 7', 'bizart' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		)
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'bizart_register_required_plugins' );
