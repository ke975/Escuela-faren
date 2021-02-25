<?php
/**
 * Gallery Section
 * 
 * @package Surplus_Education
 */

if( is_active_sidebar( 'gallery' ) ){ ?>
	<section id="gallery_section" class="gallery-section">
		<div class="container">
			<?php dynamic_sidebar( 'gallery' ); ?>
		</div>
	</section> <!-- .gallery-section -->
	<?php 
}