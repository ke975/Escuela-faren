<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surplus_Education
 */

	/**
	 * Doctype Hook
	 * 
	 * @hooked surplus_education_doctype
	*/
	do_action( 'surplus_education_doctype' );

?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked surplus_education_head
    */
    do_action( 'surplus_education_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked surplus_education_page_start - 20 
    */
    do_action( 'surplus_education_before_header' );

    /**
     * Header
     *
     * @hooked surplus_education_notice_bar - 10  
     * @hooked surplus_education_header - 20     
    */
    do_action( 'surplus_education_header' );
	
	/**
     * Content
     * 
     * @hooked surplus_education_content_start
    */
    do_action( 'surplus_education_content' );    
