<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surplus_Education
 */

	/**
     * After Content
     * 
     * @hooked surplus_education_content_end - 20
    */
    do_action( 'surplus_education_before_footer' );

	/**
     * Before footer
     * 
     * @hooked surplus_education_newsletter - 10
    */
    do_action( 'surplus_education_before_footer_start' );

    /**
     * Footer
     * 
     * @hooked surplus_education_footer_start  - 10
     * @hooked surplus_education_footer_top    - 20
     * @hooked surplus_education_footer_bottom - 30
     * @hooked surplus_education_footer_end    - 40
    */
    do_action( 'surplus_education_footer' );

	/**
     * After Footer
     * 
     * @hooked surplus_education_page_end    - 20
    */
    do_action( 'surplus_education_after_footer' );

	wp_footer(); ?>

</body>
</html>
