<?php
/**
 * Plugin Filters
 *
 * @package Surplus_Education
 */
if( ! function_exists( 'surplus_education_square_image_size' ) ) :
    function surplus_education_square_image_size(){
        return 'surplus-education-square';
    }
endif;
add_filter( 'stk_course_archive_size', 'surplus_education_square_image_size' );
add_filter( 'stk_similar_post_size', 'surplus_education_square_image_size' );
add_filter( 'ste_featured_img_size', 'surplus_education_square_image_size' );
add_filter( 'ste_icon_img_size', 'surplus_education_square_image_size' );

if( ! function_exists( 'surplus_education_event_image_size' ) ) :
    function surplus_education_event_image_size(){
        return 'surplus-education-event';
    }
endif;
add_filter( 'stk_event_results_size', 'surplus_education_event_image_size' );
add_filter( 'stk_course_results_size', 'surplus_education_event_image_size' );
add_filter( 'ste_widget_itw_img_size', 'surplus_education_event_image_size' );

if( ! function_exists( 'surplus_education_team_member_image_size' ) ) :
    function surplus_education_team_member_image_size(){
        return 'surplus-education-team';
    }
endif;
add_filter( 'ste_widget_team_member_img_size', 'surplus_education_team_member_image_size' );
add_filter( 'stk_instructor_results_size', 'surplus_education_team_member_image_size' );

if( ! function_exists( 'surplus_education_team_member_archive_image_size' ) ) :
    function surplus_education_team_member_archive_image_size(){
        return 'surplus-education-team-archive';
    }
endif;
add_filter( 'stk_instructor_archive_size', 'surplus_education_team_member_archive_image_size' );

if( ! function_exists( 'surplus_education_cta_background' ) ) :
    function surplus_education_cta_background(){
        return '#64d657';
    }
endif;
add_filter( 'ste_cta_bg_color', 'surplus_education_cta_background' );

if( ! function_exists('surplus_education_stk_widgets_init') ) :
    /**
     * Register Advanced Search Sidebar
    */
    function surplus_education_stk_widgets_init(){
        register_sidebar( array(
            'name'          => esc_html__( 'Advance Search Sidebar', 'surplus-education' ),
            'id'            => 'adv-search-sidebar',
            'description'   => esc_html__( 'Add "Text" widget to add shortcodes for advance search in frontpage section.', 'surplus-education' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );    
    }
endif;
add_action( 'widgets_init', 'surplus_education_stk_widgets_init' );


if( ! function_exists('surplus_education_add_stk_advance_search') ) :
    /**
     * Add Advance search sidebar contents
     */
    function surplus_education_add_stk_advance_search() { 
        if( is_active_sidebar( 'adv-search-sidebar' ) ) {?>
            <div id="adv_search_section" class="advance-search-section">
                <div class="container">
                    <?php dynamic_sidebar( 'adv-search-sidebar' ); ?>
                </div>
            </div><!-- .advance-search-section -->
        <?php
        }
    }
endif;
add_action( 'surplus_education_after_banner', 'surplus_education_add_stk_advance_search', 15 );