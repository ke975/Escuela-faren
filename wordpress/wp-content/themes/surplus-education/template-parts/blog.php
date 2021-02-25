<?php
/**
 * Blog Section
 * 
 * @package Surplus_Education
 */

$blog_section_title = get_theme_mod( 'blog_section_title' );
$blog_subtitle      = get_theme_mod( 'blog_section_subtitle' );
$blog               = get_option( 'page_for_posts' );
$label              = get_theme_mod( 'blog_view_all' );

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 2,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if( $blog_section_title || $blog_subtitle || $qry->have_posts() ){ ?>

<section id="blog_section" class="blog-section">
	<div class="container">
        
        <?php if( $blog_section_title || $blog_subtitle ){ 
        	echo '<div class="section-header">';
            if( $blog_subtitle ) echo '<span class="sub-title">' . esc_html( $blog_subtitle ) . '</span>'; 
            if( $blog_section_title ) echo '<h2 class="section-title">' . esc_html( $blog_section_title ) . '</h2>'; 
        	echo '</div>';
        } ?>
        
        <?php if( $qry->have_posts() ){ ?>
            <div class="flexbox-wrapper">
    			<?php 
                while( $qry->have_posts() ){
                    $qry->the_post(); ?>
                    <article class="post">
        				<figure class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'surplus-education-blog', array( 'itemprop' => 'image' ) );
                                }else{
                                    surplus_education_get_fallback_svg( 'surplus-education-blog' );
                                }                            
                            ?>                        
                            </a>
                        </figure>
        				<div class="content-wrap">
        					<header class="entry-header">
        						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <?php 
                                        surplus_education_posted_by();
                                        surplus_education_posted_on(); 
                                    ?>
                                </div>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>                          
                            <footer class="entry-footer">
                                <?php surplus_education_comment_count(); ?>
                            </footer>
                        </div>
        			</article>			
        			<?php 
                }
                wp_reset_postdata();
                ?>
    		</div> <!-- .flexbox-wrapper -->
    		
            <?php if( $blog && $label ){ ?>
                <div class="button-wrap">
        			<a href="<?php the_permalink( $blog ); ?>" class="bttn"><?php echo esc_html( $label ); ?></a>
        		</div>
            <?php } ?>
        
        <?php } ?>
	</div>
</section> <!-- .blog-section -->
<?php 
}