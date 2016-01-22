/**
 * customizer.js
 * 
 * Theme Customizer enhancements for a better user experience. Contains handlers
 * to make Theme Customizer preview reload changes asynchronously.
 */

(function ( $ ) {

    // Head style with custom css color
    var $customCss = $('#apollo-custom-style');
    if (!$customCss.length) {
	$customCss = $('head').append('<style type="text/css" id="apollo-custom-style" />').find('#apollo-custom-style');
    }

    // Site title and description.
    wp.customize('blogname', function ( value ) {
	value.bind(function ( to ) {
	    $('.site-title a').text(to);
	});
    });
    wp.customize('blogdescription', function ( value ) {
	value.bind(function ( to ) {
	    $('.site-description').text(to);
	});
    });

    // Container wrapper
    wp.customize('container_class', function ( value ) {
	value.bind(function ( to ) {
	    $('#page').removeClass('container-fluid container').removeAttr('style').addClass(to);
	    // Fix primary long menu
	    $('.apollo-navbar-wrapper').apolloFixLongPrimaryMenu();
	});
    });

    // Header wrapper
    wp.customize('header_wrapped', function ( value ) {
	value.bind(function ( to ) {
	    $('.apollo-navbar-wrapper').toggleClass('apollo-wrapper');
	});
    });

    // Header position
    wp.customize('header_position', function ( value ) {
	value.bind(function ( to ) {
	    if ('' === to) {
		$('.apollo-header-sticky-top').apolloSticky('destroy');
		$('.site-header').removeClass('apollo-header-sticky-top');
	    } else {
		$('.site-header').addClass(to);
		$('.apollo-header-sticky-top').apolloSticky();
	    }
	});
    });

    // Header primary menu fix
    wp.customize('header_menu_fix', function ( value ) {
	value.bind(function ( to ) {
	    if (to) {
		console.log('true');
		$('body').addClass('apollo-menu-fix');
		$('.apollo-menu-fix .apollo-navbar-wrapper').apolloFixLongPrimaryMenu();
	    } else {
		console.log('f');
		$('body').removeClass('apollo-menu-fix');
	    }
	});
    });
    
    // customizer settings that use head custom css
    var customizerSettings = [ 'page_bg_color', 'wrapped_element_max_width', 'header_bg_color', 'header_bg_color_opacity', 'header_bg_color_opacity_onscroll', 'header_title_color', 'header_description_color', ];
    var i;
    for (i = 0; i < customizerSettings.length; ++i) {
	wp.customize(customizerSettings[i], function ( value ) {
	    value.bind(function ( to ) {
		updateCustomCss(wp, $customCss);
	    });
	});
    }

})(jQuery);

/**
 * This function update head custom style reading all settings from customize
 * 
 * @param wp
 *                Customize instace
 * @param $customCss
 *                jQuery instance of style tag to update
 */
function updateCustomCss ( wp, $customCss ) {
    var css = '';
    css += "#page {background-color: " + wp.customize('page_bg_color').get() + ";}\n";

    var sanitazedValue = (isNaN(wp.customize('wrapped_element_max_width').get())) ? 1170 : parseInt(wp.customize('wrapped_element_max_width').get());
    css += ".container-fluid .apollo-wrapper {max-width: " + sanitazedValue + "px;}\n";

    // Header background color
    var color = wp.customize('header_bg_color').get();
    var opacity = wp.customize('header_bg_color_opacity').get();
    var opacity_on_scroll = wp.customize('header_bg_color_opacity_onscroll').get();
    console.log("opacity: " + opacity);
    console.log("tgba: " + hexToRgba(color, opacity, true));
    css += ".navbar-default {background-color: " + hexToRgba(color, opacity, true) + ";}\n";
    css += ".apollo-scrolling .apollo-header-sticky-top .navbar-default {background-color: " + hexToRgba(color, opacity_on_scroll, true) + ";}\n";
    
    css += ".site-title a, .site-title a:hover, .site-title a:active, .site-title a:visited, .site-title a:focus {color: " + wp.customize('header_title_color').get() + ";}\n";
    css += ".site-description {color: " + wp.customize('header_description_color').get() + ";}\n";

    $customCss.html(css);
}

/**
 * This function convert an hex color value to rgba value
 * 
 * @param hex
 * @param opacity
 *                From 0 to 1; if null or empty, vlue 1 is used
 * @param css
 *                if true, return a rgba string else return an array with all
 *                values
 * @returns
 */
function hexToRgba ( hex, opacity, css ) {
    opacity = ( opacity  === '' || opacity  === null ) ? 1 : opacity;
    var parsing = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    var result = parsing ? {
	r : parseInt(parsing[1], 16),
	g : parseInt(parsing[2], 16),
	b : parseInt(parsing[3], 16),
	o : opacity
    } : {
	r : 0,
	g : 0,
	b : 0,
	o : 0
    };
    if (css) {
	var array_values = new Array();
	for ( var key in result) {
	    array_values.push(result[key]);
	}
	return 'rgba(' + array_values.join(", ") + ')';
    } else {
	return result;
    }
}
