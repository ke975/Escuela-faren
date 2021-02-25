<?php
/**
 * The default template for displaying content
 * Used for both index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since Bizart 1.0
 */

$cls = bizart_has_sidebar() ? 'col-md-6 col-lg-6' : 'col-md-4 col-lg-4';
$show_date = bizart_get( 'post-date' );
$show_author = bizart_get( 'post-author' );
$show_category = bizart_get( 'post-category' );
?>
<div class="<?php echo esc_attr( $cls ); ?>">
	<div class="bizart-post">
		<article <?php post_class(); ?> <?php echo bizart_schema( 'article' ); ?> id="post-<?php the_ID(); ?>">
			<figure class="featured-media">
				<?php
					$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_theme_file_uri( 'assets/img/default-image.jpg' );
				?>
				<div class="featured-media-image" style="background-image: url( '<?php echo esc_url( $thumbnail ); ?>')">
					
				</div>
				<?php bizart_author_image(); ?>
			</figure>

			<?php if( $show_date ): ?>
				<?php 
					$date = get_the_date( 'M j Y' ); 
					$date = explode( ' ', $date );
				?>
				<div class="bizart-date">
					<a href="<?php echo esc_url( bizart_get_date_link() ); ?>">
					    <span class="day"><?php echo esc_html( $date[0] ); ?></span>
					    <span class="month"><?php echo esc_html( $date[1] ); ?></span>
					    <span class="year"><?php echo esc_html( $date[2] ); ?></span>
				    </a>
				</div>
			<?php endif; ?>
			
			<div class="post-content-inner">
				<header class="entry-header">
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</header>
				
				<?php if( $show_author || $show_category ): ?>
					<div class="entry-meta bizart-entry-meta">
						<?php bizart_posted_by(); ?>
						<?php bizart_category(); ?>
					</div>
				<?php endif; ?>
				<div class="post-content-wrap">		
					<?php the_excerpt(); ?>
				</div>

				<?php bizart_comments_popup_link(); ?>
			</div>
		</article>
	</div>
</div>