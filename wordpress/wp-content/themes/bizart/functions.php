<?php
/**
 * Bizart functions and definitions
 *
 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
 * @since Bizart 1.0
*/
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
/**
 * Module loader
 * @since Bizart 1.0
*/
if( !function_exists( 'bizart_module_loader' ) ){
	function bizart_module_loader( $modules ){
		$base = '/modules/';
		foreach( $modules as $module ){
			$file = $base . $module . '/' . $module . '-functions.php';
			require_once get_theme_file_path( $file );

			$module_files = apply_filters( "bizart_modules_{$module}", array() );
			if( count( $module_files ) > 0 ){
				foreach( $module_files as $file ){
					require_once  get_theme_file_path( $base . $module . '/' . $file );
				}
			}
		}
	}
}

$bizart_modules = array(
	'breadcrumb',
	'css',
	'customizer',
	'fields',
	'scripts',
	'tgm',
	'theme-setup'
);

bizart_module_loader( $bizart_modules );

/**
 * Google fonts array
 * @since Bizart 1.0
 */
if( !function_exists( 'bizart_get_fonts' ) ){
	function bizart_get_fonts(){
		$fonts = array(
			'lato'  => array(
				'family' => 'Lato',
				'weight' => '100,200,300,500'
			),
			'oswald' => array(
				'family' => 'Oswald',
				'weight' => ''
			),
			'monsterrat'  => array(
				'family' => 'Montserrat',
				'weight' => '100,200,300'
			),
			'roboto' => array(
				'family' => 'Roboto',
				'weight' => ''
			),
			'raleway'  => array(
				'family' => 'Raleway',
				'weight' => ''
			),
			'playfair' => array(
				'family' => 'Playfair Display',
				'weight' => ''
			),
			'fjalla-one' => array(
				'family' => 'Fjalla One',
				'weight' => ''
			),
			'alegreya' => array(
				'family' => 'Alegreya Sans',
				'weight' => ''
			),
			'pt-sans-narrow' => array(
				'family' => 'PT Sans Narrow',
				'weight' => ''
			),
			'open-sans' => array(
				'family' => 'Open Sans',
				'weight' => '100,200,300,400'
			),
			'poppins' => array(
				'family' => 'Poppins',
				'weight' => '400,500,600,700,800'
			),
			'hind' => array(
				'family' => 'Hind',
				'weight' => '400,500,600,700,800'
			),
			'quicksand' => array(
				'family' => 'Quicksand',
				'weight' => '400,500,600,700,800'
			)
		);
		return apply_filters( 'bizart_standard_fonts', $fonts );
	}
}

/**
 * Generate google font url
 * @since Bizart 1.0
 */
if( !function_exists( 'bizart_generate_font_url' ) ){
	function bizart_generate_font_url(){

		$fonts = bizart_get_fonts();
		$url = '//fonts.googleapis.com/css?family=';

		foreach( $fonts as $key => $font ){
			$url .= $font[ 'family' ];
			if( '' != $font[ 'weight' ] ){
				$url .= ':' . $font[ 'weight' ];
			}

			$url .= '|';
		}
		$url = rtrim( $url, '|' );

		$url .= '&display=swap';
		return $url;
	}
}

/**
 * Returns schema text
 * @since Bizart 1.0
 */
if( !function_exists( 'bizart_schema' ) ){
	function bizart_schema( $type ) {
		$schema = '';
		switch ($type) {
			case 'body' :	
				# Check conditions.
				$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

				# Set up default itemtype.
				$itemtype = 'WebPage';

				# Get itemtype for the blog.
				$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

				# Get itemtype for search results.
				$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
				$schema = "itemtype='https://schema.org/{$itemtype}' itemscope='itemscope' ";
			break;
			case 'header' :
				$schema = "itemtype='https://schema.org/WPHeader' itemscope='itemscope' role='banner' ";
			break;

			case 'footer' :
				$schema = "itemtype='https://schema.org/WPFooter' itemscope='itemscope' role='contentinfo'";
			break;

			case 'article':
				$schema = "itemtype='https://schema.org/CreativeWork' itemscope='itemscope'";
			break;

			default :
			break;
		}

		return apply_filters( "bizart_schema_{$type}", $schema );
	}
}

/**
 * Returns permalink of date archive page
 * @since Bizart 1.0
 */
if( !function_exists( 'bizart_get_day_link' ) ){
	function bizart_get_day_link(){
		return get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') );
	}
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 * @since Bizart 1.0
 */
function bizart_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'bizart_front_page_template' );

/**
 * Returns alternative text for thumbnail
 * @since Bizart 1.0
 */
