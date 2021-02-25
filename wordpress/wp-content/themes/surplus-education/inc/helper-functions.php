<?php
/**
 * Helper Functions.
 *
 * @package Surplus_Education
 */


/**
 * Core Hooks Code Starts
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function surplus_education_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    $classes[] = surplus_education_sidebar( true );

    return $classes;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function surplus_education_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function surplus_education_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'surplus-education' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'About Section', 'surplus-education' ),
        'id'            => 'about',
        'description'   => esc_html__( 'Add "SE: Featured Page Widget" for about section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Featured Course Section', 'surplus-education' ),
        'id'            => 'featured_course',
        'description'   => esc_html__( 'Add "Text" & "SE: Icon Text" widget for featured course section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Team Section', 'surplus-education' ),
        'id'            => 'team',
        'description'   => esc_html__( 'Add "Text" & "SE: Team Member" widget for team section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Event Section', 'surplus-education' ),
        'id'            => 'event',
        'description'   => esc_html__( 'Add "SE: Event" widget for event section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Testimonial Section', 'surplus-education' ),
        'id'            => 'testimonial',
        'description'   => esc_html__( 'Add "SE: Testimonial" widget for testimonial section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Gallery Section', 'surplus-education' ),
        'id'            => 'gallery',
        'description'   => esc_html__( 'Add "Gallery" widget for gallery section.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'        => esc_html__( 'Footer One', 'surplus-education' ),
        'id'          => 'footer-one', 
        'description' => esc_html__( 'Add footer one widgets here.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'        => esc_html__( 'Footer Two', 'surplus-education' ),
        'id'          => 'footer-two', 
        'description' => esc_html__( 'Add footer two widgets here.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'        => esc_html__( 'Footer Three', 'surplus-education' ),
        'id'          => 'footer-three', 
        'description' => esc_html__( 'Add footer three widgets here.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'        => esc_html__( 'Footer Four', 'surplus-education' ),
        'id'          => 'footer-four', 
        'description' => esc_html__( 'Add footer four widgets here.', 'surplus-education' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title" itemprop="name">',
        'after_title'   => '</h2>',
    ) );
    
}

/**
 * Core Hooks Code Ends
 */

/**
 * Helper Hooks Code Ends
 */

if( ! function_exists( 'surplus_education_doctype' ) ) :
/**
 * Doctype Declaration
*/
function surplus_education_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;

if( ! function_exists( 'surplus_education_head' ) ) :
/**
 * Before wp_head 
*/
function surplus_education_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;

if( ! function_exists( 'surplus_education_page_start' ) ) :
/**
 * Page Start
*/
function surplus_education_page_start(){ ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'surplus-education' ); ?></a>
    <?php
}
endif;

