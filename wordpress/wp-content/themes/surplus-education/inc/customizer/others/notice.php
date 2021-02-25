<?php
/**
 * Notice Bar Settings
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_notice_section( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'notice_settings',
        array(
            'title'    => __( 'Notice Bar Settings', 'surplus-education' ),
            'priority' => 15,
            'panel'    => 'other_settings',
        )
    );
    
    /** Enable notice bar */
    $wp_customize->add_setting( 
        'enable_notice_bar', 
        array(
            'default'           => false,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        )    
    );
    
    $wp_customize->add_control(     
        'enable_notice_bar',
        array(
            'section'     => 'notice_settings',
            'label'       => __( 'Enable Notice Bar', 'surplus-education' ),
            'description' => __( 'Enable to show notice bar above menus.', 'surplus-education' ),
            'type'        => 'checkbox',
        )
    );

    /** Email */
    $wp_customize->add_setting(
        'notice_bar_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'notice_bar_title',
        array(
            'label'   => __( 'Notice Bar Title', 'surplus-education' ),
            'type'    => 'text',
            'section' => 'notice_settings',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'notice_bar_title', array(
        'selector' => '.sticky-notice-bar .notice-bar-title .notice-title',
        'render_callback' => 'surplus_education_get_notice_bar_title',
    ) );

    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_notices',
        array(
            'default'           => 3,
            'sanitize_callback' => 'surplus_education_sanitize_number_absint'
        )
    );

    $wp_customize->add_control(
        'no_of_notices',
        array(
            'section'     => 'notice_settings',
            'label'       => __( 'Number of Noticess', 'surplus-education' ),
            'description' => __( 'Choose the number of notices you want to display', 'surplus-education' ),
            'choices'     => array(
                'min'   => 1,
                'max'   => 5,
                'step'  => 1,
            ),
            'type'      => 'number',                 
        )
    );
    
    /** Enable header search */
    $wp_customize->add_setting( 
        'enable_header_search', 
        array(
            'default'           => false,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        )    
    );
    
    $wp_customize->add_control(     
        'enable_header_search',
        array(
            'section'     => 'notice_settings',
            'label'       => __( 'Enable Header Search', 'surplus-education' ),
            'description' => __( 'Enable to show search in header.', 'surplus-education' ),
            'type'        => 'checkbox',
        )
    );

    /** Notice Settings Ends */
}
add_action( 'customize_register', 'surplus_education_customize_register_notice_section' );