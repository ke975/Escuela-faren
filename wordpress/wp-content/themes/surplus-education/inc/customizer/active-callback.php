<?php
/**
 * Active Callback
 * 
 * @package Surplus_Education
*/

/**
 * Active Callback for Blog View All Button
*/
function surplus_education_blog_view_all_ac( $control ){
    $blog = get_option( 'page_for_posts' );
    $blog_active      = $control->manager->get_setting( 'enable_blog_section' )->value();
    if( $blog && $blog_active ) return true;
    
    return false; 
}

/**
 * Active Callback for Blog Active
*/
function surplus_education_blog_active( $control ){
    
    $blog_active      = $control->manager->get_setting( 'enable_blog_section' )->value();
    if( $blog_active ) return true;

    return false;
}


/**
 * Active Callback for Banner Slider
*/
function surplus_education_banner_ac( $control ){
    $banner      = $control->manager->get_setting( 'enable_banner_section' )->value();
    $header_video = $control->manager->get_setting( 'header_video' )->value();
    $external_header_video = $control->manager->get_setting( 'external_header_video' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'slider_control_note1' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'slider_control_note2' && ( $banner == 'post' || $banner == 'category' ) ) return true;
    if ( $control_id == 'banner_title' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_subtitle' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_caption_layout' && $banner != 'no_banner' ) return true;
    if ( $control_id == 'banner_cta1' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_cta1_url' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_cta2' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_cta2_url' && ( is_front_page() && $banner == 'static_banner' ) ) return true;
    if ( $control_id == 'banner_cta' && ( $banner == 'post' || $banner == 'category' ) ) return true;

    if ( $control_id == 'slider_type' && ( $banner == 'post' || $banner == 'category' ) ) return true;
    if ( $control_id == 'slider_auto' && ( $banner == 'post' || $banner == 'category' ) ) return true;
    if ( $control_id == 'slider_loop' && ( $banner == 'post' || $banner == 'category' ) ) return true;
    if ( $control_id == 'slider_caption' && ( $banner == 'post' || $banner == 'category' ) ) return true;              
    if ( $control_id == 'slider_cat' && $banner == 'category' ) return true;
    if ( $control_id == 'no_of_slides' && $banner == 'post' ) return true;
    if ( $control_id == 'hr' && ( $banner == 'post' || $banner == 'category' ) ) return true;
    
    return false;
}

if ( ! function_exists( 'surplus_education_social_links_ac' ) ) :

    /**
     * Active Callback for social links section
     */
    function surplus_education_social_links_ac( $control ){

        $show_contact_info = $control->manager->get_setting( 'enable_social_links' )->value();
        $control_id        = $control->id;

        if ( $control_id == 'social_link_1' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_2' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_3' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_4' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_5' && $show_contact_info ) return true;
             
        return false;
    }
endif;