if( ! function_exists( 'surplus_education_notice_bar' ) ) :
/**
 * Notice Bar Start
*/
function surplus_education_notice_bar(){ 
    $enable_notice_bar    = get_theme_mod( 'enable_notice_bar', false );
    $no_of_notices        = get_theme_mod( 'no_of_notices', 3 );
    $notice_bar_title     = get_theme_mod( 'notice_bar_title' );
    $enable_header_search = get_theme_mod( 'enable_header_search', false );

    if( $enable_notice_bar || $enable_header_search ) { 
        $args = array(
            'post_type'           => 'post',
            'posts_per_page'      => $no_of_notices,
            'ignore_sticky_posts' => true
        );

        $qry = new WP_Query( $args ); ?>
        
        <div class="search-notice-wrap">
            <div class="container">

                <?php  if( $enable_notice_bar && $qry->have_posts() ) { ?>
                    <div class="sticky-notice-bar">
                        <div class="container">
                            <?php if( $notice_bar_title ) : ?> 
                                <div class="notice-bar-title">
                                    <span class="notice-icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </span>
                                    <span class="notice-title"><?php echo esc_html( $notice_bar_title ); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="notice-list-wrap hide-element">
                                <ul id="notice_lists" class="notice-list owl-carousel">
                                    <?php while( $qry->have_posts() ){
                                        $qry->the_post(); ?>
                                        <li class="notice-list-item">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div><!-- .container -->
                    </div> <!-- .sticky-notice-bar -->
                <?php 
                    wp_reset_postdata(); 
                } 

                if( $enable_header_search ){ ?>
                    <div class="header-search">
                        <button class="header-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="search-container search-modal cover-modal" data-modal-target-string=".search-modal">
                            <div class="header-search-inner-wrap">
                                <?php echo get_search_form(); ?>
                                <button aria-label="search form close" class="close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    }
}
endif;

if( ! function_exists( 'surplus_education_header' ) ) :
/**
 * Header Start
*/
function surplus_education_header(){ ?>

    <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
        <div class="container">
            <?php
            $phone  = get_theme_mod( 'phone' );
            $email  = get_theme_mod( 'email' );
            $enable_social = get_theme_mod( 'enable_social_links',  false );
            
            if( $phone || $email || $enable_social ) : ?>
                <div class="top-header">
                    <?php surplus_education_header_info(); ?>
                    <?php surplus_education_header_social(); ?>
                </div><!-- .top-header -->
            <?php endif; ?>
            <div class="main-header">
                <?php surplus_education_site_branding(); ?>
                <button class="toggle-btn" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                </button>
                <div class="nav-wrap">
                    <?php surplus_education_primary_nagivation(); ?>
                    <?php surplus_education_login_register(); ?>
                </div><!-- .nav-wrap -->
            </div><!-- .main-header -->
        </div><!-- .container -->
    </header>
    <?php
    }
endif;

if( ! function_exists( 'surplus_education_content_start' ) ) :
/**
 * Content Start
*/
function surplus_education_content_start(){ 
    if( ! ( is_front_page() && ! is_home() ) ){
        echo '<div id="content" class="site-content">';
        surplus_education_below_header_image();
        echo '<div class="container">';
    }
}
endif;

if( ! function_exists( 'surplus_education_content_end' ) ) :
/**
 * Content End
*/
function surplus_education_content_end(){ 
    if( ! ( is_front_page() && ! is_home() ) ){
        echo '</div></div>';
    }
}
endif;

if( ! function_exists( 'surplus_education_footer_start' ) ) :
/**
 * Footer Start
*/
function surplus_education_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;

if( ! function_exists( 'surplus_education_footer_top' ) ) :
/**
 * Footer Top
*/
function surplus_education_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }
                 
    if( $active_sidebars ){ ?>
        <div class="top-footer">
            <div class="container">
                <div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                <?php foreach( $active_sidebars as $active ){ ?>
                    <div class="col">
                       <?php dynamic_sidebar( $active ); ?> 
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php 
    }
}
endif;

if( ! function_exists( 'surplus_education_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function surplus_education_footer_bottom(){ 
    
    $footer_copyright = get_theme_mod( 'footer_copyright', __( '&copy; All Rights Reserved.', 'surplus-education' ) );
    $scroll_to_top    = get_theme_mod( 'scroll_to_top', false );
    
    ?>
    <div class="bottom-footer">
        <div class="container">           
            <?php 
                if( ! empty( $footer_copyright ) ) echo '<span class="copyright">'. wp_kses_post( $footer_copyright ) .'</span>'; 


                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( '%1$s by %2$s.', 'surplus-education' ), ' Surplus Education', '<a href="' . esc_url( 'https://surplusthemes.com/' ) .'">Surplus Themes</a>' );

                echo '<span class="sep"> | </span>';

                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Powered by %s', 'surplus-education' ), '<a href="'. esc_url( 'https://wordpress.org' ) .'">'. esc_html__( 'WordPress', 'surplus-education' ) .'</a>' );
            
                                   
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            
                if( ! $scroll_to_top ) :          
                    echo '<button class="back-to-top"><i class="fas fa-chevron-up"></i></button>';
                endif; ?>
        </div>
    </div>
    <?php
}
endif;

if( ! function_exists( 'surplus_education_footer_end' ) ) :
/**
 * Footer End 
*/
function surplus_education_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;

if( ! function_exists( 'surplus_education_page_end' ) ) :
/**
 * Page End
*/
function surplus_education_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;

if( ! function_exists( 'surplus_education_navigation' ) ) :
/**
 * Navigation
*/
function surplus_education_navigation(){
    if( is_single() ){
        $next_post = get_next_post();
        $prev_post = get_previous_post();

        if( $prev_post || $next_post ){?>            
            <nav class="navigation post-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'surplus-education' ); ?></h2>
                <div class="nav-links">
                    <?php if( $prev_post ){ ?>
                    <div class="nav-previous">
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="nav-text"><?php esc_html_e( 'Previous Post', 'surplus-education' ); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if( $next_post ){ ?>
                    <div class="nav-next">
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                            <i class="fas fa-chevron-right"></i>
                            <span class="nav-text"><?php esc_html_e( 'Next Post', 'surplus-education' ); ?>
                                
                            </span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </nav>        
            <?php
        }
    }
}
endif;

if( ! function_exists( 'surplus_education_comment' ) ) :
/**
 * Comments Template 
*/
function surplus_education_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
}
endif;

/**
 * Helper Hooks Code Ends
 */

/**
 * Helper Functions Code Starts
 */

/**
 * Query WooCommerce activation
 */
function surplus_education_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Is Surplus Esentials active or not
*/
function surplus_education_is_se_activated(){
    return class_exists( 'Surplus_Essentials' ) ? true : false;
}

if( ! function_exists( 'surplus_education_header_info' ) ) :
/**
 * Header Info
*/
function surplus_education_header_info(){ 
    
    $phone  = get_theme_mod( 'phone' );
    $email  = get_theme_mod( 'email' );
    
    if( $phone || $email ) : ?>
	    <div class="content-left">
			<?php if( $phone ) : ?>
				<div class="content-block">
					<i class="fas fa-phone"></i>
					<a href="<?php echo esc_url( 'callto:' . surplus_education_sanitize_phone_number( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
				</div>
			<?php endif;
			if( $email ) : ?>
				<div class="content-block">
					<i class="fas fa-envelope"></i>
					<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>
		<?php endif; ?>
		</div>
	<?php endif;
}
endif;

if ( ! function_exists( 'surplus_education_header_social' ) ) :

    /**
     * Render social links.
     *
     * @since 1.0.0
     */
    function surplus_education_header_social() {
        $enable_social = get_theme_mod( 'enable_social_links',  false );
        $social_links = array();
        $social_icon = array( '', 'facebook-f', 'twitter', 'instagram', 'youtube', 'pinterest' );

        if( $enable_social ){
            for( $i=1; $i<=5; $i++ ){
                $social_link = get_theme_mod( 'social_link_'. $i, '' );
                if( ! empty( $social_link ) ){
                    $social_links[$social_icon[$i]] =  $social_link;
                }
            }

            echo '<div class="content-right">';
            echo '<ul class="social-list">';
            foreach ( $social_links as $key => $link ) {
                echo '<li><a href="' . esc_url( $link ) . '" target="_blank"><i class="fab fa-' . esc_attr( $key ). ' "></i></a></li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }

endif;

if( ! function_exists( 'surplus_education_site_branding' ) ) :
/**
 * Site Branding
*/
function surplus_education_site_branding(){  
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    
    if( has_custom_logo() || $site_title || $site_description || $header_text ) :
        if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
            $branding_class = ' has-logo-text';
        }else{
            $branding_class = '';
        }?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">
            <?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();              
            } 
            if( $site_title || $site_description ) :
                if( $branding_class ) echo '<div class="site-title-wrap">';
                if( is_front_page() ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php }
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php
                }
                if( $branding_class ) echo '</div>';
            endif;

            ?>
        </div>    
    <?php
    endif;
}
endif;

if( ! function_exists( 'surplus_education_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function surplus_education_primary_nagivation(){ ?>
	<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
            <div class="mobile-menu" aria-label="Mobile">
        		<?php
        			wp_nav_menu( array(
        				'theme_location' => 'primary',
        				'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu main-menu-modal',
                        'fallback_cb'    => 'surplus_education_primary_menu_fallback',
        			) );
        		?>
            </div>
        </div>
	</nav><!-- #site-navigation -->
<?php
}
endif;

if( ! function_exists( 'surplus_education_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function surplus_education_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'surplus-education' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'surplus_education_login_register' ) ) :
/**
 * Login Register Block
*/
function surplus_education_login_register(){ 
    $login_text     = get_theme_mod( 'login_text' );
    $login_url      = get_theme_mod( 'login_url' );
    $register_text  = get_theme_mod( 'register_text' );
    $register_url   = get_theme_mod( 'register_url' );
    
    if( ( $login_text && $login_url ) || ( $register_text && $register_url ) ) { ?>
        <div class="login-register-block">
            <?php if( $login_text && $login_url ) { ?>
        		<a class="login-btn" href="<?php echo esc_url( $login_url ); ?>">
        			<i class="fas fa-user"></i>
        			<?php echo esc_html( $login_text ); ?>
        		</a>
            <?php } ?>
            <?php if( $register_text && $register_url ) { ?>
        		<a class="register-btn" href="<?php echo esc_url( $register_url ); ?>">
        			<i class="fas fa-lock"></i>
        			<?php echo esc_html( $register_text ); ?>
        		</a>
            <?php } ?>
    	</div>
    <?php 
    }
}
endif;

if( ! function_exists( 'surplus_education_get_home_sections' ) ) :
/**
 * Returns Home Sections 
*/
function surplus_education_get_home_sections(){
    
    $enabled_section = array();

    if( is_active_sidebar( 'about' ) ) array_push( $enabled_section, 'about' );
    if( is_active_sidebar( 'featured_course' ) ) array_push( $enabled_section, 'featured_course' );
    if( is_active_sidebar( 'team' ) ) array_push( $enabled_section, 'team' );
    if( is_active_sidebar( 'event' ) ) array_push( $enabled_section, 'event' );
    if( is_active_sidebar( 'testimonial' ) ) array_push( $enabled_section, 'testimonial' );
    if( is_active_sidebar( 'gallery' ) ) array_push( $enabled_section, 'gallery' );
    if( get_theme_mod( 'enable_blog_section', true ) ) array_push( $enabled_section, 'blog' );

    return apply_filters( 'surplus_education_home_sections', $enabled_section );
}
endif;
if( ! function_exists( 'surplus_education_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function surplus_education_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'surplus_education_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function surplus_education_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = surplus_education_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'surplus_education_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function surplus_education_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => $post_type,
        'post_status'      => 'publish',
        'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'surplus-education' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'surplus_education_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function surplus_education_get_categories( $select = true, $taxonomy = 'category', $slug = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'surplus-education' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

if( ! function_exists( 'surplus_education_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function surplus_education_get_id_from_page( $slider_pages ){
    if( $slider_pages ){
        $ids = array();
        foreach( $slider_pages as $p ){
             if( !empty( $p['page'] ) ){
                $page_ids = get_page_by_title( $p['page'] );
                $ids[] = $page_ids->ID;
             }
        }   
        return $ids;
    }else{
        return false;
    }
}
endif;

if( ! function_exists( 'surplus_education_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function surplus_education_sidebar( $class = false ){
    global $post;
    $return = false;
    $page_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
    $post_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    if( is_front_page() && ! is_home() ){
        $return = $class ? 'full-width' : false;
    }elseif( is_singular( array( 'page', 'post' ) ) ){         
        if( get_post_meta( $post->ID, 'sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, 'sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }elseif( is_single() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }
    }elseif( surplus_education_is_woocommerce_activated() && ( is_shop() || is_cart() || is_checkout() || is_product_category() || is_product_tag() || get_post_type() == 'product' ) ){
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'shop-sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = 'shop-sidebar';
            }         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }elseif( is_404() ){
        $return = $class ? 'full-width' : false;
    }else{
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = 'sidebar';    
            }                         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }    
    return $return; 
}
endif;



if( ! function_exists( 'surplus_education_below_header_image' ) ) :
/**
 * Content Below Header
*/
function surplus_education_below_header_image(){ 
    global $post;      
    $page_id = get_option( 'page_for_posts' );
    $background_image = esc_url( get_template_directory_uri() .'/assets/images/fallback-surplus-slider-banner.png' );

    if ( ( is_single() && 'post' == get_post_type () ) || is_page() ){
        $banner_option  = get_post_meta( $post->ID, 'banner_option', true );
        $banner_option  = ! empty( $banner_option ) ? $banner_option : 'header_image';
        
        if ( 'header_image' == $banner_option ) {
            if( get_header_image() ){
                $banner_image = get_header_image();
            }else{
                $banner_image = $background_image;
            } 
        } elseif ( 'featured_image' == $banner_option ) {
            if ( has_post_thumbnail( $post->ID ) ) {
                $banner_image = get_the_post_thumbnail_url( $post->ID, 'surplus-eudcation-slider', array( 'alt' => get_the_title( $post->ID ) ) );
            } else {
                $banner_image = $background_image;
            }
        }
    } elseif( is_front_page() && is_home() ) {
        $ed_banner           = get_theme_mod( 'enable_banner_section', 'static_banner' );
        if( $ed_banner == 'static_banner' ){
            surplus_education_home_banner();
        }elseif( $ed_banner == 'post' || $ed_banner == 'category' ){
            surplus_education_banner_slider();
        }
    } else {
        if( get_header_image() ){
            $banner_image = get_header_image();
        }else{
            $banner_image = $background_image;
        }
    }
    
    if( !( is_front_page() && is_home() ) ) : ?>
        <header class="page-header" style="background: url( '<?php echo esc_url( $banner_image ); ?>' )">
            <div class="container">
                <?php        
                    if ( is_home() && ! is_front_page() ){ 
                        echo '<h1 class="page-title">';
                        single_post_title();
                        echo '</h1>';
                    }
                    
                    if( is_archive() ) :
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                    endif;
                    
                    if( is_singular() ){
                        the_title( '<h1 class="page-title">', '</h1>' );
                    }
                    if( is_search() ){
                        echo '<h1 class="page-title">';
                        printf( esc_html__( 'Search Results for: %s', 'surplus-education' ), '<span>' . get_search_query() . '</span>' );
                        echo '</h1>';
                    }

                    if( is_404() ) {
                        echo '<h1 class="page-title">' . esc_html__( 'PAGE NOT FOUND','surplus-education' ) .'</h1>';
                    }
                ?>
            </div>
            <?php surplus_education_breadcrumb(); ?>
        </header><!-- .page-header -->
        <?php
    endif;
}
endif;

if ( ! function_exists( 'surplus_education_singular_post_thumbnail' ) ) :
/**
 * Layout Image Size
*/
function surplus_education_singular_post_thumbnail() {
    $return = '';   

    if( is_singular() ){
        $image_size = 'full';
        if( is_single() ){
            $return .= get_the_post_thumbnail_url( '', $image_size );
        }else{
            $return .= get_the_post_thumbnail_url( '', $image_size );
        }
    }

    return $return;
}
endif;

if( ! function_exists( 'surplus_education_breadcrumb' ) ) :
/**
 * Is Surplus Education Breadcrumb
*/
function surplus_education_breadcrumb() {
    $ed_breadcrumb = get_theme_mod( 'ed_breadcrumb', true );

    // Bail if Breadcrumb disabled.
    if ( false === $ed_breadcrumb ) {
        return;
    }
    
    // Bail if Home Page.
    if ( is_front_page() && ! is_home() ) {
        return;
    }

    echo '<div class="breadcrumb"><div class="container">';
    $args = array(
        'show_on_front'   => false,
        'show_title'      => true,
        'show_browse'     => false,
    );
    breadcrumb_trail( $args ); 
    echo '</div></div><!-- breadcrumb -->';
}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         */
        do_action( 'wp_body_open' );
    }
endif;

if ( ! function_exists( 'surplus_education_home_banner' ) ) :
    
    function surplus_education_home_banner() {
        $banner_title     = get_theme_mod( 'banner_title' );
        $banner_subtitle  = get_theme_mod( 'banner_subtitle' );
        $button1          = get_theme_mod( 'banner_cta1' );
        $button2          = get_theme_mod( 'banner_cta2' );
        $button1_url      = get_theme_mod( 'banner_cta1_url', '#' );
        $button2_url      = get_theme_mod( 'banner_cta2_url', '#' );
                
        if( has_custom_header() ){ ?>
            <div id="banner_section" class="theme-banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
                <div class="banner-item">
                    <?php 
                        the_custom_header_markup(); 
                        if( $banner_title || $banner_subtitle || ( $button1 && $button1_url ) || ( $button2 && $button2_url ) ){
                            echo '<div class="content-block static-banner center"><div class="container">';
                            if( $banner_title ) echo '<h2 class="title">' . esc_html( $banner_title ) . '</h2>';
                                if( $banner_subtitle ) echo '<div class="content-text">' . wp_kses_post( wpautop( $banner_subtitle ) ) . '</div>';
                                if( $button1 || $button2 ) : ?>
                                    <div class="button-wrap">
                                        <?php if( $button1 && $button1_url ) : ?>
                                            <a href="<?php echo esc_url( $button1_url ); ?>" class="link-button btn-link-one">
                                                <?php echo esc_html( $button1 ); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if( $button2 && $button2_url ) : ?>
                                            <a href="<?php echo esc_url( $button2_url ); ?>" class="link-button btn-link-two">
                                                <?php echo esc_html( $button2 ); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif;
                            echo '</div></div>';
                        }
                    ?>
                </div>
            </div>
        <?php
        }
    }
endif;

if ( ! function_exists( 'surplus_education_banner_slider' ) ) :
    
    function surplus_education_banner_slider() {
        $ed_banner           = get_theme_mod( 'enable_banner_section', 'static_banner' );
        $slider_cat          = get_theme_mod( 'slider_cat' );
        $posts_per_page      = get_theme_mod( 'no_of_slides', 3 );
        $ed_caption          = get_theme_mod( 'slider_caption', true );
        $button              = get_theme_mod( 'banner_cta', __( 'Read More', 'surplus-education' ) );

        $image_size = apply_filters( 'surplus_education_filter_banner_image', 'surplus-education-slider' );
        $args = array(
            'post_status'         => 'publish',            
            'ignore_sticky_posts' => true
        );
        
        if( $ed_banner === 'category' && $slider_cat ){
            $args['post_type']      = 'post';
            $args['cat']            = $slider_cat; 
            $args['posts_per_page'] = -1;  
        }else{
            $args['post_type']      = 'post';
            $args['posts_per_page'] = $posts_per_page;
        }

        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
            <div id="banner_section" class="theme-banner">
                <div id="banner-slider" class="owl-carousel">            
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <div class="banner-item">
                    <?php 
                        $banner_post_id = get_the_ID();
                        if ( has_post_thumbnail( ) ) {
                                $image_array = wp_get_attachment_image_src(  get_post_thumbnail_id( $banner_post_id ), $image_size );
                                $image_src = $image_array[0];
                        } else {
                            $image_src = esc_url( get_template_directory_uri() .'/assets/images/fallback-surplus-slider-banner.png' );
                        }
                    ?>
                        <div class="slider-bg" style="background-image:url('<?php echo esc_url( $image_src ); ?>');"></div>
                    <?php if( $ed_caption ){ ?>                        
                    <div class="content-block slider-banner center">
                        <div class="container">
                            <?php the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            if( has_excerpt() ) : ?>
                                <div class="content-text">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif;
                            if( $button ) : ?>
                                <div class="button-wrap">
                                    <a href="<?php the_permalink(); ?>" class="link-button btn-link">
                                        <?php echo esc_html( $button ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>                        
            </div>                
        </div>
        <?php
        wp_reset_postdata();
        }
    }
endif;

if( ! function_exists( 'surplus_education_banner_slider_image_instruction' ) ) :

    /**
     * Write message for featured image upload
     *
     */
     function surplus_education_banner_slider_image_instruction( $content, $post_id, $thumbnail_id ) {

        $allowed = array( 'page', 'page' );

        if ( in_array( get_post_type( $post_id ), $allowed ) ) {
          return $content .= '<p><b>' . esc_html__( 'Note', 'surplus-education' ) . ':</b>' . esc_html__( ' The recommended image size is 1920px by 1080px while using it for Banner / Slider.', 'surplus-education' ) . '</p>';
        }
        return $content;
    }
endif;

if ( ! function_exists( 'surplus_education_sidebar_layout' ) ) :
    /**
     * Sidebar Layout
     * @return array Sidebar Layout
     */
    function surplus_education_sidebar_layout() {
        $surplus_education_sidebar_layout = array(    
            'default-sidebar'=> array(
                'value'     => 'default-sidebar',
                'label'     => __( 'Default Sidebar', 'surplus-education' ),
                'thumbnail' => esc_url( get_template_directory_uri() . '/assets/images/default-sidebar.png' ),
            ),
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'label'     => __( 'Left Sidebar', 'surplus-education' ),
                'thumbnail' => esc_url( get_template_directory_uri() . '/assets/images/left-sidebar.png' ),         
            ),
            'no-sidebar'     => array(
                'value'     => 'no-sidebar',
                'label'     => __( 'Full Width', 'surplus-education' ),
                'thumbnail' => esc_url( get_template_directory_uri() . '/assets/images/no-sidebar.png' ),
            ),    
            'right-sidebar' => array(
                'value'     => 'right-sidebar',
                'label'     => __( 'Right Sidebar', 'surplus-education' ),
                'thumbnail' => esc_url( get_template_directory_uri() . '/assets/images/right-sidebar.png' ),         
            ),        
        );

        $output = apply_filters( 'surplus_education_sidebar_layout', $surplus_education_sidebar_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'surplus_education_banner_layout' ) ) :
    /**
     * Banner Layout
     * @return array Banner Layout
     */
    function surplus_education_banner_layout() {
        $surplus_education_banner_layout = array(
            'header_image' => __( 'Header Image', 'surplus-education' ),
            'featured_image' => __( 'Featured Image', 'surplus-education' ),
        );

        $output = apply_filters( 'surplus_education_banner_layout', $surplus_education_banner_layout );

        return $output;
    }
endif;

if( ! function_exists( 'surplus_education_register_required_plugins' ) ) :
    /**
     * Register the required plugins for this theme.
     *
     * In this example, we register five plugins:
     * - one included with the TGMPA library
     * - two from an external source, one from an arbitrary source, one from a GitHub repository
     * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
     *
     * The variables passed to the `tgmpa()` function should be:
     * - an array of plugin arrays;
     * - optionally a configuration array.
     * If you are not changing anything in the configuration array, you can remove the array and remove the
     * variable from the function call: `tgmpa( $plugins );`.
     * In that case, the TGMPA default settings will be used.
     *
     * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
     */
    function surplus_education_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */

        $plugins = array(
            // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'     => __( 'Surplus Essentials', 'surplus-education' ),
                'slug'     => 'surplus-essentials',
                'required' => false,
            ),
            array(
                'name'      => __( 'One Click Demo Import', 'surplus-education' ),
                'slug'      => 'one-click-demo-import',
                'required'  => false,
            ),
            array(
                'name'      => __( 'Regenerate Thumbnails', 'surplus-education' ),
                'slug'      => 'regenerate-thumbnails',
                'required'  => false,
            ),
            array(
                'name'      => __( 'WooCommerce', 'surplus-education' ),
                'slug'      => 'woocommerce',
                'required'  => false,
            ),
        );


        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'surplus-education',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
endif;
add_action( 'tgmpa_register', 'surplus_education_register_required_plugins' );
/**
 * Helper Functions Code Ends
 */