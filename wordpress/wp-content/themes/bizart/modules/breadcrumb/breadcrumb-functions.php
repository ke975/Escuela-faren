<?php
/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  Bizart 1.0
 */
if( !function_exists( 'bizart_breadcrumb_trail') ){
	function bizart_breadcrumb_trail( $args = array() ) {

		$breadcrumb = apply_filters( 'bizart_breadcrumb_trail_object', null, $args );

		if ( !is_object( $breadcrumb ) ) 
			$breadcrumb = new Bizart_Breadcrumb_Trail( $args );

		return $breadcrumb->trail();
	}
}

/**
 *  Lists of files to be loaded for theme options module
 *
 * @since Bizart 1.0
 */
function bizart_breadcrumb_files( $files ){

    $new_files = array( 'class-breadcrumb.php' );

    return array_merge( $files, $new_files );
}
add_filter( 'bizart_modules_breadcrumb', 'bizart_breadcrumb_files' );