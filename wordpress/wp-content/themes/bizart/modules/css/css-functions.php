<?php
/**
 * Prints dynamic styles
 * @since Bizart 1.0
 */
function bizart_dynamic_styles(){

	#dynamic fonts
	$fonts         = bizart_get_fonts();
	$info_fonts    = bizart_get( 'site-info-font' );
	$body_fonts    = bizart_get( 'body-font' );
	$body_font_weight = bizart_get( 'body-font-weight' );
	$heading_fonts = bizart_get( 'heading-font' );
	$heading_font_weight = bizart_get( 'heading-font-weight' );

	#dynamic colors
	$primary_color     = bizart_get( 'primary-color' );
	$paragraph_color   = bizart_get( 'body-paragraph-color' );
	$link_color        = bizart_get( 'link-color' );
	$link_hover_color  = bizart_get( 'link-hover-color' );
	$header_text_color = get_header_textcolor();
	$svg_color         = bizart_get( 'svg-bg-color' );

	#banner options
	$banner_title_color = bizart_get( 'banner-title-color' );
	$banner_bg_color    = bizart_get( 'banner-bg-color' );
	$banner_overlay     = bizart_get( 'banner-bg-overlay' );

	#banner height
	$banner_height_mobile  = bizart_get( 'banner-height-mobile' );
	$banner_height_tablet  = bizart_get( 'banner-height-tablet' );
	$banner_height_desktop = bizart_get( 'banner-height-desktop' );

	$slider_overlay_color = bizart_get( 'slider-overlay-color' );
	$cta_overlay_color = bizart_get( 'cta-overlay-color' );

	$frontpage_btn_bg_color = bizart_get( 'frontpage-btn-bg-color' );
	$frontpage_btn_bg_hover_color = bizart_get( 'frontpage-btn-bg-hover-color' );

	$primary_menu_bg = bizart_get( 'primary-menu-bg-color' );
	?>
	<style type="text/css">
		.body-scrolled .site-header, .no-inner-banner .site-header,
		.site-header{
			background: <?php echo esc_attr( $primary_menu_bg ); ?>;
		}

		.bizart-feature-slider-inner:after{
			background: <?php echo esc_attr( $slider_overlay_color ); ?>
		}

		.bizart-cta-section:after{
			background: <?php echo esc_attr( $cta_overlay_color ); ?>
		}

		.bizart-btn-primary, .comment-respond .comment-form input[type="submit"], .woocommerce ul.products li.product .button, .woocommerce ul.products li.product .added_to_cart.wc-forward, .woocommerce-cart .woocommerce form.woocommerce-cart-form table button.button, .woocommerce-cart .woocommerce .cart-collaterals .cart_totals a.checkout-button.button.alt.wc-forward, form.woocommerce-checkout div#order_review #payment button#place_order, .widget_tag_cloud .tagcloud a, .footer-widget .widget-title:before, .post-categories li a:hover, form.wpcf7-form input[type=submit], form.wpcf7-form button[type="submit"]{
			background: <?php echo esc_attr( $frontpage_btn_bg_color ); ?>
		}

		.bizart-btn-primary:after,form.wpcf7-form input[type=submit]:hover, form.wpcf7-form button[type="submit"]:hover{
			background: <?php echo esc_attr( $frontpage_btn_bg_hover_color ); ?>
		}

		<?php if(! display_header_text() ): ?>
			.site-title, .site-description{
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php endif; ?>

		.site-header .site-description, .site-header .site-title a{
			font-family: "<?php echo esc_html( $fonts[ $info_fonts ][ 'family' ] ); ?>";
			color: #<?php echo esc_html( $header_text_color ); ?>;
		}

		body{
			font-family: "<?php echo esc_html( $fonts[ $body_fonts ][ 'family' ] ); ?>";
			font-weight: <?php echo esc_attr( $body_font_weight ); ?>;
		}

		h1,h2,h3,h4,h5,h6, .h1, .h2, .h3, .h4, .h5, .h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
			font-family: "<?php echo esc_html( $fonts[ $heading_fonts ][ 'family' ] ); ?>";
			font-weight: <?php echo esc_attr( $heading_font_weight ); ?>;
		}

		body, body p{
			color: <?php echo esc_html( $paragraph_color ); ?>;;
		
		}

		a{
			color: <?php echo esc_html( $link_color ); ?>;;
		}

		a:hover{
			color: <?php echo esc_html( $link_hover_color ); ?>;;
		}

		
		.no-results.not-found a,
		.bizart-stt,
		.bizart-news-section .bizart-news-box .bizart-news-content .bizart-news-box-meta .post-categories a:hover,
		#secondary .widget:not(.widget_search) .widget-title::before,
		.widget_tag_cloud .tagcloud a,
		.footer-widget .widget-title:before,
		.post-categories li a:hover,
		.bizart-tags-wrapper ul li a:hover{
			background: <?php echo esc_html( $primary_color ); ?>;
		}		

		.slick-slide:not(.slick-center) .bizart-testimonials-box i,
		.bizart-testimonials-section .bizart-testimonials-box h3,		
		.bizart-team-section .bizart-team-box:hover h3,
		.bizart-news-section .bizart-news-box:hover h3 a,
		.bizart-sub-title,
		.bizart-services-section .bizart-services-icon-box-wrapper .bizart-services-icon-box-inner:hover h3,
		.bizart-news-section .bizart-news-box .bizart-news-date:before,
		.bizart-news-section .comment-wrapper:before,
		.widget-area .widget ul li a:hover,
		.bizart-post .bizart-date:before,
		.bizart-post .comment-wrapper:before{
			color: <?php echo esc_html( $primary_color ); ?>;
		}

		.bizart-news-section .bizart-news-box .bizart-news-content .bizart-news-box-meta .post-categories a,
		.post-categories li a, .bizart-tags-wrapper ul li a{
			border-color: <?php echo esc_html( $primary_color ); ?>;
		
		}

		.bizart-loader-wrapper .bizart-loader circle{
			stroke: <?php echo esc_html( $primary_color ); ?>;
		
		}
		.bizart-arrow svg:hover{
			fill: <?php echo esc_html( $primary_color ); ?>;
		
		}

		#secondary .widget:not(.widget_search) .widget-title::before,
		.footer-widget .widget-title:before{
			box-shadow: -3px 0 0 0 #fff, -6px 0 0 0 <?php echo esc_html( $primary_color ); ?>, -9px 0 0 0 #fff, -12px 0 0 0 <?php echo esc_html( $primary_color ); ?>;
		}

		.bizart-inner-banner-wrapper .entry-title, .bizart-inner-banner-wrapper .breadcrumb-wrapper ul li a,  .bizart-inner-banner-wrapper .breadcrumb-wrapper ul li{
			color: <?php echo esc_html( $banner_title_color ); ?>;
		}

		.bizart-inner-banner-wrapper{
			min-height: <?php echo esc_html( $banner_height_desktop ); ?>px;
		}

		.bizart-inner-banner-wrapper:after{
			background-color: <?php echo esc_html( $banner_bg_color ); ?>;
			opacity: <?php echo esc_html( $banner_overlay / 10 ); ?>;
		}

		.bizart-services-section > svg path,
		section.bizart-team-section > svg path,
		.bizart-news-section > svg path {
			fill: <?php echo esc_html( $svg_color ); ?>;
		}

		/* responsive style for tablet */

		@media (max-width: 1024px) {
		  	.bizart-inner-banner-wrapper{
				min-height: <?php echo esc_html( $banner_height_tablet ); ?>px;
			}
		}

		/* responsive style for mobile */

		@media (max-width: 767px) {
		  	.bizart-inner-banner-wrapper{
				min-height: <?php echo esc_html( $banner_height_mobile ); ?>px;
			}
		}

	</style>
	<?php
}
add_action( 'wp_head', 'bizart_dynamic_styles' );