<?php
/**
* ------------------------------------------------------
*  Template for service section
* ------------------------------------------------------
*
* @since Bizart 1.0
*/
?>
<section class="bizart-services-section">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 order-mobile-2">
				<div class="bizart-services-icon-box-wrapper">
					<?php 
						$pages = bizart_get( 'service-pages' ); 
						if( $pages ){
							$args = apply_filters( 'bizart_service_args', array(
								'post_type' => 'page',
								'post__in'  => json_decode( $pages )
							));
							$query = new WP_Query( $args );
							if( $query->have_posts() ){
								while( $query->have_posts() ){
									$query->the_post();
							?>
								<div class="bizart-services-icon-box">
									<div class="bizart-services-icon-box-inner">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>										
											<h3><?php the_title(); ?></h3>
											<?php the_excerpt(); ?>
										</a>
									</div>
								</div>
							<?php
								}
							}
							wp_reset_postdata();
						}
					?>
				</div><!-- icon box wrapper -->	
				<?php
					$btn_txt = bizart_get( 'service-btn-text' );
					$page_id = bizart_get( 'service-page' );
					
					if( $page_id ){
						$query = new WP_Query(array(
							'page_id' => $page_id
						));
						$data = array();
						if( $query->have_posts() ){
							while( $query->have_posts() ){
								$query->the_post();
								$data = array(
									'title'   => get_the_title(),
									'link'    => get_the_permalink(),
									'content' => get_the_excerpt()
								);
							}
						}
						wp_reset_postdata();
					}
				?>

				<?php if( $page_id ): ?>
					<div class="display-on-mobile more-services-mbl">
						<a href="<?php echo esc_url( $data['link'] ); ?>" class="bizart-btn-primary"> 
							<span><?php echo esc_html( $btn_txt ); ?> <i class="fa fa-long-arrow-right"></i> </span> 
						</a>
					</div>
				<?php endif; ?>								
			</div><!-- col-6 -->

			<div class="col-12 col-md-6 order-mobile-1">
				<?php if( $page_id ): ?>
					<div class="bizart-services-text-wrapper">
						<div class="bizart-services-text">
							<?php 
								$sub_title = bizart_get( 'service-sub-text' );
							?>
							<?php if( !empty( $sub_title ) ): ?>
								<p class="bizart-sub-title">
									<?php echo esc_html( $sub_title ); ?>
								</p>
							<?php endif; ?>

							<h2 class="bizart-section-title section-title-black"><?php echo $data['title']; //WPCS: XSS ok ?></h2>
							<div class="bizart-services-text-desc"><?php echo $data['content']; //WPCS: XSS ok ?></div>
							<a href="<?php echo esc_url( $data[ 'link' ] ); ?>" class="bizart-btn-primary hide-on-mobile btn-right"> 
								<span><?php echo esc_html( $btn_txt ); ?> </span> 
							</a>	
						</div>										
					</div>
				<?php endif; ?>
			</div><!-- col-6 -->
		</div><!-- row -->
	</div><!-- container -->
</section>
