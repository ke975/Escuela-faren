<?php
/**
 * Featured Course Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_course( $wp_customize ){
    
    /** Featured Course Section */
    $wp_customize->add_section(
        'featured_course',
        array(
            'title'    => __( 'Featured Course Section', 'surplus-education' ),
            'priority' => 60,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Featured Course View all Label  */
    $wp_customize->add_setting(
        'fc_view_all',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'fc_view_all',
        array(
            'label'           => __( 'View All Button', 'surplus-education' ),
            'description'     => __( 'Add label for featured course section view all button.', 'surplus-education' ),
            'section'         => 'featured_course',
            'priority'        => -1,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'fc_view_all', array(
        'selector' => '.featured-course-section .container .button-wrap a.bttn',
        'render_callback' => 'surplus_education_get_fc_view_all',
    ) );

    /** Featured Course View all Label  */
    $wp_customize->add_setting(
        'fc_view_all_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'fc_view_all_url',
        array(
            'label'           => __( 'View All Button URL', 'surplus-education' ),
            'description'     => __( 'Add URL for featured course section view all button.', 'surplus-education' ),
            'section'         => 'featured_course',
            'priority'        => -1,
            'type'            => 'url'
        )
    );

    $wp_customize->add_setting(
        'fc_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
            $wp_customize,
            'fc_note_text',
            array(
                'section'     => 'featured_course',
                'description' => __( 'Add "Text" & "SE: Icon Text" widget for featured course section.<hr/>', 'surplus-education' ),
                'priority'    => -1,
            )
        )
    );
    
    

    $fc_section = $wp_customize->get_section( 'sidebar-widgets-featured_course' );
    if ( ! empty( $fc_section ) ) {

        $fc_section->panel     = 'frontpage_settings';
        $fc_section->priority  = 60;
        $wp_customize->get_control( 'fc_view_all' )->section  = 'sidebar-widgets-featured_course';
        $wp_customize->get_control( 'fc_view_all_url' )->section  = 'sidebar-widgets-featured_course';
        $wp_customize->get_control( 'fc_note_text' )->section  = 'sidebar-widgets-featured_course';
    }     
}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_course' );