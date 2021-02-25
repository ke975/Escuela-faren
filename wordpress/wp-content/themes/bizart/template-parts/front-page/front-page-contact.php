<?php
/**
*  Template for Contact section
* @since Bizart 1.0
*/
?>
<section class="bizart-contact-section">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="contact-form-wrapper">
					<?php
						# Title
						$page_id = bizart_get( "contact-page" );
						if( $page_id ){
							$query = new WP_Query(array(
								'page_id' => absint( $page_id )
							));
							if( $query->have_posts() ){
								while( $query->have_posts() ){
									$query->the_post();

									?>
									<h2 class="bizart-section-title section-title-black"><?php the_title(); ?></h2>
									<p><?php the_content(); ?></p>
									<?php 
								}
							}
							wp_reset_postdata();
						}

						#cf7 shortcode
						$cf7 = bizart_get( 'contact-form-shortcode' );
						if( !empty( $cf7 ) ){
							echo do_shortcode( $cf7 );
						}
					?>
				</div>
			</div>
			<div class="col-12 col-md-6">				
				<div class="map-wrapper">
					<?php
						# Title
						$page_id = bizart_get( "contact-map-page" );
						if( $page_id ){
							$query = new WP_Query(array(
								'page_id' => absint( $page_id )
							));
							if( $query->have_posts() ){
								while( $query->have_posts() ){
									$query->the_post();
									the_content();
								}
							}
							wp_reset_postdata();
						}
					?>
				</div>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</section><!-- section -->

