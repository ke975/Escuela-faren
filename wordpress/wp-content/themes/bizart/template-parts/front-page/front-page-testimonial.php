<?php
/**
* ------------------------------------------------------
*  Template for about section
* ------------------------------------------------------
*
* @since Bizart 1.0
*/
?>
<section class="bizart-testimonials-section">	
	<div class="bizart-testimonials-title">
		<?php bizart_frontpage_title( "testimonial" ); ?>
	</div>
	<div class="container">
		<?php
			$pages = bizart_get( 'testimonial-pages' );
			if( $pages ){
				$args = apply_filters( 'bizart_testimonial_args', array(
					'post_type' => 'page',
					'post__in'  => json_decode( $pages )
				));
				$query = new WP_Query( $args );
				if( $query->have_posts() ){
					$settings = apply_filters( 'bizart_testimonial_slick_args', array(
						"centerMode" => true,
						"centerPadding" => '15px',
						"slidesToShow" => 3,
						"autoplay"  => false,
						"dots"   => false,
						"arrows" => false,
						"responsive" => array(
							array(
								"breakpoint" => 767,
								"settings"   => array(
									"slidesToShow" => 1,
									"autoplay"  => true,						
								),
							),							
						)
					));
		?>
				<div class="bizart-testimonial" data-slick="<?php echo esc_attr( json_encode( $settings ) ); ?>">
					<?php 
						while( $query->have_posts() ){
							$query->the_post();
							$heading = bizart_get_piped_title();
					?>
							<div class="bizart-testimonials-box-wrapper">
								<div class="bizart-testimonials-box">									
									<div class="bizart-testimonials-image">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php the_content(); ?>
									<div class="bizart-testimonials-client-info">
										<div class="bizart-testimonials-name">
											<h3><?php echo esc_html( $heading[0] ); ?></h3>
											<span><?php echo esc_html( $heading[1] ); ?></span>
										</div>
									</div>
								</div>
							</div>
					<?php  
						} 
					?>
				</div>
		<?php 
				}
				wp_reset_postdata(); 
			}
		?>							
	</div><!-- container -->
</section><!-- section -->