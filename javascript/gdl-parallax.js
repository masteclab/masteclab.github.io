// On your marks, get set...
jQuery(document).ready(function($){
	var is_mobile = false;
	if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i)
		|| navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)
		|| navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) ){
		is_mobile = true;
	}
	
	// Logo
	$gdl_logo = $('#gdl-main-logo');
	
	// Main navigation
	$main_nav = $('#main-navigation');
	
	// Social Icon Wrapper
	$social_icon = $('#social-icon-wrapper .social-icon a');
	
	// Cache the Window object
	$window = $(window);

	// Cache the Y offset and the speed of each sprite
	$('[data-type]').each(function() {	
		$(this).data('offsetY', parseInt($(this).attr('data-offsetY')));
		$(this).data('Xposition', $(this).attr('data-Xposition'));
		$(this).data('speed', $(this).attr('data-speed'));
	});
	
	$('section[data-background="static"]').each(function(){
		$static_section = $(this);
		$static_section.css('min-height', $window.height());
		$window.resize(function(){
			$static_section.css('min-height', $window.height());
		});
		
		$static_section.find('.content-top-gimmick-wrapper').css('display','block');
	});
	
	// For each element that has a data-type attribute
	$('section[data-type="background"]').each(function(){
		// Header Gimmick
		if( $(this).index() == 0 ){
			$(this).find('.content-top-gimmick-wrapper').css('display','block');
		}
	
		// Store some variables based on where we are
		$(this).css('min-height', $window.height());
		$(this).find('.container').css('min-height', $window.height());
		$(this).css('height', $(this).find('.article-wrapper').height());
		
		var $self = $(this),
			offsetCoords = $self.offset(),
			topOffset = offsetCoords.top;

			$window.resize(function(){
				// Change the height when window resize
				
				var min_height = $window.height();
				var article_height = $self.find('.article-wrapper').height();
				var container_height = $self.find('.container').height();
				
				$self.find('.container').css('min-height', min_height);
				
				if( min_height > article_height ){
					$self.animate({'height' : min_height}, 250, function(){
						$(this).css('min-height', $window.height());
						
						offsetCoords = $self.offset(),
						topOffset = offsetCoords.top;
					});
				}else{
					$self.animate({'height' : article_height}, 250, function(){
						$(this).css('min-height', $window.height());
						
						offsetCoords = $self.offset(),
						topOffset = offsetCoords.top;
					});
				}
				
				
			});
		
		var $max_num = $(this).parent().children().length - 1;
			
		// When the window is scrolled...
	    $(window).scroll(function() {
		
			// If this section is in view
			if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
				 ( (topOffset + $self.height()) > $window.scrollTop() ) ) {
	
				// Scroll the background at var speed
				// the yPos is a negative value because we're scrolling it UP!								
				var yPos = -(($window.scrollTop()-topOffset) / $self.data('speed'));
				
				// If this element has a Y offset then add it on
				if ($self.data('offsetY')) {
					yPos += $self.data('offsetY');
				}
				
				// Put together our final background position
				var coords = '50% '+ yPos + 'px';

				// Move the background
				if( !is_mobile ){
					$self.css({ backgroundPosition: coords });
				}

				// Check if user resides in this section
				$is_current_section = false;
				
				if( $self.index() == 0 ){
					if( ($window.scrollTop() + ($window.height()/4)) < $self.height() ) {
						$is_current_section = true;
					}
				}else if( $self.index() == $max_num ){
					if( ($window.scrollTop() + ($window.height()/4)) >= (topOffset) ) {
						$is_current_section = true;
					}
				}else{
					if( ($window.scrollTop() + ($window.height()/4)) >= (topOffset) &&
						($window.scrollTop() + ($window.height()/4)) < (topOffset + $self.height()) ){
						$is_current_section = true;
					}				

				}
				
				if( $is_current_section == true ){
					$self.find('.content-top-gimmick-wrapper').fadeIn();
				
					$main_nav.find('a.anchor.active').removeClass('active');
					$main_nav.find('a#nav-section' + $self.index()).each(function(){
						$(this).addClass('active');					
					});
					
					$main_nav.removeClass().addClass('current-nav' + $self.index());
					
					// Change Social Icon
					if( $self.attr('data-icon') == 'dark' ){
						$social_icon.each(function(){ 
							if($(this).hasClass('light')){
								$(this).removeClass('light');
							}
						});
					}else{
						$social_icon.each(function(){ 
							if(!$(this).hasClass('light')){
								$(this).addClass('light');
							}
						});
					}	
					
					// Change Logo
					var cur_logo_src = $gdl_logo.attr('data-logo' + $self.index());
					if( !cur_logo_src ){
						cur_logo_src = $gdl_logo.attr('data-default');
					}
					if( $gdl_logo.attr( 'src' ) != cur_logo_src ){
						$gdl_logo.attr( 'src', cur_logo_src );
					}
					
				}else{
					$self.find('.content-top-gimmick-wrapper').fadeOut();
				}
				
			}; // in view
	
		}); // window scroll
			
	});	// each data-type

}); // document ready
