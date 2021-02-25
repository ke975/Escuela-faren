<?php
/**
 * Banner Section
 *
 * @package Surplus_Education
 */

function surplus_education_customize_register_frontpage_banner( $wp_customize ) {
	    
    /**
     * Add banner/slider panel
     */
    $wp_customize->add_section( 'banner_slider_section', array(
        'title'          => __( 'Banner Section', 'surplus-education' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'frontpage_settings'
    ) );

    /** Banner Options */
    $wp_customize->add_setting(
		'enable_banner_section',
		array(
			'default'			=> 'static_banner',
			'sanitize_callback' => 'surplus_education_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'enable_banner_section',
		array(
            'label'	      => __( 'Banner Options', 'surplus-education' ),
            'description' => __( 'Choose banner as static image/video or as a slider. This feature is available for both static frontpage and latest posts option.', 'surplus-education' ),
			'section'     => 'banner_slider_section',
			'choices'     => array(
                'no_banner'        => __( 'Disable Banner Section', 'surplus-education' ),
                'static_banner'    => __( 'Static / Video Banner', 'surplus-education' ),
                'post'             => __( 'Latest Posts Slider', 'surplus-education' ),
                'category'         => __( 'Category Slider', 'surplus-education' ),
            ),
            'type'     => 'select',
            'priority' => 5	,
 		)            
	);

    // slider control notes
    $wp_customize->add_setting( 
        'slider_control_note1',
         array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );

    $wp_customize->add_control( 
        new Surplus_Education_Note_Control(
            $wp_customize,
            'slider_control_note1',
             array(
                'label'           => __( 'Static/Video Message', 'surplus-education' ),
                'description'     => sprintf( __( 'You have to set Video/Image on %1$sHeader Media%2$s Section to make full implement of this feature.','surplus-education'),'<b>', '</b>'),
                'section'         => 'banner_slider_section',
                'active_callback' => 'surplus_education_banner_ac',
            )
        )
    );
    
    // Recommended Image Size Notes
    $wp_customize->add_setting( 
        'slider_control_note2',
         array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );

    $wp_customize->add_control( 
        new Surplus_Education_Note_Control(
            $wp_customize,
            'slider_control_note2',
             array(
                'label'           => __( 'Recommended Image Size', 'surplus-education' ),
                'description'     => sprintf( __( 'It is recommended to use Featured Image of Size %1$s1920 X 1080 Pixel%2$s while using it for slider.','surplus-education'),'<b>', '</b>'),
                'section'         => 'banner_slider_section',
                'active_callback' => 'surplus_education_banner_ac',
            )
        )
    );

    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.theme-banner .content-block.static-banner h2.title',
        'render_callback' => 'surplus_education_get_banner_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => __( 'Sub Title', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.theme-banner .content-block.static-banner .content-text',
        'render_callback' => 'surplus_education_get_banner_subtitle',
    ) );

    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'surplus_education_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'slider_cat',
		array(
            'label'	          => __( 'Slider Category', 'surplus-education' ),
			'section'         => 'banner_slider_section',
			'choices'         => surplus_education_get_categories(),
            'active_callback' => 'surplus_education_banner_ac',
            'type'            => 'select',	
 		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 3,
            'sanitize_callback' => 'surplus_education_sanitize_number_absint'
        )
    );

    $wp_customize->add_control(
        'no_of_slides',
        array(
            'section'     => 'banner_slider_section',
            'label'       => __( 'Number of Slides', 'surplus-education' ),
            'description' => __( 'Choose the number of slides you want to display', 'surplus-education' ),
            'choices'     => array(
                'min'   => 1,
                'max'   => 20,
                'step'  => 1,
            ),
            'active_callback' => 'surplus_education_banner_ac',
            'type'        => 'number',                 
        )
    );

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_cta',
        array(
            'default'           => __( 'Read More', 'surplus-education' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'banner_cta',
        array(
            'label'           => __( 'Slider Button Label', 'surplus-education' ),
            'section'         => 'banner_slider_section',
            'type'            => 'text',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_cta', array(
        'selector' => '.theme-banner .content-block.slider-banner .button-wrap .btn-link',
        'render_callback' => 'surplus_education_get_banner_cta',
    ) );


    /** Banner Label */
    $wp_customize->add_setting(
        'banner_cta1',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_cta1',
        array(
            'label'           => __( 'Banner Button One Label', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_cta1', array(
        'selector' => '.theme-banner .content-block.static-banner .button-wrap .btn-link-one',
        'render_callback' => 'surplus_education_get_banner_cta_one',
    ) );

    /** Banner Link */
    $wp_customize->add_setting(
        'banner_cta1_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_cta1_url',
        array(
            'label'           => __( 'Banner Button One Link', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_cta2',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_cta2',
        array(
            'label'           => __( 'Banner Button Two Label', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_cta2', array(
        'selector' => '.theme-banner .content-block.static-banner .button-wrap .btn-link-two',
        'render_callback' => 'surplus_education_get_banner_cta_two',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_cta2_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_cta2_url',
        array(
            'label'           => __( 'Banner Button Two Link', 'surplus-education' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'surplus_education_banner_ac'
        )
    );


    /** HR */
    $wp_customize->add_setting(
        'hr',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Surplus_Education_Note_Control( 
			$wp_customize,
			'hr',
			array(
				'section'	  => 'banner_slider_section',
				'description' => '<hr/>',
                'active_callback' => 'surplus_education_banner_ac'
			)
		)
    ); 
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		'slider_auto',
		array(
			'section'     => 'banner_slider_section',
			'label'       => __( 'Slider Auto', 'surplus-education' ),
            'description' => __( 'Enable slider auto transition.', 'surplus-education' ),
            'active_callback' => 'surplus_education_banner_ac',
            'type'        => 'checkbox',
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		'slider_loop',
		array(
			'section'     => 'banner_slider_section',
			'label'       => __( 'Slider Loop', 'surplus-education' ),
            'description' => __( 'Enable slider loop.', 'surplus-education' ),
            'active_callback' => 'surplus_education_banner_ac',
            'type'        => 'checkbox',
		)
	);
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'surplus_education_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		'slider_caption',
		array(
			'section'     => 'banner_slider_section',
			'label'       => __( 'Slider Caption', 'surplus-education' ),
            'description' => __( 'Enable slider caption.', 'surplus-education' ),
            'active_callback' => 'surplus_education_banner_ac',
            'type'        => 'checkbox',
		)
	);

    /** Slider Settings Ends */  
      
}
add_action( 'customize_register', 'surplus_education_customize_register_frontpage_banner' );