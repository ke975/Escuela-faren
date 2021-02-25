<?php
/**
 * Surplus Education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Surplus_Education
 */

// Use unminified libraries if SCRIPT_DEBUG is true
if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
    define( 'SURPLUS_EDUCATION_UNMINIFIED', '/unminified' );
    define( 'SURPLUS_EDUCATION_SUFFIX', '' );
} else {
    define( 'SURPLUS_EDUCATION_UNMINIFIED', '' );
    define( 'SURPLUS_EDUCATION_SUFFIX', '.min' );
}

// Define theme version
if ( ! defined( 'SURPLUS_EDUCATION_THEME_VERSION' ) ) {
    $surplus_education_theme_data = wp_get_theme();   
    define ( 'SURPLUS_EDUCATION_THEME_VERSION', $surplus_education_theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'surplus_education_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function surplus_education_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Surplus Education, use a find and replace
		 * to change 'surplus-education' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'surplus-education', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'surplus-education' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'surplus_education_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add excerpt support for pages
    	add_post_type_support( 'page', 'excerpt' );

    	/**
     	 * Add Custom Images sizes.
    	*/        
    	add_image_size( 'surplus-education-slider', 1920, 1080, true );
    	add_image_size( 'surplus-education-square', 364, 364, true );
    	add_image_size( 'surplus-education-team', 364, 305, true );
    	add_image_size( 'surplus-education-event', 366, 216, true );
    	add_image_size( 'surplus-education-blog', 150, 290, true );
    	add_image_size( 'surplus-education-schema', 600, 60, true );
    	add_image_size( 'surplus-education-with-sidebar', 765, 375, true );
    	add_image_size( 'surplus-education-with-no-sidebar', 1175, 475, true );

    	// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(
			// Default to a static front page and assign the front and posts pages.
			'options'     => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{front}}',
				'page_for_posts' => '{{blog}}',
			),

			// Specify the core-defined pages to create.
			'posts'       => array(
				'front' => array(
					'post_type'    => 'page',
					'post_title'   => __( 'Static Frontpage', 'surplus-education' )
				),
				'about',
				'contact',
				'blog',
			),

			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus'   => array(
				// Assign a menu to the "primary" location.
				'primary'  => array(
					'name'  => __( 'Primary', 'surplus-education' ),
					'items' => array(
						'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
						'page_about',
						'page_blog',
						'page_contact',
					),
				)
			),

			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods'  => array(
				'notice_bar_title'       => __( 'NOTICE', 'surplus-education' ),
				'banner_title'           => __( 'Education is not the PROBLEM It is the SOLUTION', 'surplus-education' ),
				'banner_subtitle'        => __( 'Come and discover your oasis. It has never been easier to find the best.', 'surplus-education' ),
				'banner_cta1'            => __( 'Know About Us', 'surplus-education' ),
				'banner_cta1_url'        => '#',
				'banner_cta2'            => __( 'Take A Tour', 'surplus-education' ),
				'banner_cta2_url'        => '#',
				'fc_view_all'            => __( 'View All Courses', 'surplus-education' ),
				'fc_view_all_url'        => '#',
				'team_view_all'          => __( 'View All Instructors', 'surplus-education' ),
				'team_view_all_url'      => '#',
				'event_section_title'    => __( 'Our Upcoming Events', 'surplus-education' ),
				'event_section_subtitle' => __( 'For Joining', 'surplus-education' ),
				'event_view_all'         => __( 'View All Events', 'surplus-education' ),
				'event_view_all_url'     => '#',
				'testimonial_title'      => __( 'Clients Testimonials', 'surplus-education' ),
				'testimonial_subtitle'   => __( 'We will help you find it. We are your first step to becoming everything you want to be.', 'surplus-education' ),
				'blog_section_title'     => __( 'Latest From Blog', 'surplus-education' ),
				'blog_section_subtitle'  => __( 'News and Updates', 'surplus-education' ),
				'blog_view_all'          => __( 'View All', 'surplus-education' ),
			),
		);

		/**
		 *
		 * @param array $starter_content Array of starter content.
		 */
		$starter_content = apply_filters( 'surplus_education_starter_content', $starter_content );

		add_theme_support( 'starter-content', $starter_content );
	}
