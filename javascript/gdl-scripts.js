(function($) {

	// Accordion
	$.fn.bindGdlAccordion = function() {
		if($(this).index() > 0){
			$(this).children(".accordion-content").css('display','none');
		}else{
			$(this).find(".accordion-head-image").addClass('active');
		}
		
		$(this).children(".accordion-head").bind("click", function(){
			$(this).children().addClass(function(){
				if($(this).hasClass("active")) return "";
				return "active";
			});
			$(this).siblings(".accordion-content").slideDown(function(){
				$(window).trigger('resize');
			});
			$(this).parent().siblings("li").children(".accordion-content").slideUp(300);
			$(this).parent().siblings("li").find(".active").removeClass("active");
			
		});	
	}
	
	//Toggle Box
	$.fn.bindGdlToggleBox = function() {
		$(this).children(".toggle-box-content").not(".active").css('display','none');
		
		$(this).children(".toggle-box-head").bind("click", function(){
			$(this).children().addClass(function(){
				if($(this).hasClass("active")){
					$(this).removeClass("active");
					return "";
				}
				return "active";
			});
			$(this).siblings(".toggle-box-content").slideToggle(function(){
				$(window).trigger('resize');
			});
		});	
	}
	
	//Blog Hover
	$.fn.bindGdlBlogHover = function() {
		$(this).hover(function(){
			$(this).animate({ opacity: 0.55 }, 150);
		}, function(){
			$(this).animate({ opacity: 1 }, 150);
		});	
	
	}
	
	//Port Hover
	$.fn.bindGdlPortHover = function() {
		$(this).hover(function(){
			$(this).animate({ opacity: 0.55 }, 400, 'easeOutExpo');
			$(this).find('span').animate({ left: '50%'}, 300, 'easeOutExpo');
		}, function(){
			$(this).find('span').animate({ left: '150%'}, 300, 'easeInExpo', function(){
				$(this).css('left','-50%');
			});
			$(this).animate({ opacity: 0 }, 400, 'easeInExpo');
		});	
	}	
	
	//Price Item
	$.fn.bindGdlPriceItem = function() {
		var max_height = 0;
		$(this).find('.price-item').each(function(){
			if( max_height < $(this).height()){
				max_height = $(this).height();
			}
		});
		$(this).find('.price-item').height(max_height);	
	}
	
	$.fn.bindGdlTab = function() {
		//Get all tabs
		var tab = $(this).find('> li > a');
		tab.click(function(e) {
			//Get Location of tab's content
			var contentLocation = $(this).attr('data-href');
			//Let go if not a hashed one
			if(contentLocation.charAt(0)=="#") {
				e.preventDefault();
				//Make Tab Active
				tab.removeClass('active');
				$(this).addClass('active');
				//Show Tab Content & add active class
				$(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
				$(window).trigger('resize');
			}
		});
	}
	
	$.fn.bindGdlAjaxComment = function() {
		var commentform = $(this);  
		var refresh_ajax = commentform.find('#gdl-refresh-contact');
		commentform.prepend('<div id="wdpajax-info" ></div>');  
		var infodiv = commentform.find('#wdpajax-info');  
		commentform.validate({  
			submitHandler: function(form){
				//serialize and store form data in a variable  
				var formdata = commentform.serialize();  
				//Add a status message  
				infodiv.html('<p>Processing...</p>');  
				//Extract action URL from commentform  
				var formurl = commentform.attr('action');  
				//Post Form with data  
				$.ajax({  
					type: 'post',  
					url: formurl,  
					data: formdata,  
					error: function(XMLHttpRequest, textStatus, errorThrown){  
						infodiv.html('<p class="wdpajax-error" >Please fill in all required fields.</p>');  
					},  
					success: function(data, textStatus){  
						refresh_ajax.bindAjaxLink();
					}  
				});  
			}  
		});	
	}
	
	$.fn.bindGdlFixedPosition = function( from_center ){		
		var gdl_offset = 0;
		
		if( from_center ){
			var body = jQuery('body').filter(':first');
			gdl_offset = body.width()/2;
		}
		
		var current_item = jQuery(this);
		current_item.css('left', gdl_offset - jQuery(window).scrollLeft() );
		
		jQuery(window).resize(function(){
			current_item.css('left', gdl_offset - jQuery(window).scrollLeft() );
			if( from_center ){
				var body = jQuery('body').filter(':first');
				gdl_offset = body.width()/2;
			}
		});
		jQuery(window).scroll(function(){
			current_item.css('left', gdl_offset - jQuery(window).scrollLeft() );
			if( from_center ){
				var body = jQuery('body').filter(':first');
				gdl_offset = body.width()/2;
			}	
		});
	}
	
})(jQuery);

jQuery(document).ready(function(){

	// Scroll Right Left
	jQuery('.navigation-wrapper').filter(':first').each(function(){
		jQuery(this).bindGdlFixedPosition( true );
	});
	jQuery('#social-icon-wrapper').each(function(){
		jQuery(this).bindGdlFixedPosition( true );
	});
	jQuery('.footer-wrapper').filter(':first').each(function(){
		jQuery(this).bindGdlFixedPosition();
	});	
	
	// Accordion
	jQuery("ul.gdl-accordion li").each(function(){
		jQuery(this).bindGdlAccordion();
	});
	// Toggle Box
	jQuery("ul.gdl-toggle-box li").each(function(){
		jQuery(this).bindGdlToggleBox();
	});
	// Tab
	jQuery('ul.tabs').each(function(){
		jQuery(this).bindGdlTab();
	});	
	// Price Table
	jQuery(".gdl-price-item").each(function(){
		jQuery(this).bindGdlPriceItem();
	});
	
	// Blog Hover
	jQuery(".blog-thumbnail-image img, .single-port-thumbnail-image img, .single-post-thumbnail-image img").each(function(){
		jQuery(this).bindGdlBlogHover();
	});
	
	// Port Hover
	jQuery(".portfolio-item-holder .portfolio-thumbnail-image-hover").each(function(){
		jQuery(this).bindGdlPortHover();
	});
	
	// Social Hover
	jQuery("#social-icon-wrapper .social-icon").hover(function(){
		jQuery(this).animate({ opacity: 1 }, 150);
	}, function(){
		jQuery(this).animate({ opacity: 0.55 }, 150);
	});
	// Prepare preload
	jQuery(".content-wrapper").filter(":first").preloader();
	
	// Comment Form
	jQuery("form#commentform").each(function(){
		jQuery(this).bindGdlAjaxComment();
	});
	
	// Footer
	jQuery('#open-footer-button').click(function(){
		var footer_button = jQuery(this);
		var footer_content = jQuery(this).siblings('.footer-inner-wrapper');
		footer_content.slideToggle(400, "easeOutExpo",function(){

		});
			footer_button.animate( {right: '-80px'}, 300, "easeOutExpo" , function(){
				footer_button.toggleClass('active');
				footer_button.animate( {right: '0px'}, 300, "easeOutExpo");
			});		
	
	});

	// Bind Comment Anchor	
	jQuery("a[data-anchor]").click(function(){
		var ajax_container = jQuery(this).parents('.ajax-container');
		var anchor_position = ajax_container.find("#" + jQuery(this).attr('data-anchor')).offset().top;
		if( anchor_position ){
			jQuery('html,body').animate({ scrollTop: anchor_position }, 300, "easeOutExpo");
		}			
	});	
	
	// Replace Cufon
	jQuery('body').bindReplaceCufon();
});

jQuery(window).load(function(){
	// Set Portfolio Max Height
	jQuery('div#portfolio-item-holder').equalHeights();
});

/* Equal Height Function
================================================== */
(function($) {
	$.fn.equalHeights = function(px) {
		$(this).each(function(){
			var currentTallest = 0;
			$(this).children().each(function(i){
				if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
			});
			$(this).children().css({'min-height': currentTallest}); 
		});
		return this;
	};
})(jQuery);
