<?php
/**
 * Footer Setting
 *
 * @package Surplus_Education
 */
function surplus_education_customize_register_footer_section( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_section',
        array(
            'title'      => __( 'Footer Settings', 'surplus-education' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );

    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => __( 'Copyright All Rights Reserved.','surplus-education' ),
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => __( 'Footer Copyright Text', 'surplus-education' ),
            'section'     => 'footer_section',
            'type'        => 'textarea',
        )
    );
    
    /** Scroll to top */
    $wp_customize->add_setting(
        'scroll_to_top',
        array(
            'default'           => false,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'scroll_to_top',
        array(
            'section' => 'footer_section',
            'label'   => __( 'Hide Scroll to Top Button', 'surplus-education' ),
            'type'    => 'checkbox'
        )
    );
}
add_action( 'customize_register', 'surplus_education_customize_register_footer_section' );