<?php
/**
 * Template for frontpage partner section
 * @since Bizart 1.0
 */
?>
<?php
	$pages = bizart_get( 'partner-pages' );
	if( !$pages ){
		return;
	}

	$args = apply_filters( 'bizart_partner_args', array(
		'post_type' => 'page',
		'post__in'  => json_decode( $pages )
	));
	
	$query = new WP_Query( $args );

	if( $query->have_posts() ){
		$settings = apply_filters( 'bizart_partner_slick_args', array(
			"centerMode" => true,
			"centerPadding" => '15px',
			"slidesToShow" => bizart_get( 'partner-slide-show' ),
			"autoplay"  => true,
			"dots"   => false,
			"arrows" => false,
			"responsive" => array(
				array(
					"breakpoint" => 767,
					"settings"   => array(
						"slidesToShow" => 2,
						"autoplay"  => true,						
					),
				),							
			)
		));
?>
		<section class="bizart-partner-section">
			<div class="container">
				<div class="bizart-partners-wrapper" data-slick="<?php echo esc_attr( json_encode( $settings ) ); ?>">
					<?php 
						while( $query->have_posts() ){
							$query->the_post();
					?>
							<div class="partner-inner">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
					<?php  
						} 
					?>
				</div>
			</div><!-- container -->
		</section> <!-- partnar section -->
<?php  
	}
	wp_reset_postdata();
?>