jQuery(document).ready(function(){
	var now_loading = jQuery('#gdl-now-loading');
	
	// When click ajax link
	jQuery('a[data-gdlajax]').click(function(){
		jQuery(this).bindAjaxLink();
	});
	jQuery.fn.bindAjaxLink = function(){
		
		var ajax_container = jQuery(this).parents('.ajax-container');
		var content_container = ajax_container.parent('.container');
		var background_container = content_container.siblings('.container-fake');
		var page_anchor = jQuery(this).attr('data-gdlanchor');
		
		
		ajax_container.fadeOut(200, function(){	
			now_loading.fadeIn(100);
			//background_container.addClass('now-loading');	
		});
			
		var send_object = {
			action : 'gdl_request_page',
			page_id : jQuery(this).attr('data-gdlajax'),
			first_page : ajax_container.attr('data-firstpage'),
			paged : jQuery(this).attr('data-gdlpaged'),
			termtype : jQuery(this).attr('data-termtype'),
			termvalue : jQuery(this).attr('data-termvalue'),
			portpage : jQuery(this).attr('data-portpage')
		};
		jQuery.post( MyAjax.ajaxurl, send_object, function( receive_data ){

			ajax_container.html( receive_data );

			// Show the content
			now_loading.fadeOut(300);
			ajax_container.fadeIn();
			//background_container.removeClass('now-loading');			
			
			// Binding javascript in page
			ajax_container.find('a[data-gdlajax]').bind('click',function(){
				jQuery(this).bindAjaxLink();
			});
				// Accordion
				ajax_container.find("ul.gdl-accordion li").each(function(){
					jQuery(this).bindGdlAccordion();
				});
				// Toggle Box
				ajax_container.find("ul.gdl-toggle-box li").each(function(){
					jQuery(this).bindGdlToggleBox();
				});
				// Tab
				ajax_container.find('ul.tabs').each(function(){
					jQuery(this).bindGdlTab();
				});					
				// Price Table
				ajax_container.find(".gdl-price-item").each(function(){
					jQuery(this).bindGdlPriceItem();
				});		
				
				// Blog Hover
				ajax_container.find(".blog-thumbnail-image img, .single-port-thumbnail-image img, .single-post-thumbnail-image img").each(function(){
					jQuery(this).bindGdlBlogHover();
				});
				// Port Hover
				ajax_container.find(".portfolio-item-holder .portfolio-thumbnail-image-hover").each(function(){
					jQuery(this).bindGdlPortHover();
				});

				ajax_container.find('div#portfolio-item-holder').each(function(){
					jQuery(this).equalHeights();
				});
				
				// Flex Slider
				if( typeof(jQuery.flexslider) == 'function' ){
					ajax_container.find('.flexslider').flexslider( FLEX );	
				}
				// Nivo Slider
				if( typeof(jQuery.fn.nivoSlider) == 'function' ){
					ajax_container.find('.nivoSlider').nivoSlider( NIVO );
				}
				// Anything Slider
				if( typeof(jQuery.anythingSlider) == 'function' ){
					ajax_container.find('ul.anythingSlider').anythingSlider( ANYTHING );
				}
				
				// Call Testimonial
				if( typeof( jQuery.fn.bindGdlTestimonial) == 'function' ){
					ajax_container.find('.jcarousellite').each(function(){
						jQuery(this).bindGdlTestimonial();
					});
				}
				
				// Call Pretty Photo
				// ajax_container.find("a[href$='jpg'],a[href$='png'],a[href$='gif']").not("a[data-rel^='prettyPhoto']").attr("data-rel", "prettyPhoto");
				ajax_container.find("a[data-rel^='prettyPhoto']").each(function(){
					jQuery(this).bindGdlPrettyPhoto();
				});
				
				// Comment Form
				ajax_container.find("form#commentform").each(function(){
					jQuery(this).bindGdlAjaxComment();
				});
				
				// Filterable
				if( typeof(jQuery.fn.bindGdlFilterable) == 'function' ){
					ajax_container.find('ul#portfolio-item-filter').each(function(){
						jQuery(this).bindGdlFilterable();
					});
				}
				
				// Refresh Cufon
				if( typeof(Cufon) != 'undefined' ){
					ajax_container.bindReplaceCufon();
				}
				
				// Preloader
				ajax_container.preloader();
				
			// Resize Frame
			jQuery(window).trigger('resize');
			
			// Go to specified anchor
			if( page_anchor ){
				var anchor_position = ajax_container.find("#" + page_anchor).offset().top;
				if( anchor_position ){
					jQuery('html,body').animate({ scrollTop: anchor_position }, 300, "easeOutExpo");
				}
			}else{
				var anchor_position = ajax_container.parents('section').offset().top;
				if( anchor_position ){
					jQuery('html,body').animate({ scrollTop: anchor_position }, 300, "easeOutExpo");
				}				
			}
			
			// Bind Comment Anchor
			jQuery("a[data-anchor]").click(function(){
				var anchor_position = ajax_container.find("#" + jQuery(this).attr('data-anchor')).offset().top;
				if( anchor_position ){
					jQuery('html,body').animate({ scrollTop: anchor_position }, 300, "easeOutExpo");
				}			
			});

		});
		
		
	};
	

});