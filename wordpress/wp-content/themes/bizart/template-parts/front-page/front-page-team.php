<?php
/**
* ------------------------------------------------------
*  Template for team section
* ------------------------------------------------------
*
* @since Bizart 1.0
*/
?>
<section class="bizart-team-section">

	<?php if( bizart_get( 'team-shape' ) ): ?>
		<svg 
		 xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="316px" height="316px">
		<path fill-rule="evenodd"  fill="rgb(213, 225, 251)"
		 d="M94.527,0.463 L315.600,94.803 L221.260,315.877 L0.186,221.536 L94.527,0.463 Z"/>
		</svg>
	<?php endif; ?>
	<div class="container">
	<?php bizart_frontpage_title( "team" ); ?>
	<?php 
		$pages = bizart_get( 'team-pages' ); 
		if( $pages ){
			$args = apply_filters( 'bizart_team_args', array(
				'post_type'      => 'page',
				'posts_per_page' => bizart_get( 'team-posts-per-page' ),
				'post__in'       => json_decode( $pages ),
				'orderby'        => 'post__in'
			));
			$query = new WP_Query( $args );
			if( $query->have_posts() ){
				$cls = "bizart-team-col-" . bizart_get( 'team-col' );
				?>
				<div class="row <?php echo esc_attr( $cls ); ?>">
			<?php
				while( $query->have_posts() ){
					$query->the_post();
					$heading = bizart_get_piped_title();
			?>
					<div class="bizart-team-col-inner">
						<div class="bizart-team-box">
							<div class="bizart-team-image">
								<?php the_post_thumbnail(); ?>	
								<div class="bizart-team-description">
									<h3><?php echo esc_html( $heading[ 0 ] ); ?></h3>
									<h4><?php echo esc_html( $heading[ 1 ] ); ?></h4>
								</div>							
							</div>							
							<a href="<?php the_permalink(); ?>"></a>
						</div>
					</div>
			<?php }  ?>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
	?>
	</div>
	<?php
		$btn_txt = bizart_get( 'team-btn-text' );
		$team_archive_id = bizart_get( 'team-archive-page' );
		if( $team_archive_id > 0 ):
	?>
			<div class="bizart-team-btn">
				<a href="<?php echo esc_attr( get_permalink( $team_archive_id ) ) ?>" class="bizart-btn-primary"> 
					<span> <?php echo esc_html( $btn_txt ); ?></span> 
				</a>	
			</div>
		<?php endif; ?>	
</section> <!-- team section -->