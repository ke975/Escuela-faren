<?php
/**
* Add custom fileds
* @since Bizart 1.0
*/
function bizart_register_metabox(){
	add_meta_box( 
		'bizart-meta-box', 
		esc_html__( 'Bizart Settings', 'bizart' ), 
		'bizart_render_metabox', 
		'post',
		'side'
	);

	add_meta_box( 
		'bizart-meta-box', 
		esc_html__( 'Bizart Settings', 'bizart' ), 
		'bizart_render_metabox', 
		'page',
		'side'
	);
}
add_action( 'add_meta_boxes', 'bizart_register_metabox' );

function bizart_render_metabox( $post ){
	wp_nonce_field( 'bizart_meta_nonce', 'bizart_name_meta_nonce' );

	$sidebar_position = get_post_meta( $post->ID, 'bizart-sidebar-position', true );
	$featured_image = get_post_meta( $post->ID, 'bizart-use-featured-image-for-banner', true );

	$disable_banner   = get_post_meta( $post->ID, 'bizart-disable-inner-banner', true );
	$disable_footer   = get_post_meta( $post->ID, 'bizart-disable-footer-widget', true );
	?>
	<div class="bizart-metabox-wrapper">

		<div class="bizart-metabox-select">
			<label><?php echo esc_html__( 'Sidebar', 'bizart' ); ?></label>
			<select name="bizart-sidebar-position">
				<option value="show" <?php selected( 'show', $sidebar_position, true ); ?>>
					<?php esc_html_e( 'Show', 'bizart' ); ?>
				</option>
				<option value="hide" <?php selected( 'hide', $sidebar_position, true ); ?>>
					<?php esc_html_e( 'Hide', 'bizart' ); ?>
				</option>
			</select>
		</div>

		<div class="bizart-metabox-checkbox">
			<label for="bizart-use-featured-image-for-banner">
				<?php esc_html_e( 'Use featured image as banner', 'bizart' ); ?>
			</label>
			<input id="bizart-use-featured-image-for-banner" 
				type="checkbox" name="bizart-use-featured-image-for-banner" <?php checked( $featured_image, 'on', true ); ?> 
			/>
		</div>

		<div class="bizart-metabox-checkbox">
			<label for="bizart-disable-inner-banner"><?php esc_html_e( 'Disable Banner', 'bizart' ); ?></label>
			<input id="bizart-disable-inner-banner" 
				type="checkbox" name="bizart-disable-inner-banner" <?php checked( $disable_banner, 'on', true ); ?> 
			/>
		</div>

		<div class="bizart-metabox-checkbox">
			<label for="bizart-disable-footer-widget"><?php esc_html_e( 'Disable Footer Widget', 'bizart' ); ?></label>
			<input id="bizart-disable-footer-widget" 
				type="checkbox" name="bizart-disable-footer-widget" <?php checked( $disable_footer, 'on', true ); ?> 
			/>
		</div>
	</div>
	<?php
}

function bizart_save_metabox( $post_id ){
	      	
  	$p = wp_unslash( $_POST );
  	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	if ( $is_autosave || $is_revision || empty( $p ) || ! isset(  $p[ 'bizart_name_meta_nonce' ] ) || ! wp_verify_nonce( $p[ 'bizart_name_meta_nonce' ], 'bizart_meta_nonce' )) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	//Don't update on Quick Edit
	if (defined('DOING_AJAX') ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	update_post_meta( $post_id, 'bizart-sidebar-position', sanitize_key( $p[ 'bizart-sidebar-position' ] ) );
	update_post_meta( $post_id, 'bizart-use-featured-image-for-banner', sanitize_key( $p[ 'bizart-use-featured-image-for-banner' ] ) );
	update_post_meta( $post_id, 'bizart-disable-inner-banner', sanitize_key( $p[ 'bizart-disable-inner-banner' ] ) );
	update_post_meta( $post_id, 'bizart-disable-footer-widget', sanitize_key( $p[ 'bizart-disable-footer-widget' ] ) );

}
add_action( 'save_post', 'bizart_save_metabox' );