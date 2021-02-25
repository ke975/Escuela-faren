<?php
/**
*  Template for slider section
* @since Bizart 1.0
*/
$pages = bizart_get( 'slider-pages' );

if( $pages ){
	$args = apply_filters( 'bizart_slider_args', array(
		'post_type' => 'page',
		'post__in'  => json_decode( $pages )
	));
	$query = new WP_Query( $args );
	$settings = apply_filters( 'bizart_slick_slider_args', array(
		"slidesToShow"   => 1,
		"slidesToScroll" => 1,
		"autoplaySpeed"  => 4000,
		"autoplay"       => bizart_get( 'slider-autoplay' ),
		"infinite"       => bizart_get( 'slider-infinite' ),
		"dots"           => bizart_get( 'slider-dots' ) 
	));
	?>
	<section class="bizart-feature-slider">
		<div class="bizart-feature-slider-init" data-slick='<?php echo esc_attr( json_encode( $settings ) ); ?>'>
			<?php if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();
					$thumb = get_the_post_thumbnail_url();
					?>
					<div class="bizart-feature-slider-inner" style="background: url(<?php echo esc_url( $thumb ); ?>)">
						<div class="bizart-feature-slider-inner-content">
							<?php the_excerpt(); ?>
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
							</h2>
							<div class="btn-group">
								<a href="<?php the_permalink(); ?>" class="bizart-btn-primary btn-first">
									<span><?php echo esc_html__( 'Read More', 'bizart' ); ?></span> 
								</a>										
							</div>
						</div>
					</div>
					<?php
				}
			} 
			wp_reset_postdata();
			?>
		</div> <!-- slider init -->		
	<svg viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M0.00,49.99 C134.53,151.28 303.83,150.29 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #08f;"></path></svg>
	</section> <!-- section -->
<?php }
?>