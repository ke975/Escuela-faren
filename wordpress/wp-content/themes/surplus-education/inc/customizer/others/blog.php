<?php
/**
 * Surplus Education Blog Settings
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_blog_feature( $wp_customize ) {
    
    $wp_customize->add_section(
        'blog_feature',
        array(
            'title'    => __( 'Blog Feature', 'surplus-education' ),
            'panel'    => 'other_settings',
            'priority' => 25,
        )
    );

    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        'ed_excerpt',
        array(
            'section'     => 'blog_feature',
            'label'       => __( 'Enable Blog Excerpt', 'surplus-education' ),
            'description' => __( 'Enable to show excerpt or disable to show full post content.', 'surplus-education' ),
            'type'        => 'checkbox',
        )
    );
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 30,
            'sanitize_callback' => 'surplus_education_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        'excerpt_length',
        array(
            'section'     => 'blog_feature',
            'label'       => __( 'Excerpt Length', 'surplus-education' ),
            'description' => __( 'Automatically generated excerpt length (in words).', 'surplus-education' ),
            'choices'     => array(
                'min'   => 10,
                'max'   => 100,
                'step'  => 5,
            ),
            'type'        => 'number',                 
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'surplus-education' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'blog_feature',
            'label'   => __( 'Read More Text', 'surplus-education' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .button-wrap a.bttn',
        'render_callback' => 'surplus_education_get_read_more_text',
    ) );


    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        'ed_breadcrumb',
        array(
            'section'     => 'blog_feature',
            'label'       => __( 'Enable Breadcrumb', 'surplus-education' ),
            'description' => __( 'Enable to show Breadcrumb on single pages.', 'surplus-education' ),
            'type'        => 'checkbox',
        )
    );

    $wp_customize->add_setting( 
        'show_crop_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        'show_crop_image',
        array(
            'section'     => 'blog_feature',
            'label'       => __( 'Enable Cropped Image', 'surplus-education' ),
            'description' => __( 'Enable to show cropped image or disable to show full image size.', 'surplus-education' ),
            'type'        => 'checkbox',
        )
    );
    
}
add_action( 'customize_register', 'surplus_education_customize_register_blog_feature' );