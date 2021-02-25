<?php
/** 
 * Customizer Control: bizart-color
 *
 * @since Bizart 1.2
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Bizart_Color_Control extends WP_Customize_Control {

		public $type = 'bizart-color-picker';

		/**
		 * Add support for palettes to be passed in.
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 * @since Bizart 1.2
		 */
		public $palette;

		/**
		 * Add support for showing the opacity value on the slider handle.
		 * @since Bizart 1.2
		 */
		public $show_opacity;

		/**
		 * Enqueue control related scripts/styles.
		 * @since Bizart 1.2
		 */
		public function enqueue() {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 * @since Bizart 1.2
		 */
		public function to_json() {
			parent::to_json();

			$this->json['default'] = $this->setting->default;
			$this->json['show_opacity'] = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
			$this->json['value']       = $this->value();
			$this->json['link']        = $this->get_link();
			$this->json['id']          = $this->id;

		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @since Bizart 1.2
		 */
		protected function content_template() { ?>
			<label>
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				<div>
					<input class="alpha-color-control" type="text"  value="{{ data.value }}" data-show-opacity="{{ data.show_opacity }}" data-default-color="{{ data.default }}" {{{ data.link }}} />
				</div>
			</label>
			<?php
		}
	}
}

function bizart_color_control_register( $wp_customize ){
	$wp_customize->register_control_type( 'Bizart_Color_Control' );
}
add_action( 'customize_register', 'bizart_color_control_register' );
