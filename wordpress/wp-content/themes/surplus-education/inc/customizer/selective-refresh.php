<?php
/**
 * Customizer Partials
 *
 * @package Surplus_Education
 */

if( ! function_exists( 'surplus_education_get_banner_title' ) ) :
/**
 * Banner Title
*/
function surplus_education_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_banner_subtitle' ) ) :
/**
 * Banner SubTitle
*/
function surplus_education_get_banner_subtitle(){
    return esc_html( get_theme_mod( 'banner_subtitle' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_banner_cta_one' ) ) :
/**
 * Banner cta_one
*/
function surplus_education_get_banner_cta_one(){
    return esc_html( get_theme_mod( 'banner_cta1' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_banner_cta_two' ) ) :
/**
 * Banner Title
*/
function surplus_education_get_banner_cta_two(){
    return esc_html( get_theme_mod( 'banner_cta2' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_banner_cta' ) ) :
/**
 * Banner Title
*/
function surplus_education_get_banner_cta(){
    return esc_html( get_theme_mod( 'banner_cta', __( 'Read More', 'surplus-education' ) ) );
}
endif;

if( ! function_exists( 'surplus_education_get_fc_view_all' ) ) :
/**
 * Fatured Course View All
*/
function surplus_education_get_fc_view_all(){
    return esc_html( get_theme_mod( 'fc_view_all' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_team_view_all' ) ) :
/**
 * Team View All
*/
function surplus_education_get_team_view_all(){
    return esc_html( get_theme_mod( 'team_view_all' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_event_section_title' ) ) :
/**
 * Event Title
*/
function surplus_education_get_event_section_title(){
    return esc_html( get_theme_mod( 'event_section_title' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_event_section_subtitle' ) ) :
/**
 * Event SubTitle
*/
function surplus_education_get_event_section_subtitle(){
    return esc_html( get_theme_mod( 'event_section_subtitle' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_event_view_all' ) ) :
/**
 * Event View All
*/
function surplus_education_get_event_view_all(){
    return esc_html( get_theme_mod( 'event_view_all' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_testimonial_title' ) ) :
/**
 * Testimonial Title
*/
function surplus_education_get_testimonial_title(){
    return esc_html( get_theme_mod( 'testimonial_title' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_testimonial_subtitle' ) ) :
/**
 * Testimonial SubTitle
*/
function surplus_education_get_testimonial_subtitle(){
    return esc_html( get_theme_mod( 'testimonial_subtitle' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_blog_section_title' ) ) :
/**
 * Blog Title
*/
function surplus_education_get_blog_section_title(){
    return esc_html( get_theme_mod( 'blog_section_title' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_blog_section_subtitle' ) ) :
/**
 * Blog SubTitle
*/
function surplus_education_get_blog_section_subtitle(){
    return esc_html( get_theme_mod( 'blog_section_subtitle' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_blog_view_all' ) ) :
/**
 * Blog View All
*/
function surplus_education_get_blog_view_all(){
    return esc_html( get_theme_mod( 'blog_view_all' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_notice_bar_title' ) ) :
/**
 * Notice Bar Title
*/
function surplus_education_get_notice_bar_title(){
    return esc_html( get_theme_mod( 'notice_bar_title' ) );
}
endif;

if( ! function_exists( 'surplus_education_get_read_more_text' ) ) :
/**
 * Read More Title
*/
function surplus_education_get_read_more_text(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read More', 'surplus-education' ) ) );
}
endif;