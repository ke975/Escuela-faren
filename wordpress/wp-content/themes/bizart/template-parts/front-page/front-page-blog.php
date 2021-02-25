<?php
/**
 * Template for frontpage blog section
 * @since Bizart 1.0
 */
?>
<section class="bizart-news-section">
	<?php if( bizart_get( 'blog-shape' ) ): ?>
		<svg 
		 xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="481px" height="481px">
		<path fill-rule="evenodd"  fill="rgb(213, 225, 251)"
		 d="M143.773,0.595 L480.403,144.248 L336.750,480.878 L0.120,337.224 L143.773,0.595 Z"/>
		</svg>
	<?php endif; ?>
	<div class="container">
		<?php bizart_frontpage_title( 'blog' ); ?>
		<?php
			$query = new WP_Query(array(
				'posts_per_page' => bizart_get( 'blog-posts-per-page' ),
				'ignore_sticky_posts' => true
			));
			if( $query->have_posts() ){
				$cls = "bizart-blog-col-" . bizart_get( 'blog-col' );
				?>
				<div class="row <?php echo esc_attr( $cls ); ?>">
				<?php
					while( $query->have_posts() ){
						$query->the_post();
						?>
						<div class="bizart-blog-col-inner">
							<div class="bizart-news-box">
								<div class="bizart-news-box-image">
									<a href="<?php the_permalink(); ?>" class="bizart-news-img">
										<?php the_post_thumbnail(); ?>
									</a>
									<?php bizart_author_image(); ?>							

								</div>
								<div class="bizart-news-content">									
									<div class="bizart-news-date">
										<?php 
											$date = get_the_date( 'M j Y' ); 
											$date = explode( ' ', $date );
										?>
										<a href="<?php echo esc_url( bizart_get_day_link() ); ?>">
											<span class="news-post-day"><?php echo esc_html( $date[0] ); ?></span>
											<span class="news-post-month"><?php echo esc_html( $date[1] ); ?></span>
											<span class="news-post-year"><?php echo esc_html( $date[2] ); ?></span>
										</a>
									</div>
									<h3> 
										<a href="<?php the_permalink(); ?>"> 
											<?php the_title(); ?> 
										</a> 
									</h3>
									<?php bizart_comments_popup_link(); ?>								
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
		?>

		<div class="bizart-news-more-btn">
			<a href="<?php echo esc_url( bizart_get_blog_page_url() ); ?>" class="bizart-btn-primary"> 
				<span> <?php esc_html_e( 'View All News', 'bizart' ); ?></span> 
			</a>	
		</div>
	</div><!-- container -->
</section> <!-- news section -->