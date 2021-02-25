<?php
/*
 Template Name: Bizart Team Archive
*/
 get_header(); 

get_template_part( 'template-parts/content', 'banner' );
?>
<div class="container">
	<main id="site-content" role="main">
		<div class="row">
			<div class="col-12">
				<div id="primary" class="content-area">
					<?php if ( have_posts() ): ?>
						<?php
							while ( have_posts() ){
								the_post();
								?>
								<article <?php echo bizart_schema( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
									<div class="entry-content">
										<?php the_content(); ?>		
									</div><!-- .entry-content -->
								</article>
								<?php
							}
						?>
					<?php endif; ?>

					<section class="bizart-team-section">
						<?php 
							$pages = bizart_get( 'team-pages' ); 
							if( $pages ){
								$args = apply_filters( 'bizart_team_archive_args', array(
									'post_type'      => 'page',
									'posts_per_page' => 5,
									'post__in'       => json_decode( $pages )
								));
								$query = new WP_Query( $args );
								if( $query->have_posts() ){
									echo '<div class="row">';
									while( $query->have_posts() ){
										$query->the_post();
										$title = bizart_get_piped_title();
								?>
										<div class="col-12 col-xs-6 col-md-4">
											<div class="bizart-team-box">
												<div class="bizart-team-image">
													<?php the_post_thumbnail(); ?>						
												</div>
												<div class="bizart-team-description">
													<h3><?php echo esc_html( $title[0] ); ?></h3>
													<?php if(!empty( $title[1] ) ): ?>
														<h4><?php echo esc_html( $title[1] ); ?></h4>
													<?php endif; ?>
												</div>
												<a href="<?php the_permalink(); ?>"></a>
											</div>
										</div>
						<?php
									}
									echo '</div>';
								}
								wp_reset_postdata();
							}
						?>
					</section>
				</div>
			</div>
		</div>
	</main><!-- .site-main -->
</div>	
<?php get_footer() ?>