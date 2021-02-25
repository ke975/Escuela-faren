<?php
/**
 * Featured Course Section
 * 
 * @package Surplus_Education
 */

$fc_view_all     = get_theme_mod( 'fc_view_all' );
$fc_view_all_url = get_theme_mod( 'fc_view_all_url' );

if( is_active_sidebar( 'featured_course' ) ){ ?>
	<section id="featured_course_section" class="featured-course-section">
		<div class="container">
			<div class="widget-wrapper">
				<?php dynamic_sidebar( 'featured_course' ); ?>
			</div>
			<?php if( $fc_view_all && $fc_view_all_url ) : ?>
				<div class="button-wrap">
					<a href="<?php echo esc_url( $fc_view_all_url ); ?>" class="bttn"><?php echo esc_html( $fc_view_all ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section> <!-- .featured-course-section -->
	<?php 
}