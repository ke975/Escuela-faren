<?php
/**
 * Testimonial Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_testimonial( $wp_customize ){
    
    /** Testimonial Section */
    $wp_customize->add_section(
        'testimonial',
        array(
            'title'    => __( 'Testimonial Section', 'surplus-education' ),
            'priority' => 110,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'testimonial_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
            $wp_customize,
            'testimonial_note_text',
            array(
                'section'     => 'testimonial',
                'description' => __( '<hr/>', 'surplus-education' ),
            )
        )
    );
    
    /** Testimonial Title  */
    $wp_customize->add_setting(
        'testimonial_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_title',
        array(
            'label'           => __( 'Testimonial Section Title', 'surplus-education' ),
            'description'     => __( 'Add title for testimonial section.', 'surplus-education' ),
            'section'         => 'testimonial',
            'priority'        => -1,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
        'selector' => '.testimonial-section .container h2.section-title',
        'render_callback' => 'surplus_education_get_testimonial_title',
    ) );
    
    /** Testimonial Subtitle  */
    $wp_customize->add_setting(
        'testimonial_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_subtitle',
        array(
            'label'           => __( 'Testimonial Section Subtitle', 'surplus-education' ),
            'description'     => __( 'Add subtitle for testimonial section.', 'surplus-education' ),
            'section'         => 'testimonial',
            'type'            => 'text',
            'priority'        => -1,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'testimonial_subtitle', array(
        'selector' => '.testimonial-section .container .section-info',
        'render_callback' => 'surplus_education_get_testimonial_subtitle',
    ) );

    $wp_customize->add_setting(
        'testimonial_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
            $wp_customize,
            'testimonial_note_text',
            array(
                'section'     => 'testimonial',
                'description' => __( 'Add "SE: Testimonial" widget for testimonial section.<hr/>', 'surplus-education' ),
                'priority'    => -1,
            )
        )
    );

    $testimonial_section = $wp_customize->get_section( 'sidebar-widgets-testimonial' );
    if ( ! empty( $testimonial_section ) ) {

        $testimonial_section->panel     = 'frontpage_settings';
        $testimonial_section->priority  = 110;
        $wp_customize->get_control( 'testimonial_note_text' )->section  = 'sidebar-widgets-testimonial';
        $wp_customize->get_control( 'testimonial_title' )->section  = 'sidebar-widgets-testimonial';
        $wp_customize->get_control( 'testimonial_subtitle' )->section  = 'sidebar-widgets-testimonial';
    }     
}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_testimonial' );