if(! function_exists( 'bizart_get_the_post_thumbnail_text' ) ){
	function bizart_get_the_post_thumbnail_text(){
		$thumb_id = get_post_thumbnail_id( get_the_ID() );
		return get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
	}
}

/**
 * Returns permalink of blog page
 * @since Bizart 1.0
 */
if( ! function_exists( 'bizart_get_blog_page_url' ) ){
	function bizart_get_blog_page_url() {
		// If front page is set to display a static page, get the URL of the posts page.
		if ( 'page' === get_option( 'show_on_front' ) ) {
			return get_permalink( get_option( 'page_for_posts' ) );
		}
		// The front page IS the posts page. Get its URL.
		return get_home_url();
	}
}

/**
 * Order for frontpage content
 * @since Bizart 1.0
 */	
if( !function_exists( 'bizart_get_content_order' ) ){
	function bizart_get_content_order(){
		$order = array( 'slider', 'service', 'partner', 'team', 'testimonial', 'blog', 'cta', 'contact' );
		return apply_filters( 'bizart_content_order', $order );
	}
}

/**
* Separate pipe from title
* @since Bizart 1.0
*/
if( !function_exists( 'bizart_get_piped_title' ) ){
	function bizart_get_piped_title(){
		$heading = get_the_title();
		$heading = explode( '<span>', $heading );
		$data = array( '', '' );
		if( isset( $heading[0] ) ){
			$data[0] = $heading[0];
		}
		if( isset( $heading[1] ) ){
			$data[1] = str_replace( '</span>', '', $heading[1] );
		}

		return $data;
	}
}

/**
 * Returns alternative text for thumbnail
 * @since Bizart 1.0
 */
if(! function_exists( 'bizart_frontpage_title' ) ){
	function bizart_frontpage_title( $setting ){
		$page_id = bizart_get( "{$setting}-page" );
		
		if( $page_id ){
			$query = new WP_Query(array(
				'page_id' => absint( $page_id )
			));

			$sub_text = bizart_get( "{$setting}-sub-text" );
			if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();
					?>
					<div class="bizart-content-center">
						<p class="bizart-sub-title"><?php echo esc_html( $sub_text ); ?></p>
						<h2 class="bizart-section-title section-title-black">
							<?php the_title(); ?>
						</h2>
					</div>
					<?php
				}
			}
			wp_reset_postdata();
		}
	}
}

/**
 * Register sidebar
 * @since Bizart 1.0
 */
