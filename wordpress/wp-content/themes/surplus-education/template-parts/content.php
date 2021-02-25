<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Surplus_Education
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	<?php if ( !is_singular() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<?php surplus_education_post_thumbnail(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			surplus_education_posted_on();
			surplus_education_posted_by();
			surplus_education_comment_count();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php surplus_education_entry_content(); ?>

	<footer class="entry-footer">
		<?php surplus_education_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
