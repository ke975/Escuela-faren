<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Surplus_Education
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="image-wrap">
					<img src="<?php echo esc_url( get_template_directory_uri(). '/assets/images/error404.jpg' ); ?>" alt="<?php esc_attr_e( 'Error Page', 'surplus-education' ); ?>"/>
				</div>

				<div class="page-content">
					<p><?php esc_html_e( 'The page you are looking for might have been removed, has its name changed, or is temporarily unavailable.', 'surplus-education' ); ?></p>
					<p><?php esc_html_e( 'Please try using our search box below.', 'surplus-education' ); ?></p>
					<?php
					get_search_form(); ?>

					<a class="btn-readmore" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Homepage', 'surplus-education' ); ?></a>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
