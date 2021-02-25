<?php
/**
*  Theme supports
* @since Bizart 1.0
*/
function bizart_theme_support(){
	# Gutenberg wide images.
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	# Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	# Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	# Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	/*woocommerce support*/
	add_theme_support( 'woocommerce' );

	# Switch default core markup for search form, comment form, and comments.
	# to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
		)
	);

	# Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bizart_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));

	# Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 180,
			'height'      => 60,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'post-thumbnails' );

	/**
	 * This variable is intended to be overruled from themes.
	 * Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	 * phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	 */			
	$GLOBALS['content_width'] = apply_filters( 'bizart_content_width_setup', 640 );

	/**
	* Register Menu
	*/
	register_nav_menus(array(
		'primary' => esc_html__( 'Primary', 'bizart' ),
		'social-menu-footer' => esc_html__( 'Footer social menu', 'bizart' )
	));

	load_theme_textdomain( 'bizart', get_theme_file_path( 'languages' ) );

	# header options
	$args = array(
		'default-text-color' => 'ffffff',
		'width'              => 1366,
		'height'             => 400,
		'flex-height'        => true,
		'default-image'      => '',
	);
	add_theme_support( 'custom-header', apply_filters( 'bizart_custom_header_args' , $args ));

	add_post_type_support( 'page', 'excerpt' );

}
add_action( 'after_setup_theme', 'bizart_theme_support' );