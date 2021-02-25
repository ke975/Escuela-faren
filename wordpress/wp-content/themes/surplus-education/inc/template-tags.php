<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Surplus_Education
 */

if ( ! function_exists( 'surplus_education_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function surplus_education_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="dateModified">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" itemprop="datePublished">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="fas fa-calendar-alt"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'surplus_education_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function surplus_education_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'surplus-education' ),
			'<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person"><i class="fas fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'surplus_education_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function surplus_education_entry_footer() { 

		if( is_singular() ) surplus_education_tag();

		$read_more_text = get_theme_mod( 'read_more_text', __( 'Read More', 'surplus-education' ) );

		if( !is_singular() && $read_more_text ) : ?>
			<div class="button-wrap">
				<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_html( $read_more_text ); ?></a>
			</div>
			<?php
		endif;
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'surplus-education' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'surplus_education_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function surplus_education_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		global $post;
		$banner_option = get_post_meta( $post->ID, 'banner_option', true );
		$banner_option = ! empty( $banner_option ) ? $banner_option : 'header_image';
		$sidebar = surplus_education_sidebar();
		$show_crop_image = get_theme_mod( 'show_crop_image', true );

		if ( is_singular() ) :
			if ( has_post_thumbnail() && 'featured_image' != $banner_option ) : ?>
			<figure class="post-thumbnail">
				<?php surplus_education_category(); ?>
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->
			<?php endif;
		else : ?>

		<figure class="post-thumbnail">
			<?php surplus_education_category(); ?>
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1" itemprop="thumbnailUrl">
				<?php
				if( $show_crop_image ) {
					$image_size = ( $sidebar ) ? 'surplus-education-with-sidebar' : 'surplus-education-with-no-sidebar';
					$image_size = apply_filters( 'surplus_education_filter_blog_image', $image_size );
				}else{
					$image_size = 'full';
					$image_size = apply_filters( 'surplus_education_filter_blog_uncrop_image', $image_size );
				}
				the_post_thumbnail( $image_size, 
					array(
						'alt' => the_title_attribute( 
							array(
								'echo' => false,
							)
						),
						'itemprop' => 'image' 
					) 
				);
				?>
			</a>
		</figure>

		<?php
		endif; // End is_singular().
	}
endif;

if( ! function_exists( 'surplus_education_comment_count' ) ) :
/**
 * Comment Count
*/
function surplus_education_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link post-comment"><i class="fas fa-comments"></i>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'surplus-education' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}
}
endif;

if( ! function_exists( 'surplus_education_entry_content' ) ) :
/**
 * Entry Content
*/
function surplus_education_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'surplus-education' ),
    				'after'  => '</div>',
    			) );
            }else{
                the_excerpt();
            } 
		?>
	</div><!-- .entry-content -->
    <?php
}
endif;

if ( ! function_exists( 'surplus_education_category' ) ) :
/**
 * Prints categories
 */
function surplus_education_category(){

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'surplus_education_tag' ) ) :
/**
 * Prints tags
 */
function surplus_education_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		echo get_the_tag_list( 
			/* translators: %1$s: Title */
			sprintf( '<div class="cat-tags" itemprop="about"><span class="tag-title">%1$s</span>', esc_html__( 'TAGS: ','surplus-education' ) ),
			', ',
			'</div>'
		);
	}
}
endif;
