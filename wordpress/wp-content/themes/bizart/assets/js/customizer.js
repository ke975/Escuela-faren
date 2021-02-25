jQuery(document).ready(function () {
    // Responsive switchers
    jQuery('.customize-control .responsive-switchers button').on('click', function (event) {
        // Set up variables
        var $this = jQuery(this),
        $devices = jQuery('.responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'),
        $body = jQuery('.wp-full-overlay'),
        $footer_devices = jQuery('.wp-full-overlay-footer .devices'); // Button class

        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active'); // Control class

        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Wrapper class

        $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device); // Panel footer buttons

        $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
        $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true); // Open switchers

        if ($this.hasClass('preview-desktop')) {
            $control.toggleClass('responsive-switchers-open');
        }
    }); // If panel footer buttons clicked

    jQuery('.wp-full-overlay-footer .devices button').on('click', function (event) {
        // Set up variables
        var $this = jQuery(this),
        $devices = jQuery('.customize-control.has-switchers .responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'); // Button class

        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active'); // Control class

        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Open switchers

        if (!$this.hasClass('preview-desktop')) {
            $control.addClass('responsive-switchers-open');
        } else {
            $control.removeClass('responsive-switchers-open');
        }
    });

    /**
     * Alpha Color Picker JS
     *
     * This file includes several helper functions and the core control JS.
     */

    /**
     * Override the stock color.js toString() method to add support for
     * outputting RGBa or Hex.
     */
    Color.prototype.toString = function( flag ) {

        // If our no-alpha flag has been passed in, output RGBa value with 100% opacity.
        // This is used to set the background color on the opacity slider during color changes.
        if ( 'no-alpha' == flag ) {
            return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
        }

        // If we have a proper opacity value, output RGBa.
        if ( 1 > this._alpha ) {
            return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
        }

        // Proceed with stock color.js hex output.
        var hex = parseInt( this._color, 10 ).toString( 16 );
        if ( this.error ) { return ''; }
        if ( hex.length < 6 ) {
            for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
                hex = '0' + hex;
            }
        }

        return '#' + hex;
    };

    /**
     * Given an RGBa, RGB, or hex color value, return the alpha channel value.
     */
    function acp_get_alpha_value_from_color( value ) {
        var alphaVal;

        // Remove all spaces from the passed in value to help our RGBa regex.
        value = value.replace( / /g, '' );

        if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
            alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed(2) * 100;
            alphaVal = parseInt( alphaVal );
        } else {
            alphaVal = 100;
        }

        return alphaVal;
    }

    /**
     * Force update the alpha value of the color picker object and maybe the alpha slider.
     */
     function acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, update_slider ) {
        var iris, colorPicker, color;

        iris = $control.data( 'a8cIris' );
        colorPicker = $control.data( 'wpWpColorPicker' );

        // Set the alpha value on the Iris object.
        iris._color._alpha = alpha;

        // Store the new color value.
        color = iris._color.toString();

        // Set the value of the input.
        $control.val( color );

        // Update the background color of the color picker.
        colorPicker.toggler.css({
            'background-color': color
        });

        // Maybe update the alpha slider itself.
        if ( update_slider ) {
            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
        }

        // Update the color value of the color picker object.
        $control.wpColorPicker( 'color', color );
    }

    /**
     * Update the slider handle position and label.
     */
    function acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider ) {
        $alphaSlider.slider( 'value', alpha );
        $alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
    }

    // Loop over each control and transform it into our color picker.
    jQuery( '.alpha-color-control' ).each( function() {

        // Scope the vars.
        var $control, startingColor, showOpacity, defaultColor, colorPickerOptions,
            $container, $alphaSlider, alphaVal, sliderOptions;

        // Store the control instance.
        $control = jQuery( this );

        // Get a clean starting value for the option.
        startingColor = $control.val().replace( /\s+/g, '' );

        // Get some data off the control.
        showOpacity  = $control.attr( 'data-show-opacity' );
        defaultColor = $control.attr( 'data-default-color' );

        // Set up the options that we'll pass to wpColorPicker().
        colorPickerOptions = {
            change: function( event, ui ) {
                var key, value, alpha, $transparency;

                key = $control.attr( 'data-customize-setting-link' );
                value = $control.wpColorPicker( 'color' );

                // Set the opacity value on the slider handle when the default color button is clicked.
                if ( defaultColor == value ) {
                    alpha = acp_get_alpha_value_from_color( value );
                    $alphaSlider.find( '.ui-slider-handle' ).text( alpha );
                }

                // Send ajax request to wp.customize to trigger the Save action.
                wp.customize( key, function( obj ) {
                    obj.set( value );
                });

                $transparency = $container.find( '.transparency' );

                // Always show the background color of the opacity slider at 100% opacity.
                $transparency.css( 'background-color', ui.color.toString( 'no-alpha' ) );
            },
            palettes: bizartColorPalette.colorPalettes // Use the passed in palette.
        };
        // Create the colorpicker.
        $control.wpColorPicker( colorPickerOptions );

        $container = $control.parents( '.wp-picker-container:first' );
        $control.parents( '.wp-picker-container' ).find( '.wp-color-result' ).css( 'background-color', '#' + startingColor );

        // Insert our opacity slider.
        jQuery( '<div class="alpha-color-picker-container">' +
                '<div class="min-click-zone click-zone"></div>' +
                '<div class="max-click-zone click-zone"></div>' +
                '<div class="alpha-slider"></div>' +
                '<div class="transparency"></div>' +
            '</div>' ).appendTo( $container.find( '.wp-picker-holder' ) );

        $alphaSlider = $container.find( '.alpha-slider' );

        // If starting value is in format RGBa, grab the alpha channel.
        alphaVal = acp_get_alpha_value_from_color( startingColor );

        // Set up jQuery UI slider() options.
        sliderOptions = {
            create: function( event, ui ) {
                var value = jQuery( this ).slider( 'value' );

                // Set up initial values.
                jQuery( this ).find( '.ui-slider-handle' ).text( value );
                jQuery( this ).siblings( '.transparency ').css( 'background-color', startingColor );
            },
            value: alphaVal,
            range: 'max',
            step: 1,
            min: 0,
            max: 100,
            animate: 300
        };

        // Initialize jQuery UI slider with our options.
        $alphaSlider.slider( sliderOptions );

        // Maybe show the opacity on the handle.
        if ( 'true' == showOpacity ) {
            $alphaSlider.find( '.ui-slider-handle' ).addClass( 'show-opacity' );
        }

        // Bind event handlers for the click zones.
        $container.find( '.min-click-zone' ).on( 'click', function() {
            acp_update_alpha_value_on_color_control( 0, $control, $alphaSlider, true );
        });
        $container.find( '.max-click-zone' ).on( 'click', function() {
            acp_update_alpha_value_on_color_control( 100, $control, $alphaSlider, true );
        });

        // Bind event handler for clicking on a palette color.
        $container.find( '.iris-palette' ).on( 'click', function(e) {
            e.preventDefault();

            var color, alpha;

            color = jQuery( this ).css( 'background-color' );
            alpha = acp_get_alpha_value_from_color( color );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );

            // Sometimes Iris doesn't set a perfect background-color on the palette,
            // for example rgba(20, 80, 100, 0.3) becomes rgba(20, 80, 100, 0.298039).
            // To compensante for this we round the opacity value on RGBa colors here
            // and save it a second time to the color picker object.
            if ( alpha != 100 ) {
                color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
            }

            $control.wpColorPicker( 'color', color );
        });

        // Bind event handler for clicking on the 'Clear' button.
        $container.find( '.button.wp-picker-clear' ).on( 'click', function(e) {
            e.preventDefault();

            var key = $control.attr( 'data-customize-setting-link' );

            // The #fff color is delibrate here. This sets the color picker to white instead of the
            // defult black, which puts the color picker in a better place to visually represent empty.
            $control.wpColorPicker( 'color', '#ffffff' );

            // Set the actual option value to empty string.
            wp.customize( key, function( obj ) {
                obj.set( '' );
            });

            acp_update_alpha_value_on_alpha_slider( 100, $alphaSlider );
        });

        // Bind event handler for clicking on the 'Default' button.
        $container.find( '.button.wp-picker-default' ).on( 'click', function(e) {
            e.preventDefault();

            var alpha = acp_get_alpha_value_from_color( defaultColor );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
        });

        // Bind event handler for typing or pasting into the input.
        $control.on( 'input', function(e) {
            e.preventDefault();

            var value = jQuery( this ).val();
            var alpha = acp_get_alpha_value_from_color( value );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
        });

        // Update all the things when the slider is interacted with.
        $alphaSlider.slider().on( 'slide', function( event, ui ) {
            var alpha = parseFloat( ui.value ) / 100.0;
            acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, false );

            // Change value shown on slider handle.
            jQuery( this ).find( '.ui-slider-handle' ).text( ui.value );
        });

        // Fix Safari issue on input click
        jQuery( '.iris-picker, .alpha-color-control' ).on( 'click', function(e) {
            e.preventDefault();
        });

    });
});

