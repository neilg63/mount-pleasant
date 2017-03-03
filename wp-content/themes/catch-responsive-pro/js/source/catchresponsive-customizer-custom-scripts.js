/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 */

( function( api ) {
    api.controlConstructor.radio = api.Control.extend( {
        ready: function() {
            if ( 'catchresponsive_theme_options[color_scheme]' === this.id ) {
                this.setting.bind( 'change', function( color_scheme ) {
                    jQuery.each( catchresponsive_color_list, function( index, value ) {
                        if ( 'light' == color_scheme ) {
                            api( index ).set( value.light );
                            api.control( index ).container.find( '.color-picker-hex' )
                            .data( 'data-default-color', value.light )
                            .wpColorPicker( 'defaultColor', value.light );
                        }
                        else if ( 'dark' == color_scheme ) {
                            api( index ).set( value.dark );
                            api.control( index ).container.find( '.color-picker-hex' )
                            .data( 'data-default-color', value.dark )
                            .wpColorPicker( 'defaultColor', value.dark );
                        }
                    });

                    //Change value of Mobile Menu Color Scheme on change of color Scneme
                    jQuery('input[name="_customize-radio-catchresponsive_theme_options[mobile_menu_color_scheme]"][value="' + color_scheme + '"]').prop('checked', true);
                                    });
            }
        }
    });
} )( wp.customize );
