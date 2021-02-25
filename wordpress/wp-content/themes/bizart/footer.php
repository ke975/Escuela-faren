<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0
 * @package Bizart WordPress theme
 */
$show_widget = true;
if( is_page() || is_single() || is_home() ){

	
	$id = bizart_get_page_id();
	
	if( 'on' == get_post_meta( $id, 'bizart-disable-footer-widget', true ) ){
		$show_widget = false;
	}
} 

$show_social_menu = bizart_get( 'footer-social-menu' );
$scroll = bizart_get( 'enable-scroll-to-top' );
$footer_text = bizart_get('footer-copyright-text');
?>
	<section <?php echo bizart_schema( 'footer' ); ?> class="bizart-footer-wrapper">
		<?php if( $show_widget ): ?>
			<div class="container-fluid px-md-5">
				<footer class="bizart-footer-wrapper-inner footer-widget">
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'bizart-footer-widget-1' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'bizart-footer-widget-2' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'bizart-footer-widget-3' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'bizart-footer-widget-4' ); ?></div>
				</footer>
			</div>
		<?php endif; ?>
		
		<div class="bizart-copyright">
			<div class="container-fluid">
				<div class="bizart-copyright-inner">
					<div class="bizart-copy-right">
						<div class="pr-0">
							<?php echo esc_html( $footer_text ); ?>		
						</div> 
						<div class="bizart-credit-link">						
							<?php esc_html_e( 'Created By:' , 'bizart' ) ?>
							<a class="pl-1" href="<?php echo esc_url( '//www.fanseethemes.com' ); ?>" target="_blank">
								<?php esc_html_e( 'Fansee Themes', 'bizart' ); ?>	                     		
							</a>
						</div>
					</div>

					<?php if( $show_social_menu ): ?>
						<div class="bizart-social-menu">
							<?php 
								wp_nav_menu(array(
									'theme_location' => 'social-menu-footer',
									'menu_id'      => 'social-menu-footer',
									'menu_class'   => 'menu',
									'link_before'  => '<span>',
									'link_after'   => '</span>',
									'fallback_cb'  => 'bizart_default_social_menu',
									'depth'        => 1,
									'echo'         => true
								));
							?>
						</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
	<?php if( $scroll ): ?>
		<div class="bizart-stt scroll-to-top">
			<i class="fa fa-arrow-up"></i>
		</div>
	<?php endif; ?>
	<?php wp_footer(); ?>
 </body>
 </html>