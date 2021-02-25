<?php
/**
 * Customizer Control: Link
 * @since Bizart 1.4
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

# Exit if it get loaded before WP_class Customize_Section class
if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return;
}

class Bizart_Customizer_Link_Control extends WP_Customize_Section {

	/**
	* The control type.
	*
	* @access public
	* @var string
	*/
	public $type = 'bizart-link';
	public $url  = '';
	public $id = '';

	/**
	 * JSON.
	 */
	public function json() {
		$json 		 = parent::json();
		$json['url'] = esc_url( $this->url );
		$json['id']  = $this->id;
		return $json;
	}

	/**
	 * Render template
	 *
	 * @access protected
	 */
	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<h3>
				<a href="{{{ data.url }}}" target="_blank">{{ data.title }}</a>
			</h3>
		</li>
		<?php
	}
}

function bizart_link_control_register( $wp_customize ){
	$wp_customize->register_control_type( 'Bizart_Customizer_Link_Control' );
}
add_action( 'customize_register', 'bizart_link_control_register' );