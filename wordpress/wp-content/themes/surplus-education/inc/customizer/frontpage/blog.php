<?php
/**
 * Blog Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_blog( $wp_customize ){

    /** Blog Section */
    $wp_customize->add_section(
        'blog_section',
        array(
            'title'    => __( 'Blog Section', 'surplus-education' ),
            'priority' => 130,
            'panel'    => 'frontpage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'enable_blog_section',
        array(
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'enable_blog_section',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Enable Blog Section', 'surplus-education' ),
            'type'    => 'checkbox',
        )
    );

    /** Blog title */
    $wp_customize->add_setting(
        'blog_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_title',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Title', 'surplus-education' ),
            'type'    => 'text',
            'active_callback' => 'surplus_education_blog_active',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'blog_section_title', array(
        'selector' => '.blog-section .container h2.section-title',
        'render_callback' => 'surplus_education_get_blog_section_title',
    ) );

    /** Blog Subtitle */
    $wp_customize->add_setting(
        'blog_section_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_subtitle',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Subtitle', 'surplus-education' ),
            'type'    => 'text',
            'active_callback' => 'surplus_education_blog_active',
        )
    ); 

    $wp_customize->selective_refresh->add_partial( 'blog_section_subtitle', array(
        'selector' => '.blog-section .container span.sub-title',
        'render_callback' => 'surplus_education_get_blog_section_subtitle',
    ) );     
    
    /** View All Label */
    $wp_customize->add_setting(
        'blog_view_all',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_view_all',
        array(
            'label'           => __( 'View All Label', 'surplus-education' ),
            'section'         => 'blog_section',
            'type'            => 'text',
            'active_callback' => 'surplus_education_blog_view_all_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'blog_view_all', array(
        'selector' => '.blog-section .container .button-wrap .bttn',
        'render_callback' => 'surplus_education_get_blog_view_all',
    ) ); 
    /** Blog Section Ends */  

}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_blog' );