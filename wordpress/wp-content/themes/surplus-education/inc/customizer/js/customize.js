jQuery(document).ready(function($){
    /* Move Front page widgets to front-page panel */
    wp.customize.section( 'sidebar-widgets-about' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-about' ).priority( '40' );
    wp.customize.section( 'sidebar-widgets-featured_course' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-featured_course' ).priority( '60' );
    wp.customize.section( 'sidebar-widgets-team' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-team' ).priority( '80' );
    wp.customize.section( 'sidebar-widgets-event' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-event' ).priority( '85' );
    wp.customize.section( 'sidebar-widgets-testimonial' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-testimonial' ).priority( '110' );
    wp.customize.section( 'sidebar-widgets-gallery' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-gallery' ).priority( '120' ); 
    
    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    }); 
});

function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        case 'accordion-section-sidebar-widgets-about':
        preview_section_id = "about_section";
        break;

        case 'accordion-section-sidebar-widgets-featured_course':
        preview_section_id = "featured_course_section";
        break;

        case 'accordion-section-sidebar-widgets-team':
        preview_section_id = "team_section";
        break;

        case 'accordion-section-sidebar-widgets-event':
        preview_section_id = "event_section";
        break;

        case 'accordion-section-sidebar-widgets-testimonial':
        preview_section_id = "testimonial_section";
        break;

        case 'accordion-section-sidebar-widgets-gallery':
        preview_section_id = "gallery_section";
        break;
        
        case 'accordion-section-blog_section':
        preview_section_id = "blog_section";
        break;        
        
        case 'accordion-section-sort_front_settings':
        preview_section_id = "banner_section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}