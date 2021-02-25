<?php
/**
 * Team Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_team( $wp_customize ){
    
    /** Team Section */
    $wp_customize->add_section(
        'team',
        array(
            'title'    => __( 'Team Section', 'surplus-education' ),
            'priority' => 80,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Team View all Label  */
    $wp_customize->add_setting(
        'team_view_all',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'team_view_all',
        array(
            'label'           => __( 'View All Button', 'surplus-education' ),
            'description'     => __( 'Add label for team section view all button.', 'surplus-education' ),
            'section'         => 'team',
            'priority'        => -1,
        )
    );

    $wp_customize->selective_refresh->add_partial( 'team_view_all', array(
        'selector' => '.team-section .container .button-wrap a.bttn',
        'render_callback' => 'surplus_education_get_team_view_all',
    ) );

    /** Team View all Label  */
    $wp_customize->add_setting(
        'team_view_all_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'team_view_all_url',
        array(
            'label'           => __( 'View All Button URL', 'surplus-education' ),
            'description'     => __( 'Add URL for team section view all button.', 'surplus-education' ),
            'section'         => 'team',
            'priority'        => -1,
            'type'            => 'url'
        )
    );

    $wp_customize->add_setting(
        'team_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
            $wp_customize,
            'team_note_text',
            array(
                'section'     => 'team',
                'description' => __( 'Add "Text" & "SE: Team Member" widget for team section.<hr/>', 'surplus-education' ),
                'priority'    => -1,
            )
        )
    );
    
    

    $team_section = $wp_customize->get_section( 'sidebar-widgets-team' );
    if ( ! empty( $team_section ) ) {

        $team_section->panel     = 'frontpage_settings';
        $team_section->priority  = 80;
        $wp_customize->get_control( 'team_view_all' )->section  = 'sidebar-widgets-team';
        $wp_customize->get_control( 'team_view_all_url' )->section  = 'sidebar-widgets-team';
        $wp_customize->get_control( 'team_note_text' )->section  = 'sidebar-widgets-team';
    }     
}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_team' );