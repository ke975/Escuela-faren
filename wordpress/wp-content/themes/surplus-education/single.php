<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Surplus_Education
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php
        /**  
         * @hooked surplus_education_navigation           - 10
         * @hooked surplus_education_comment              - 25
        */
        do_action( 'surplus_education_after_post_content' );
        ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
