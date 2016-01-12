jQuery.noConflict()(function ( $ ) {
    "use strict";
    
    $.fn.extend({
	apolloFixLongPrimaryMenu : function() {
		var mastheadWidth = $(this).outerWidth();
		var sitebrandingWidth = $('.site-logo-wrapper', $(this)).outerWidth(true) + $('.site-title-wrapper', $(this)).outerWidth(true);
		var menuWidth = 0;
		jQuery('#primary-menu > li', $(this)).each(function() {
			menuWidth += $(this).outerWidth(true);
		});
		menuWidth += parseInt(jQuery('#navbar').css('padding-left')) + parseInt(jQuery('#navbar').css('padding-right'));
		if ((mastheadWidth - 35) < (sitebrandingWidth + menuWidth)) {
			$(this).addClass('octopus-fix-long-menu');
		} else {
			$(this).removeClass('octopus-fix-long-menu');
		}
	},
    });

    $(document).ready(function () {

    });
});
