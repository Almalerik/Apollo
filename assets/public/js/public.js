jQuery.noConflict()(function ( $ ) {
    "use strict";

    $.fn.extend({
	/**
	 * This will fix log primary menu when terms aren't on same line
	 */
	apolloFixLongPrimaryMenu : function () {
	    var mastheadWidth = $(this).outerWidth();
	    var sitebrandingWidth = $('.site-logo-wrapper', $(this)).outerWidth(true) + $('.site-title-wrapper', $(this)).outerWidth(true);
	    var menuWidth = 0;
	    jQuery('#primary-menu > li', $(this)).each(function () {
		menuWidth += $(this).outerWidth(true);
	    });
	    menuWidth += parseInt(jQuery('#navbar').css('padding-left')) + parseInt(jQuery('#navbar').css('padding-right'));
	    if ((mastheadWidth - 35) < (sitebrandingWidth + menuWidth)) {
		$(this).addClass('apollo-fix-long-menu');
	    } else {
		$(this).removeClass('apollo-fix-long-menu');
	    }
	    return this;
	},
	/**
	 * This will sticky an element to the top
	 */
	apolloSticky : function ( action ) {
	    if ('destroy' === action) {
		$(this).trigger("sticky_kit:detach");
	    } else {
		var wpadminbarHeight = 0;
		if ($('#wpadminbar').length > 0 && $('#wpadminbar').css('position') == 'fixed') {
		    wpadminbarHeight = $('#wpadminbar').height();
		}
		$(this).stick_in_parent({
		    'sticky_class' : 'apollo-sticked',
		    'parent' : $('#page'),
		    'offset_top' : wpadminbarHeight
		});
	    }
	    return this;
	},
    });

    $(document).ready(function () {
	// Sticky Header
	$('.apollo-header-sticky-top').apolloSticky();
	
	// Scrolling class
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 50) {
			$("#page").addClass("apollo-scrolling");
		} else {
			$("#page").removeClass("apollo-scrolling");
		}
	});
	// This is necessary if user refresh page when not top
	if ($(window).scrollTop() >= 50) {
		$("#page").addClass("apollo-scrolling");
	}
    });
});
