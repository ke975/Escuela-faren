<?php
/**
 * Testimonial Section
 * 
 * @package Surplus_Education
 */

$testimonial_title    = get_theme_mod( 'testimonial_title' );
$testimonial_subtitle = get_theme_mod( 'testimonial_subtitle' );

if( is_active_sidebar( 'testimonial' ) ){ ?>
	<section id="testimonial_section" class="testimonial-section">
		<div class="container">
			<?php if( !empty( $testimonial_title ) || !empty( $testimonial_subtitle ) ) : ?>
				<div class="section-header">
					<?php 
					if( !empty( $testimonial_title ) ) echo '<h2 class="section-title">' . esc_html( $testimonial_title ) . '</h2>';
					if( !empty( $testimonial_subtitle ) ) echo '<div class="section-info">' . wp_kses_post( wpautop( $testimonial_subtitle ) ) . '</div>';
					?>
				</div>
			<?php endif; ?>
			<div class="flexbox-wrapper">
	    		<?php dynamic_sidebar( 'testimonial' ); ?>
	    	</div>
	    </div>
	</section> <!-- .testimonial-section -->
	<?php
}