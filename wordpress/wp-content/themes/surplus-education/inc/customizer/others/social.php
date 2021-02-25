<?php
/**
 * Social Settings
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_social_section( $wp_customize ) {
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_settings',
        array(
            'title'    => __( 'Social Media Settings', 'surplus-education' ),
            'priority' => 30,
            'panel'    => 'other_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'enable_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		'enable_social_links',
		array(
			'section'     => 'social_settings',
			'label'	      => __( 'Enable Social Links', 'surplus-education' ),
            'description' => __( 'Enable to show social links at header.', 'surplus-education' ),
            'type'        => 'checkbox',
		)
	);
    
    $wp_customize->add_setting( 
        'social_link_1', 
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );

    $wp_customize->add_control(
        'social_link_1',
        array(
            'label'       => __( 'Facebook Link', 'surplus-education' ),
            'section'     => 'social_settings',
            'type'        => 'url',
            'active_callback' => 'surplus_education_social_links_ac',
        )
    );

    $wp_customize->add_setting( 
        'social_link_2', 
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );

    $wp_customize->add_control(
        'social_link_2',
        array(
            'label'       => __( 'Twitter Link', 'surplus-education' ),
            'section'     => 'social_settings',
            'type'        => 'url',
            'active_callback' => 'surplus_education_social_links_ac',
        )
    );

    $wp_customize->add_setting( 
        'social_link_3', 
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );

    $wp_customize->add_control(
        'social_link_3',
        array(
            'label'       => __( 'Instagram Link', 'surplus-education' ),
            'section'     => 'social_settings',
            'type'        => 'url',
            'active_callback' => 'surplus_education_social_links_ac',
        )
    );

    $wp_customize->add_setting( 
        'social_link_4', 
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );

    $wp_customize->add_control(
        'social_link_4',
        array(
            'label'       => __( 'Youtube Link', 'surplus-education' ),
            'section'     => 'social_settings',
            'type'        => 'url',
            'active_callback' => 'surplus_education_social_links_ac',
        )
    );

    $wp_customize->add_setting( 
        'social_link_5', 
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );

    $wp_customize->add_control(
        'social_link_5',
        array(
            'label'       => __( 'Pinterest Link', 'surplus-education' ),
            'section'     => 'social_settings',
            'type'        => 'url',
            'active_callback' => 'surplus_education_social_links_ac',
        )
    );
    
}
add_action( 'customize_register', 'surplus_education_customize_register_social_section' );