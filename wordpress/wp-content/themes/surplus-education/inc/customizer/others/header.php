<?php
/**
 * Header Settings
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_header_section( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'surplus-education' ),
            'priority' => 20,
            'panel'    => 'other_settings',
        )
    );
     
    $wp_customize->add_setting(
        'login_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'login_text',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Login Text', 'surplus-education' ),
        )
    );

    $wp_customize->add_setting(
        'login_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'login_url',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Login URL', 'surplus-education' ),
        )
    );

    $wp_customize->add_setting(
        'register_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'register_text',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Register Text', 'surplus-education' ),
        )
    );

    $wp_customize->add_setting(
        'register_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'register_url',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Register URL', 'surplus-education' ),
        )
    );

    /** Phone */
    $wp_customize->add_setting(
        'phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'phone',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Phone', 'surplus-education' ),
        )
    );
    
    /** Email */
    $wp_customize->add_setting(
        'email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'email',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Email', 'surplus-education' ),
        )
    );
    
    /** Header Settings Ends */
}
add_action( 'customize_register', 'surplus_education_customize_register_header_section' );