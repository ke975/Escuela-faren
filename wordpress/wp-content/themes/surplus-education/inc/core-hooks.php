<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Surplus_Education
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_filter( 'body_class', 'surplus_education_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
add_action( 'wp_head', 'surplus_education_pingback_header' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'surplus_education_widgets_init' );

/**
 * Filters the admin post thumbnail HTML markup to return.
 *
 * @return string
 */
add_action( 'admin_post_thumbnail_html', 'surplus_education_banner_slider_image_instruction', 10, 3 );