<?php
/**
 * Event Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_event( $wp_customize ){

    /** Event Section */
    $wp_customize->add_section(
        'event',
        array(
            'title'    => __( 'Event Section', 'surplus-education' ),
            'priority' => 100,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Event title */
    $wp_customize->add_setting(
        'event_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'event_section_title',
        array(
            'section'     => 'event',
            'label'       => __( 'Event Section Title', 'surplus-education' ),
            'description' => __( 'Add title for event section.', 'surplus-education' ),
            'type'        => 'text',
            'priority'    => -1,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'event_section_title', array(
        'selector' => '.event-section .container h2.section-title',
        'render_callback' => 'surplus_education_get_event_section_title',
    ) );

    /** Event Subtitle */
    $wp_customize->add_setting(
        'event_section_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'event_section_subtitle',
        array(
            'section'     => 'event',
            'label'       => __( 'Event Section Subtitle', 'surplus-education' ),
            'description' => __( 'Add subtitle for event section.', 'surplus-education' ),
            'type'        => 'text',
            'priority'    => -1,
        )
    ); 

    $wp_customize->selective_refresh->add_partial( 'event_section_subtitle', array(
        'selector' => '.event-section .container span.sub-title',
        'render_callback' => 'surplus_education_get_event_section_subtitle',
    ) );     
    
    /** View All Label */
    $wp_customize->add_setting(
        'event_view_all',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'event_view_all',
        array(
            'label'       => __( 'View All Label', 'surplus-education' ),
            'description' => __( 'Add label for event section view all button.', 'surplus-education' ),
            'section'     => 'event',
            'type'        => 'text',
            'priority'    => -1,
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'event_view_all', array(
        'selector' => '.event-section .container .button-wrap .bttn',
        'render_callback' => 'surplus_education_get_event_view_all',
    ) ); 

    /** View All URL */
    $wp_customize->add_setting(
        'event_view_all_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'event_view_all_url',
        array(
            'label'       => __( 'View All URL', 'surplus-education' ),
            'description' => __( 'Add URL for event section view all button.', 'surplus-education' ),
            'section'     => 'event',
            'type'        => 'url',
            'priority'    => -1,
        )
    );

    $wp_customize->add_setting(
        'event_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
            $wp_customize,
            'event_note_text',
            array(
                'section'     => 'event',
                'description' => __( 'Add "SE: Event" widget for event section.<hr/>', 'surplus-education' ),
                'priority'    => -1,
            )
        )
    );

    $event_section = $wp_customize->get_section( 'sidebar-widgets-event' );
    if ( ! empty( $event_section ) ) {

        $event_section->panel     = 'frontpage_settings';
        $event_section->priority  = 85;
        $wp_customize->get_control( 'event_section_title' )->section  = 'sidebar-widgets-event';
        $wp_customize->get_control( 'event_section_subtitle' )->section  = 'sidebar-widgets-event';
        $wp_customize->get_control( 'event_view_all' )->section  = 'sidebar-widgets-event';
        $wp_customize->get_control( 'event_view_all_url' )->section  = 'sidebar-widgets-event';
        $wp_customize->get_control( 'event_note_text' )->section  = 'sidebar-widgets-event';
    }     

    /** Event Section Ends */  

}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_event' );