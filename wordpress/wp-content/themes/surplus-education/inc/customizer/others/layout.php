<?php
/**
 * Surplus Education Layout Settings
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_layout( $wp_customize ) {
    
    /** General Sidebar Layout */
    $wp_customize->add_section(
        'general_layout',
        array(
            'title'    => __( 'Sidebar Layout', 'surplus-education' ),
            'panel'    => 'other_settings',
            'priority' => 25,
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'surplus_education_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Surplus_Education_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'general_layout',
				'label'		  => __( 'Page Sidebar Layout', 'surplus-education' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in repective page.', 'surplus-education' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/assets/images/left.png' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'surplus_education_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Surplus_Education_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'general_layout',
				'label'		  => __( 'Post Sidebar Layout', 'surplus-education' ),
				'description' => __( 'This is the general sidebar layout for posts. You can override the sidebar layout for individual post in repective post.', 'surplus-education' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/assets/images/left.png' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
				)
			)
		)
	);
    
    /** Default Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'surplus_education_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Surplus_Education_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'general_layout',
				'label'		  => __( 'Default Sidebar Layout', 'surplus-education' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'surplus-education' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/assets/images/left.png' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'surplus_education_customize_register_layout' );