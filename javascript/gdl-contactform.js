jQuery(document).ready(function(){
	jQuery("form#gdl-contact-form").submit(function(){
		var the_form = jQuery(this);
		var error = false;
		
		jQuery(this).find('#sending-result').slideUp(200,function(){ jQuery(window).trigger('resize'); });
		jQuery(this).find('.require-field').each(function(){
			if(jQuery.trim(jQuery(this).val()) == '') {
				error = true;
				jQuery(this).siblings('.error').slideDown(200,function(){ jQuery(window).trigger('resize'); });
			}else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					error = true;
					jQuery(this).siblings('.error').slideDown(200,function(){ jQuery(window).trigger('resize'); });
				}else{
					jQuery(this).siblings('.error').slideUp(200,function(){ jQuery(window).trigger('resize'); });
				}
			}else{
				jQuery(this).siblings('.error').slideUp(200,function(){ jQuery(window).trigger('resize'); });
			}
		});
		
		if(error) return false;
		
		jQuery(this).find('#contact-loading').fadeIn();
		
		var send_data = jQuery(this).serialize();
		jQuery.post(MyAjax.ajaxurl, 'action=submit_contact_form&' + send_data, function(data){
			the_form.find('#contact-loading').fadeOut();
			if( data == '1' ){
				the_form.find('input[type="text"], textarea').val('');
				the_form.find('#sending-result div').each(function(){
					jQuery(this).html('The e-mail was sent successfully');
					jQuery(this).removeClass('red').addClass('green');
					jQuery(this).parent().slideDown(200,function(){ jQuery(window).trigger('resize'); });
				});
			}else{
				the_form.find('#sending-result div').each(function(){
					jQuery(this).html(data);
					jQuery(this).removeClass('green').addClass('red');
					jQuery(this).parent().slideDown(200,function(){ jQuery(window).trigger('resize'); });
				});
			}
			
		});
		
		
		return false;
	});
});