endif;
add_action( 'after_setup_theme', 'surplus_education_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function surplus_education_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'surplus_education_content_width', 640 );
}
add_action( 'after_setup_theme', 'surplus_education_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function surplus_education_scripts() {

	wp_enqueue_style( 'woocommerce-style', get_template_directory_uri(). '/assets/css' . SURPLUS_EDUCATION_UNMINIFIED . '/woocommerce.custom' . SURPLUS_EDUCATION_SUFFIX . '.css', array(), '1.0.0' );

	wp_enqueue_style( 'animate', get_template_directory_uri(). '/assets/css' . SURPLUS_EDUCATION_UNMINIFIED . '/animate' . SURPLUS_EDUCATION_SUFFIX . '.css', array(), '3.5.2' );
	
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/assets/css' . SURPLUS_EDUCATION_UNMINIFIED . '/owl.carousel' . SURPLUS_EDUCATION_SUFFIX . '.css', array(), '2.2.1' );

    wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri(). '/assets/css' . SURPLUS_EDUCATION_UNMINIFIED . '/perfect-scrollbar' . SURPLUS_EDUCATION_SUFFIX . '.css', array(), '1.4.0' );

	wp_enqueue_style( 'surplus-education', get_stylesheet_uri(), SURPLUS_EDUCATION_THEME_VERSION );

	wp_enqueue_script( 'surplus-education-navigation', get_template_directory_uri() . '/assets/js'. SURPLUS_EDUCATION_UNMINIFIED .'/navigation'. SURPLUS_EDUCATION_SUFFIX .'.js', array(), SURPLUS_EDUCATION_THEME_VERSION, true );

	wp_enqueue_script( 'surplus-education-skip-link-focus-fix', get_template_directory_uri() . '/assets/js'. SURPLUS_EDUCATION_UNMINIFIED .'/skip-link-focus-fix'. SURPLUS_EDUCATION_SUFFIX .'.js', array(), SURPLUS_EDUCATION_THEME_VERSION, true );  

    wp_enqueue_script( 'all', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/all' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery' ), '5.6.3', true );
    
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/v4-shims' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery', 'all' ), '5.6.3', true );
    
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/owl.carousel' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery' ), '2.2.1', true );

    wp_enqueue_script( 'owl-carousel-a11ylayer', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/owlcarousel2-a11ylayer' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery', 'owl-carousel' ), '0.2.1', true );

    wp_enqueue_script( 'perfect-scrollbar-js', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/perfect-scrollbar' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery' ), '1.4.0', true );

    wp_enqueue_script( 'custom-accessibility-js', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/custom-accessibility' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery' ), SURPLUS_EDUCATION_THEME_VERSION, true );

    wp_enqueue_script( 'surplus-education', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/custom' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'jquery' ), SURPLUS_EDUCATION_THEME_VERSION, true );

    $surplus_education_array = array( 
        'rtl'           => (bool)is_rtl(),
        'auto'          => (bool)get_theme_mod( 'slider_auto', true ),
		'loop'          => (bool)get_theme_mod( 'slider_loop', true ),
    );
    
    wp_localize_script( 'surplus-education', 'sep_data', $surplus_education_array );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'surplus_education_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * includes functions used to help other templates 
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * includes functions which uses hooks defined by WordPress
 */
require get_template_directory() . '/inc/core-hooks.php';

/**
 * includes functions which uses hooks defined by theme author
 */
require get_template_directory() . '/inc/helper-hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Surplus Essentials compatibility file.
 */
if ( surplus_education_is_se_activated() ) {
	require get_template_directory() . '/inc/plugin-functions.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( surplus_education_is_woocommerce_activated() ) {
	require get_template_directory() . '/inc/woocommerce-functions.php';
}

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';

if ( ! function_exists( 'surplus_education_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function surplus_education_excerpt_length( $length ) {
	$excerpt_length = ( is_front_page() && ! is_home() ) ? 25 : get_theme_mod( 'excerpt_length', 30 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'surplus_education_excerpt_length', 999 );

/**
 * Load TGMPA
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
