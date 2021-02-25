<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Bizart 1.0
 */

if ( ! is_active_sidebar( 'bizart_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
		dynamic_sidebar( 'bizart_sidebar' ); 
	?>
</aside><!-- #secondary -->