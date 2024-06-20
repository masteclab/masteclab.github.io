/*******

	***	Anchor Slider by Cedric Dugas   ***
	*** Http://www.position-absolute.com ***
	
	Never have an anchor jumping your content, slide it.

	Don't forget to put an id to your anchor !
	You can use and modify this script for any project you want, but please leave this comment as credit.
	
*****/

jQuery(document).ready(function() {
	jQuery("a.anchor").not('.not-home').anchorAnimate({ speed: 500 });
});

jQuery.fn.anchorAnimate = function(settings) {
 	settings = jQuery.extend({
		speed : 1100
	}, settings);	
	
	return this.each(function(){
		var caller = this
		jQuery(caller).click(function (event) {	
			event.preventDefault();
			
			var locationHref = window.location.href;
			var elementClick = jQuery(caller).attr("href");
			var destination = jQuery(elementClick).offset().top;
			var navigation_menu = jQuery('.navigation-wrapper').filter(':first');
			
			jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination }, settings.speed, "easeOutExpo" , function() {
				navigation_menu.css({ "position": "relative" });
				window.scroll(0, destination );
				navigation_menu.css({ "position": "fixed" });
			});
			
  	  return false;
		})
	})
}