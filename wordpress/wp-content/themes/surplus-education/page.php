<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Surplus_Education
 */

get_header();
	
	$front_sections = surplus_education_get_home_sections();
	
	if( is_front_page() && $front_sections ) :
		$ed_banner  = get_theme_mod( 'enable_banner_section', 'static_banner' );
		if( $ed_banner == 'static_banner' || $ed_banner == 'post' || $ed_banner == 'category' ) {
	        get_template_part( 'template-parts/banner' );  
		}
		echo '<div id="content" class="site-content"><div id="primary" class="content-area">';
		//If any one section are enabled then show custom home page.
	    foreach( $front_sections as $section ){
	        get_template_part( 'template-parts/' . esc_attr( $section ) );  
	    }
	    echo '</div></div>';
	else : ?>
		
		<?php if( is_front_page() && !$front_sections ) echo '<div id="content" class="site-content"><div class="container">'; ?> 		
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar();
		if( is_front_page() && !$front_sections ) echo '</div></div>'; 		
	endif;

get_footer();
