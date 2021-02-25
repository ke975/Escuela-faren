<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Surplus_Education
 */

/**
 * Doctype Declaration
*/
add_action( 'surplus_education_doctype', 'surplus_education_doctype' );


/**
 * Before wp_head 
*/
add_action( 'surplus_education_before_wp_head', 'surplus_education_head' );

/**
 * Page Start
*/
add_action( 'surplus_education_before_header', 'surplus_education_page_start', 20 );

/**
 * Notice Bar Start
*/
add_action( 'surplus_education_header', 'surplus_education_notice_bar', 10 );

/**
 * Header Start
*/
add_action( 'surplus_education_header', 'surplus_education_header', 20 );

/**
 * Content Start
*/
add_action( 'surplus_education_content', 'surplus_education_content_start' );

/**
 * Content End
*/
add_action( 'surplus_education_before_footer', 'surplus_education_content_end' );

/**
 * Footer Start
*/
add_action( 'surplus_education_footer', 'surplus_education_footer_start', 10 );

/**
 * Footer Top
*/
add_action( 'surplus_education_footer', 'surplus_education_footer_top', 20 );

/**
 * Footer Bottom
*/
add_action( 'surplus_education_footer', 'surplus_education_footer_bottom', 30 );

/**
 * Footer End 
*/
add_action( 'surplus_education_footer', 'surplus_education_footer_end', 40 );

/**
 * Page End
*/
add_action( 'surplus_education_after_footer', 'surplus_education_page_end', 20 );

/**
 * Navigation
*/
add_action( 'surplus_education_after_post_content', 'surplus_education_navigation', 10 );

/**
 * Comments Template 
*/
add_action( 'surplus_education_after_post_content', 'surplus_education_comment', 25 );