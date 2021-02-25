<?php
/**
 * Surplus Education Theme Customizer
 *
 * @package Surplus_Education
 */

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/customizer/selective-refresh.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/customizer/custom-control.php';

/**
 * Sanitization Functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callback
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function surplus_education_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'surplus_education_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'surplus_education_customize_partial_blogdescription',
		) );
	}

	/** Frontpage Settings */
    $wp_customize->add_panel(
        'frontpage_settings',
        array(
            'title'    => __( 'Frontpage Settings', 'surplus-education' ),
            'priority' => 65,
        )
    );

    /** Other Settings */
    $wp_customize->add_panel(
        'other_settings',
        array(
            'title'    => __( 'Options Settings', 'surplus-education' ),
            'priority' => 70,
        )
    );
}
add_action( 'customize_register', 'surplus_education_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function surplus_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function surplus_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

//Front Page sections

/**
 * Banner Section
*/
require get_template_directory() . '/inc/customizer/frontpage/banner.php';

/**
 * Featured Course Section
*/
require get_template_directory() . '/inc/customizer/frontpage/featured_course.php';

/**
 * Team Section
*/
require get_template_directory() . '/inc/customizer/frontpage/team.php';

/**
 * Event Section
*/
require get_template_directory() . '/inc/customizer/frontpage/event.php';

/**
 * Testimonial Section
*/
require get_template_directory() . '/inc/customizer/frontpage/testimonial.php';

/**
 * Blog Section
*/
require get_template_directory() . '/inc/customizer/frontpage/blog.php';


// Others Sections

/**
 * Notice Options
*/
require get_template_directory() . '/inc/customizer/others/notice.php';

/**
 * Header Options
*/
require get_template_directory() . '/inc/customizer/others/header.php';

/**
 * Layout Options
*/
require get_template_directory() . '/inc/customizer/others/layout.php';

/**
 * Social Options
*/
require get_template_directory() . '/inc/customizer/others/social.php';

/**
 * Blog Options
*/
require get_template_directory() . '/inc/customizer/others/blog.php';

/**
 * Footer Options
*/
require get_template_directory() . '/inc/customizer/others/footer.php';

/**
 * Theme Info
*/
require get_template_directory() . '/inc/customizer/others/theme-info.php';

/**
 * load upgrade-to-pro section
*/
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function surplus_education_customize_preview_js() {
	wp_enqueue_script( 'surplus-education-customizer', get_template_directory_uri() . '/assets/js' . SURPLUS_EDUCATION_UNMINIFIED . '/customizer' . SURPLUS_EDUCATION_SUFFIX . '.js', array( 'customize-preview' ), SURPLUS_EDUCATION_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'surplus_education_customize_preview_js' );

function surplus_education_customize_script(){
    wp_enqueue_style( 'surplus-education-customize', get_template_directory_uri() . '/inc/customizer/css/customize.css', array(), SURPLUS_EDUCATION_THEME_VERSION );
    wp_enqueue_script( 'surplus-education-customize', get_template_directory_uri() . '/inc/customizer/js/customize.js', array( 'jquery', 'customize-controls' ), SURPLUS_EDUCATION_THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'surplus_education_customize_script' );