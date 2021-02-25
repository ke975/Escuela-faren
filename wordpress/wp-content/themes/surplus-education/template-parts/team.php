<?php 
/**
 * Team Section
 * 
 * @package Surplus_Education
 */

$team_view_all     = get_theme_mod( 'team_view_all' );
$team_view_all_url = get_theme_mod( 'team_view_all_url' );

if( is_active_sidebar( 'team' ) ){ ?>
	<section id="team_section" class="team-section">
		<div class="container">
			<div class="widget-wrapper">
				<?php dynamic_sidebar( 'team' ); ?>
			</div>
			<?php if( $team_view_all && $team_view_all_url ) : ?>
				<div class="button-wrap">
					<a href="<?php echo esc_url( $team_view_all_url ); ?>" class="bttn"><?php echo esc_html( $team_view_all ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section> <!-- .team-section -->
	<?php 
}