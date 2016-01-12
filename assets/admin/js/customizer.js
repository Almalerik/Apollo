/**
 * customizer.js
 * 
 * Theme Customizer enhancements for a better user experience. Contains handlers
 * to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

	// Head style with custom css color
	var $customCss = $('#apollo-custom-style');
	if (!$customCss.length) {
	    $customCss = $('head').append('<style type="text/css" id="apollo-custom-style" />').find('#apollo-custom-style');
	}

	// Site title and description.
	wp.customize('blogname', function(value) {
		value.bind(function(to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function(value) {
		value.bind(function(to) {
			$('.site-description').text(to);
		});
	});
	
	// Container wrapper
	wp.customize('container_class', function(value) {
		value.bind(function(to) {
			$('#page').removeClass('container-fluid container').removeAttr('style').addClass(to);
			// Fix primary long menu
			$('.apollo-navbar-wrapper').apolloFixLongPrimaryMenu();
		});
	});

	// customizer settings that use head custom css 
	var customizerSettings = [ 'page_bg_color', 'wrapped_element_max_width' ];
	var i;
	for (i = 0; i < customizerSettings.length; ++i) {
		wp.customize(customizerSettings[i], function(value) {
			value.bind(function(to) {
			    updateCustomCss(wp, $customCss);
			});
		});
	}

})(jQuery);

/**
 * This function update head custom style reading all settings from customize
 * 
 * @param wp
 * 	Customize instace
 * @param $customCss
 * 	jQuery instance of style tag to update
 */
function updateCustomCss(wp, $customCss) {
    var css = '';
    css += '#page {background-color: ' + wp.customize('page_bg_color').get() + ';}';

    var sanitazedValue = (isNaN(wp.customize('wrapped_element_max_width').get())) ? 1170 : parseInt(wp.customize('wrapped_element_max_width').get());
    css += '.container-fluid .apollo-wrapper {max-width: ' + sanitazedValue + 'px;}';
    
    $customCss.html(css);
}
