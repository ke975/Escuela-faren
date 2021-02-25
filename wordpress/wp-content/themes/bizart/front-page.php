<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bizart WordPress Theme
 */
get_header(); 
?>
<main id="content" role="main">
<?php 
	if ( have_posts() ){
		while ( have_posts() ){
			the_post();
			$show_content = bizart_get( 'show-content' );
			$show_content_above = bizart_get( 'show-content-above' );

			if( $show_content && $show_content_above ){ 
				get_template_part( 'template-parts/content', 'frontpage' ); 
			}

			foreach( bizart_get_content_order() as $template ){

				if( bizart_get( "enable-{$template}-shortcode" ) ){
					$shortcode = bizart_get( "{$template}-shortcode" );
					echo do_shortcode( $shortcode );
				}
					
				if( bizart_get( "enable-{$template}" ) ){
					get_template_part( 'template-parts/front-page/front-page', $template );
				}
			} 

			if( $show_content && !$show_content_above ){ 
				get_template_part( 'template-parts/content', 'frontpage' ); 
			}
		}
	}
?>
</main>
<?php get_footer() ?>