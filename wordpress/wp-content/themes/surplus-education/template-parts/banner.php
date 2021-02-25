<?php
/**
 * Banner Section
 * 
 * @package Surplus_Education
 */

$ed_banner           = get_theme_mod( 'enable_banner_section', 'static_banner' );
        
if( $ed_banner == 'static_banner' ){  
    surplus_education_home_banner();
}elseif( $ed_banner == 'post' || $ed_banner == 'category' ){
    surplus_education_banner_slider();
}

/**
 * After Banner Hook for placeholder.
 * 
 * @hooked Null
*/
do_action( 'surplus_education_after_banner' ); 