function bizart_sidebars(){
	# sidebar in post and pages
	register_sidebar( array(
        'name' 			=> esc_html__( 'Sidebar', 'bizart' ),
        'id' 			=> 'bizart_sidebar',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on side of the page.', 'bizart' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));

	register_sidebar( array(
        'name' 			=> esc_html__( 'Footer Widget 1', 'bizart' ),
        'id' 			=> 'bizart-footer-widget-1',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on footer of the page.', 'bizart' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));

	register_sidebar( array(
        'name' 			=> esc_html__( 'Footer Widget 2', 'bizart' ),
        'id' 			=> 'bizart-footer-widget-2',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on footer of the page.', 'bizart' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));

	register_sidebar( array(
        'name' 			=> esc_html__( 'Footer Widget 3', 'bizart' ),
        'id' 			=> 'bizart-footer-widget-3',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on footer of the page.', 'bizart' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));

	register_sidebar( array(
        'name' 			=> esc_html__( 'Footer Widget 4', 'bizart' ),
        'id' 			=> 'bizart-footer-widget-4',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on footer of the page.', 'bizart' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'bizart_sidebars' );

if( !function_exists( 'bizart_default_social_menu' ) ){
	/**
	 * Default social menu
	 * @since Bizart 1.0
	 */
	function bizart_default_social_menu( $arg ) {
		?>
		<ul class="bizart-demo-social-menu">
		    <li><a href="#" target="_blank"></a></li>
		    <li><a href="#" target="_blank"></a></li>
		    <li><a href="#" target="_blank"></a></li>
		    <li><a href="#" target="_blank"></a></li>
		</ul>
		<?php
	}
}

if( !function_exists('bizart_get_date_link' ) ){
	/**
	 * Get date permalink
	 * @since Bizart 1.0
	 */
	function bizart_get_date_link(){
		return get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') );
	}
}

if( !function_exists( 'bizart_the_date' ) ){
	/**
	 * Prints date in apropriate format
	 * @since Bizart 1.0
	 */
	function bizart_the_date( $status = 'posted' ) {

		$show_date = bizart_get( 'post-date' );
		if( !$show_date )
			return;
				
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		if( $status == 'updated'){
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
			}				
		}

		$time_tag = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date( get_option('date_format') ) ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">
				%2$s 
				<a href="%1$s" rel="bookmark">
					%3$s
				</a>
			</span>',
			esc_url( bizart_get_date_link() ),
			( 'posted' == $status ) ? esc_html__( 'Published On', 'bizart' ) : esc_html__( 'Updated on', 'bizart' ),
			$time_tag
		);
	}
}

if( !function_exists( 'bizart_posted_by' ) ){
	/**
	 * Print author of the post
	 * @since Bizart 1.0
	 */
	function bizart_posted_by(){

		$show_author = bizart_get( 'post-author' );
		if( !$show_author )
			return;

		printf(
			/* translators:1-author link, 2-author image link, 
			 * 3- author text, 4- author name.
			 */
			'<div class="author-info"><span class="author-text">
				%2$s
			</span>
			<a class="url fn n" href="%1$s">
				<span class="author">
					%3$s
				</span>
			</a></div>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html__( 'By ', 'bizart' ),
			esc_html( get_the_author() )
		);
	}
}

if( !function_exists('bizart_author_image' ) ){
	/**
	 * Print author image
	 * @since Bizart 1.0
	 */
	function bizart_author_image(){
		
		$show_author = bizart_get( 'post-author' );
		if( !$show_author )
			return;

		$author_id = get_the_author_meta( 'ID' );
		printf(
			'<div class="author-image">
				<a class="url fn n" href="%1$s">
						<img src="%2$s">
				</a>
			</div>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( get_avatar_url( $author_id, array( 'size'=> 40 ) ) )
		);
	}
}

if( !function_exists('bizart_category' ) ){
	/**
	 * Print category of the post
	 * @since Bizart 1.0
	 */
	function bizart_category(){
		$show_category = bizart_get( 'post-category' );
		if( !$show_category )
			return;

		if( !is_single() ){
			the_category();
			return;
		}
		?>
			<div class="bizart-category-wrapper">
				<span><?php esc_html_e( 'Cagegories', 'bizart' ); ?></span>
				<?php the_category(); ?>
			</div>
		<?php
	}
}

if(! function_exists( 'bizart_tag_list' ) ){
	/**
	 * Print tags of the post
	 * @since Bizart 1.0
	 */
	function bizart_tag_list(){
		$show_tags = bizart_get( 'post-category' );
		if( !$show_tags )
			return;

		$tags = get_the_tag_list('<ul class="bizart-tags"><li>','</li><li>','</li></ul>');
		if( !$tags )
			return;

		echo '<div class="bizart-tags-wrapper"><span>' . esc_html__( 'Tags', 'bizart' ) . '</span>';
		echo $tags; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';
	}
}

if( !function_exists( 'bizart_has_sidebar' ) ){
	/**
	 * Determines if the page needs sidebar
	 * @since Bizart 1.0
	 */
	function bizart_has_sidebar(){
		if( is_search() ){
			return false;
		}elseif( is_singular( 'post' ) || is_page() || is_home() ){

			if( is_home() && is_front_page() ){
				$pos = bizart_get( 'sidebar-position' );
				return $pos == 'show' ? true : false;
			}

			if( is_front_page() ){
				return false;
			}
			
			$id = bizart_get_page_id();
			$meta_id = 'bizart-sidebar-position';
			if( "hide" == get_post_meta( $id, $meta_id, true ) ){
				return false;
			}

			return true;
		}else{
			$pos = bizart_get( 'sidebar-position' );
			return $pos == 'show' ? true : false;
		}
	}
}

if( !function_exists( 'bizart_get_page_id' ) ){
	/**
	 * Get page id
	 * @since Bizart 1.0
	 */
	function bizart_get_page_id(){
		$id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();
		return $id;
	}
}

/**
* Add necessary class
*
* @since bizart 1.0
*/
add_filter( 'body_class', 'bizart_body_class' );
function bizart_body_class( $classes ){

	if( ( is_archive() || is_home() ) && bizart_get( 'hide-in-archive-page' ) ){
		$classes[] = 'no-inner-banner';
		return $classes;
	}

	$id = get_the_ID();
	$disable_banner = get_post_meta( $id, 'bizart-disable-inner-banner', true );
	if( $disable_banner ){
		$classes[] = 'no-inner-banner';
	}

	return $classes;
}

if( !function_exists( 'bizart_comments_popup_link' ) ){
	/**
	 * Get post comment number
	 * @since Bizart 1.2
	 */
	function bizart_comments_popup_link(){
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comment-wrapper">';
			comments_popup_link( 
				esc_html__( 'Leave a comment', 'bizart' ), 
				esc_html__( '1 comment', 'bizart' ),
				esc_html__( 'comments' , 'bizart' )
			);
			echo '</div>';
		}
	}
}