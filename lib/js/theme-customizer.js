(function( $ ) {

    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );

    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'position': 'static'
                } );

                $( '.site-title a' ).css( {
                    'color': to
                } );
            }
        } );
    });

    wp.customize( 'wpt_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'wpt_hero_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .hero-entry p ').hide();
            } else {
                $(' .hero-entry p ').show();
                $(' .hero-entry p ').text( to );
            }
        } );
    });    

    wp.customize( 'wpt_main_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .home-hero h1 ').hide();
            } else {
                $(' .home-hero h1 ').show();
                $(' .home-hero h1 ').text( to );
            }
        } );
    }); 

        wp.customize( 'wpt_hero_button_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .home-hero .btn-sew ').hide();
            } else {
                $(' .home-hero .btn-sew ').show();
                $(' .home-hero .btn-sew ').text( to );
            }
        } );
    });   

        wp.customize( 'wpt_bottom_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .home-bottom .entry-title ').hide();
            } else {
                $(' .home-bottom .entry-title ').show();
                $(' .home-bottom .entry-title ').text( to );
            }
        } );
    });   

        wp.customize( 'wpt_bottom_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .home-bottom .bottom-text ').hide();
            } else {
                $(' .home-bottom .bottom-text ').show();
                $(' .home-bottom .bottom-text ').text( to );
            }
        } );
    });   

            wp.customize( 'wpt_bottom_address', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .bottom-address ').hide();
            } else {
                $(' .bottom-address ').show();
                $(' .bottom-address ').text( to );
            }
        } );
    });   

     wp.customize( 'wpt_bottom_address_2', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .bottom-address-2 ').hide();
            } else {
                $(' .bottom-address-2 ').show();
                $(' .bottom-address-2 ').text( to );
            }
        } );
    });   

            wp.customize( 'wpt_phone', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .phone ').hide();
            } else {
                $(' .phone ').show();
                $(' .phone ').text( to );
            }
        } );
    });   


        wp.customize( 'wpt_fax', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .fax ').hide();
            } else {
                $(' .fax ').show();
                $(' .fax ').text( to );
            }
        } );
    });  


        wp.customize( 'wpt_patient_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .patient-headline ').hide();
            } else {
                $(' .patient-headline ').show();
                $(' .patient-headline ').text( to );
            }
        } );
    });  



        wp.customize( 'wpt_patient_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .patient-text ').hide();
            } else {
                $(' .patient-text ').show();
                $(' .patient-text ').text( to );
            }
        } );
    });  


    wp.customize( 'wpt_patient_image', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #patient-image ').hide();
            } else {
                $(' #patient-image ').show();
                $(' #patient-image ').attr( 'src', to );
            }
        } );
    });    



})( jQuery );