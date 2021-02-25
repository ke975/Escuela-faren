<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @since Bizart 1.0
 */

get_header();
?>
<div id="primary" class="content-area ">
	<main id="site-content" role="main">
		<div class="error-404 not-found">
			<h1><?php echo esc_html__( '404', 'bizart' ) ?></h1>
			
			<h2><?php echo esc_html__( 'SORRY!', 'bizart' ) ?></h2>
			
			<p><?php echo esc_html__( 'The Page You\'re Looking For Was Not Found', 'bizart' ) ?></p>
			
			<div>				
				<a class="bizart-btn-primary" href="<?php echo esc_url( home_url( '/' ) ) ?>">
					<span><?php echo esc_html__( 'Goto Homepage', 'bizart' ) ?>
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
				</a>
			</div>
		</div><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();