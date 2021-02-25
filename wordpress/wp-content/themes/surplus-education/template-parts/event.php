<?php
/**
 * Event Section
 * 
 * @package Surplus_Education
 */

if( ! surplus_education_is_se_activated() ) return false;

$event_title    = get_theme_mod( 'event_section_title' );
$event_subtitle = get_theme_mod( 'event_section_subtitle' );
$view_all_label = get_theme_mod( 'event_view_all' );
$view_all_url   = get_theme_mod( 'event_view_all_url' );

if( is_active_sidebar( 'event' ) ){ ?>
	<section id="event_section" class="event-section">
		<div class="container">
			<?php if( $event_title || $event_subtitle ){ 
	        	echo '<div class="section-header">';
	            if( $event_subtitle ) echo '<span class="sub-title">' . esc_html( $event_subtitle ) . '</span>'; 
	            if( $event_title ) echo '<h2 class="section-title">' . esc_html( $event_title ) . '</h2>'; 
	        	echo '</div>';
	        } ?>

            <div class="flexbox-wrapper">
    			<?php dynamic_sidebar( 'event' ); ?>
    		</div> <!-- .flexbox-wrapper -->

			<?php if( $view_all_label && $view_all_url ){ ?>
                <div class="button-wrap">
        			<a href="<?php echo esc_url( $view_all_url ); ?>" class="bttn"><?php echo esc_html( $view_all_label ); ?></a>
        		</div>
            <?php } ?>
		</div>
	</section> <!-- .event-section -->
<?php }