(function($, api) {
    
    api.sectionConstructor["bizart-link"] = api.Section.extend({
        attachEvents: function() {},
        isContextuallyActive: function() {
            return !0
        }
    })

    api.controlConstructor['bizart-toggle'] = api.Control.extend({
        ready: function ready() {
            var control = this;
            this.container.on('change', 'input:checkbox', function() {
                value = this.checked ? true : false;
                control.setting.set(value);
            });
        }
    });

    api.controlConstructor['bizart-page-repeater'] = api.Control.extend({
        ready: function ready() {
            'use strict';

            var control = this;

            var getValue = function getValue() {
                var value = control.setting.get();

                if ('' == value) {
                    return [];
                }

                try {
                    value = JSON.parse(value);
                } catch (err) {
                    value = [];
                }

                return value;
            };

            var getIndex = function getIndex() {
                return control.container.find('select').length;
            };

            this.container.on('change', 'select', function() {
                var value = getValue();
                var index = jQuery(this).next().data('index');
                value.splice(index, 1, jQuery(this).val());
                control.setting.set(JSON.stringify(value));
            });
            this.container.on('click', '.page-repeater-add', function(e) {
                e.preventDefault();
                var index = getIndex(),
                    limit = jQuery(this).data('limit');

                if (index <= limit) {
                    var h = control.container.find('.page-repeater-template').html();
                    h = h.replace('{#index}', index);
                    control.container.find('.page-repeater-selectors').append(h);
                } else {
                    var pro_text = jQuery(this).data('pro-text');
                    var pro_link = jQuery(this).data('pro-link'); //Replace add button with pro text and pro link later
                }

                if (index >= limit) {
                    jQuery(this).hide();
                }
            });
            this.container.on('click', '.page-repeater-remove', function(e) {
                e.preventDefault();
                var index = jQuery(this).data('index'),
                    limit = jQuery(this).data('limit');
                jQuery(this).parent().remove();
                control.container.find('.page-repeater-selectors .page-repeater-remove').each(function(i) {
                    jQuery(this).data('index', i);
                });
                var value = getValue();
                value.splice(index, 1);
                control.setting.set(JSON.stringify(value));

                if (index < limit) {
                    jQuery('.page-repeater-add').show();
                }
            });
        }
    });

    api.controlConstructor['bizart-slider'] = api.Control.extend({
        ready: function ready() {
            'use strict';

            var control = this,
                desktop_slider = control.container.find('.slider.desktop-slider'),
                desktop_slider_input = desktop_slider.next('.slider-input').find('input.desktop-input'),
                tablet_slider = control.container.find('.slider.tablet-slider'),
                tablet_slider_input = tablet_slider.next('.slider-input').find('input.tablet-input'),
                mobile_slider = control.container.find('.slider.mobile-slider'),
                mobile_slider_input = mobile_slider.next('.slider-input').find('input.mobile-input'),
                slider_input,
                $this,
                val; // Desktop slider

            desktop_slider.slider({
                range: 'min',
                value: desktop_slider_input.val(),
                min: +desktop_slider_input.attr('min'),
                max: +desktop_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    desktop_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['desktop'].set(ui.value);
                }
            }); // Tablet slider

            tablet_slider.slider({
                range: 'min',
                value: tablet_slider_input.val(),
                min: +tablet_slider_input.attr('min'),
                max: +tablet_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    tablet_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['tablet'].set(ui.value);
                }
            }); // Mobile slider

            mobile_slider.slider({
                range: 'min',
                value: mobile_slider_input.val(),
                min: +mobile_slider_input.attr('min'),
                max: +mobile_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    mobile_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['mobile'].set(ui.value);
                }
            }); // Update the slider when the number value change

            jQuery('input.desktop-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.desktop-slider');
                slider_input.slider('value', val);
            });
            jQuery('input.tablet-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.tablet-slider');
                slider_input.slider('value', val);
            });
            jQuery('input.mobile-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.mobile-slider');
                slider_input.slider('value', val);
            }); // Save the values

            control.container.on('change keyup paste', '.desktop input', function() {
                control.settings['desktop'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.tablet input', function() {
                control.settings['tablet'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mobile input', function() {
                control.settings['mobile'].set(jQuery(this).val());
            });
        }
    });

})(jQuery, wp.customize);