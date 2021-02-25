<?php
/**
 * Surplus Education Theme Info
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_theme_info_section( $wp_customize ) {
    
    /** Social Media Settings */
	$wp_customize->add_section( 'theme_info_section', array(
		'title'       => __( 'Demo and Documentation' , 'surplus-education' ),
		'priority'    => 6,
	) );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_setting',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);

	$theme_info = '<p>';

	/* translators: 1: string, 2: preview url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Demo Link : ', 'surplus-education' ), esc_url( __( 'https://demo.surplusthemes.com/surplus-education/', 'surplus-education' ) ), esc_html__( 'Click here.', 'surplus-education' ) );

	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: documentation url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Documentation Link : ', 'surplus-education' ), esc_url( 'https://surplusthemes.com/surplus-education-theme-setup-instructions/' ), esc_html__( 'Click here.', 'surplus-education' ) );


	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: theme url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Theme Info : ', 'surplus-education' ), esc_url( 'https://surplusthemes.com/downloads/surplus-education/' ), esc_html__( 'Click here.', 'surplus-education' ) );


	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: Recommended plugin, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Recommended Free Plugin : ', 'surplus-education' ), esc_url( 'https://wordpress.org/plugins/surplus-essentials/' ), esc_html__( 'Click here.', 'surplus-education' ) );


	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: support url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Support Link : ', 'surplus-education' ), esc_url( 'https://surplusthemes.com/support-forum/' ), esc_html__( 'Click here.', 'surplus-education' ) );

	$wp_customize->add_control( new Surplus_Education_Note_Control( $wp_customize,
	    'theme_info_setting', 
	        array(
	            'section'     => 'theme_info_section',
	            'description' => $theme_info
	        )
	    )
	);

	$theme_info .= '</p>';
}
add_action( 'customize_register', 'surplus_education_customize_register_theme_info_section' );