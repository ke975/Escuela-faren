<?php
/**
 * Custom Control
 * 
 * @package Surplus_Education
*/

if( ! function_exists( 'surplus_education_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function surplus_education_register_custom_controls( $wp_customize ){        

    if( ! class_exists( 'Surplus_Education_Note_Control' ) ){

        class Surplus_Education_Note_Control extends WP_Customize_Control {
            
            public function render_content(){ ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                </span>
        
                <?php if( $this->description ){ ?>
                    <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                    </span>
                <?php }
            }
        }
    }

    if( ! class_exists( 'Surplus_Education_Radio_Image_Control' ) ){

        /**
         * Create a Radio-Image control
         * 
         * 
         * @link https://github.com/reduxframework/kirki/
         * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
         */
        class Surplus_Education_Radio_Image_Control extends WP_Customize_Control {
            
            /**
             * Declare the control type.
             *
             * @access public
             * @var string
             */
            public $type = 'radio-image';
            
            /**
             * Render the control to be displayed in the Customizer.
             */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }           
                
                $name = '_customize-radio-' . $this->id;
                ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </span>
                <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                                <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                                <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                                </input>
                            </label>
                    <?php endforeach; ?>
                </div>
                <?php
            }
        }
    }

}
endif;
add_action( 'customize_register', 'surplus_education_register_custom_controls' );

