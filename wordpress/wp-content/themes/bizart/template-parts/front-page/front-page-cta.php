<?php
/**
 * Template for frontpage Call to action section
 * @since Bizart 1.0
 */
?>
<?php
	$page_id = bizart_get( 'cta-page' );
	if( $page_id ):
		$query = new WP_Query(array(
			'page_id' => $page_id
		));

		$sub_text = bizart_get( 'cta-sub-text' );
		if( $query->have_posts() ){
			while( $query->have_posts() ){
				$query->the_post();
				$thumbnail = get_the_post_thumbnail_url();
				$btn_txt = bizart_get( 'cta-btn-text' );
				$btn_link = bizart_get( 'cta-btn-link' );
				?>
				<section class="bizart-cta-section" style="background: url('<?php echo esc_url( $thumbnail ); ?>">
					<div class="container">
						<div class="bizart-cta-text">
							<p class="bizart-sub-title white"><?php echo esc_html( $sub_text ); ?></p>
							<h2 class="bizart-section-title section-title-white"><?php the_title(); ?></h2>
							<a href="<?php echo esc_url( $btn_link ); ?>" class="bizart-btn-primary"> 
								<span> <?php echo esc_html( $btn_txt ); ?> </span> 
							</a>	
						</div>
					</div>
				</section>
				<?php
			}
		}
		wp_reset_postdata();
?>
<?php endif; ?>