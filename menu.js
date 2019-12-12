(function ($) {

// For Mobile Menu Expansion
$(document).ready(function() {
	// Only Expand if at Mobile Width
    $('.mobile-only').click(function() {
		if ( $('.mobile-only').css('display') == 'block' ) {
        	if ($('.header-menu ul.menu').hasClass('expanded')) {
           		closeMenu();
				closeSubMenu();
        	} else {
           		openMenu();
       		}
		}
    });
	// Reset Mobile Menu if Browser Dragged to Desktop Width
	var cachedWidth = $(window).width();
	$(window).resize( function() {
		var newWidth = $(window).width();
		if ( newWidth !== cachedWidth ) {
			resetNav();
			cachedWidth = newWidth;
		}
	});
	// Add Sub-Menu Toggle
	$('.header-menu ul.menu li').has('ul').find('> a').after('<span class="sub-menu-toggle">&#9660;</span>');
	// .find('> a').after('<span class="sub-menu-toggle">&#9660;</span>');
	// Sub-Menu Expansion & Close
	$('.sub-menu-toggle').click(function() {
		if ( $('.mobile-only').css('display') == 'block' ) {
			if ( $(this).parent('li').find('.sub-menu').hasClass('expanded') ) {
				$(this).parent('li').find('.sub-menu').removeClass('expanded').slideUp(250);
				$(this).html('&#9660;');
			} else {
				$(this).parent('li').find('.sub-menu').addClass('expanded').slideDown(250);
				$(this).html('&#9650;');
			}
		}
	});
});
// End Doc Ready
	
// Functions for Above Operations
function resetNav() {
	if ( $(window).width() <= 1100 ) {
		$('.header-menu ul.menu').css('display', 'none');
		$('.sub-menu-toggle').html('&#9660;')
		closeMenu();
		closeSubMenu();
	}
	if ( $(window).width() > 1100 ) {
		$('.header-menu ul.menu').css('display', 'block');
		closeSubMenu();
	}
}
	
function openMenu() {
	$('.header-menu ul.menu').addClass('expanded').slideDown(250);
       $(this).addClass('open');
}
	
function closeMenu() {
	$('.header-menu ul.menu.expanded').removeClass('expanded').slideUp(250);
       $(this).removeClass('open');
}
	
function closeSubMenu() {
	$('.header-menu ul.menu').find('.sub-menu.expanded').removeClass('expanded').slideUp(150);
	$('.header-menu ul.menu').find('.sub-menu').removeAttr('style');
}	

}(jQuery));