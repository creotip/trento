/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


jQuery(document).ready(function() {
var stickyNavTop = jQuery('.header').offset().top;
 
var stickyNav = function(){
var scrollTop = jQuery(window).scrollTop();
      
if (scrollTop > stickyNavTop) { 
    jQuery('.header').addClass('sticky');
} else {
    jQuery('.header').removeClass('sticky'); 
}
};
 
stickyNav();
 
jQuery(window).scroll(function() {
    stickyNav();
});
});

// Bottom sticky footer
function bottomFooter() {

   var docHeight = jQuery(window).height();
   var footerHeight = jQuery('.footer').height();
   var footerTop = jQuery('.footer').position().top + footerHeight;

   if (footerTop < docHeight) {
    jQuery('.footer').css('margin-top', 0+ (docHeight - footerTop) + 'px');
   }	
	
}

function miniCart(){
	
	jQuery(function() {                       //run when the DOM is ready
		jQuery(".mini-cart").hover(function() {  //use a class, since your ID gets mangled
			jQuery(".mini-cart-dropdown").toggleClass("show-mini-cart");      //add the class to the clicked element
		});

	})

}

function touchMenu() {
	jQuery('.open-touch-button, .close-touch-button').click(touch_menu);
		jQuery('.status').click(touch_menu);
		function touch_menu(){
				jQuery(".wrap-touch-nav").toggleClass('show-menu');  
				jQuery('.status').toggleClass("overlay"); 
	}
	
jQuery(".touch-nav > .menu-item-has-children > a").before("<i class='tog fa fa-angle-down btn'></i>");
jQuery(".tog").click(function(e) {
    e.preventDefault();
    if (jQuery(this).hasClass("expanded")) {
        jQuery(this).removeClass("expanded");
        jQuery(this).parent().children("ul").stop(true, true).slideUp("fast");
    } else {
        jQuery("#items a.expanded").removeClass("expanded");
        jQuery(this).addClass("expanded");
        jQuery(".sub-items").filter(":visible").slideUp("fast");
        jQuery(this).parent().children("ul").stop(true, true).slideDown("fast");
    }
});

	
}

function searchDropdown() {

		// Handle click on toggle search button
		jQuery('#toggle-search').click(function() {
			jQuery('#search-form, #toggle-search').toggleClass('open');
			return false;
		});

		// Handle click on search submit button
		jQuery('#search-form input[type=submit]').click(function() {
			jQuery('#search-form, #toggle-search').toggleClass('open');
			return true;
		});

		// Clicking outside the search form closes it
		jQuery(document).click(function(event) {
			var target = jQuery(event.target);
      
			if (!target.is('#toggle-search') && !target.closest('#search-form').size()) {
				jQuery('#search-form, #toggle-search').removeClass('open');
			}
		});

}


function wooCatCarousel() { 


     // More than one slide - initialize the carousel
    if ( jQuery('.imagewrapper').children('div').length > 2) 
    
		{

		jQuery('.imagewrapper').slick({
		// options go here
		speed: 200,
		prevArrow: '<div class="rps-prev"><i class="fa fa-angle-left"></i></div>',
		nextArrow: '<div class="rps-next"><i class="fa fa-angle-right"></i></div>'		
		});
		
		jQuery('.imagewrapper').addClass('one-image');
		
		} 

		else {
		
		jQuery('.imagewrapper').slick('unslick');
		
		
		} 



}



/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {
  /*
   * You can remove this if you don't need it
  */
  loadGravatars();
	
  bottomFooter();
	
  miniCart();
  
searchDropdown();
	
touchMenu();

wooCatCarousel();
	


}); /* end of as page load scripts */
