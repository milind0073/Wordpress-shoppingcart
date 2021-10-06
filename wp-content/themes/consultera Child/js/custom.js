jQuery(document).ready(function() {

	// 01 - HIDE DROPDOWN MENU ON TAB AND MOBILE ON CLICK ON NAVBAR TOGGLE BUTTON
    //jQuery('.navbar-toggler').click(function() {
        //jQuery('li.nav-item.dropdown > .dropdown-menu').hide();
    //});
    
    // 02 - TOGGLE MENU ON CLICK ON ARROW ICON ON MOBILE AND TAB
    //jQuery('.navbar-nav .dropdown button').on('click', function() {
        //var $subMenu = jQuery(this).parent().next(".dropdown-menu");
        //$subMenu.slideToggle("fast");

        //
        //jQuery(this).parent().parents('li.nav-item.dropdown').on('hidden.bs.dropdown', function(){
            //jQuery('.dropdown-submenu .show').removeClass("show");
        //});
        //return false;
    //});
    
    
    
    // 01 - HIDE DROPDOWN MENU ON TAB AND MOBILE ON CLICK ON NAVBAR TOGGLE BUTTON
    jQuery('.navbar-toggler').click(function() {
        jQuery('li.nav-item.dropdown > .dropdown-menu').hide();
        jQuery('li.nav-item.dropdown > .dropdown-caret-mobile i').removeClass('fa-angle-up');
        jQuery('li.nav-item.dropdown > .dropdown-caret-mobile i').addClass('fa-angle-down');
    });
    

    
    // 02 - TOGGLE MENU ON CLICK ON ARROW ICON ON MOBILE AND TAB
    jQuery('.navbar-nav li.dropdown button').on('click', function() {
        var $subMenu = jQuery(this).next(".dropdown-menu");
        $subMenu.slideToggle("fast");

        jQuery(this).children("i").toggleClass('fa-angle-up fa-angle-down');

        jQuery(this).parent().parents('li.nav-item.dropdown').on('hidden.bs.dropdown', function(){
            //jQuery('.dropdown-submenu .show').removeClass("show");
        });
        return false;
    });
    // close menu on focus on tab and mobile
    jQuery('.mainmenu .nav li').last().focusout(function(){
        jQuery(this).parents(".mainmenu").removeClass("show");
    })
	


    // 03 - KEYBOARD ACCESSIBLE MENU ON TAB KEY START
    jQuery('.mainmenu li a').focus( function () {
        jQuery(this).siblings('.dropdown-menu').addClass('focused');
    }).blur(function(){
        jQuery(this).siblings('.dropdown-menu').removeClass('focused');
    });
    //Sub Menu
    jQuery('.mainmenu li a').focus( function () {
        jQuery(this).parents('.dropdown-menu').addClass('focused');
    }).blur(function(){
        jQuery(this).parents('.dropdown-menu').removeClass('focused');
    });


	// 04 - SCROLL TO TOP SCRIPT
	jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 100) {
        	jQuery(".scroll-to-top").addClass("show");
            jQuery('.scroll-to-top').fadeIn();
        } else {
        	jQuery(".scroll-to-top").removeClass("show");
            jQuery('.scroll-to-top').fadeOut();
        }
    });
    jQuery('.scroll-to-top').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 300);
        return false;
    });
	
});