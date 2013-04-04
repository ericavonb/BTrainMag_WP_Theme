jQuery.noConflict();
jQuery(function($) { 
	
	
	
	
	
	/* Drop Down Menu (superfish + hoverintent + supersubs)
	___________________________________________________________________ */
	// http://users.tpg.com.au/j_birch/plugins/superfish/#getting-started
	// http://users.tpg.com.au/j_birch/plugins/superfish/#options
	$(".sf-menu").supersubs({ 
			minWidth:    12,   // minimum width of sub-menus in em units 
			maxWidth:    27,   // maximum width of sub-menus in em units 
			extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
							   // due to slight rounding differences and font-family 
		}).superfish({
			dropShadows:    false,
			delay:			400
			
							}); // call supersubs first, then superfish, so that subs are 
                         		// not display:none when measuring. Call before initialising 
                         		// containing tabs for same reason. 




	/* Scroll to top animation
	___________________________________________________________________ */
	$('.scroll-top').click(function(){ 
		$('html, body').animate({scrollTop:0}, 600); return false; 
	});
	



	/* Hide parent on click (error messages, etc...)
	___________________________________________________________________ */	
	$('a.hideparent').click(function(){ 
		$(this).parent().fadeOut();
		return false;
	});
	
	
	
	
	/* Menu Hover Indent
	___________________________________________________________________ */
	var sf_hover_sel = $(".sf-menu ul a");
	var sf_link_padding = parseInt(sf_hover_sel.css('padding-left'));
	var sf_hover_offset = 2 + sf_link_padding;
	$(sf_hover_sel).hover(
		function () {
			$(this).stop().animate({"padding-left": sf_hover_offset + "px"}, 75);
		  }, 
		  function () {
			$(this).stop().animate({"padding-left": sf_link_padding + "px"}, 250);
		  }
	);

	
	
	
	/* Fade Hover
	___________________________________________________________________ */
	
	if ( ! $.browser.msie ) {
		$(".social-icon").stop().fadeTo("fast", .4);
		$(".social-icon").hover(
			function(){
				$(this).stop().fadeTo("fast", .6);
			},
			function(){
				$(this).stop().fadeTo("fast", .4);
			}
		);
		
		// Any link to an image, fade on hover
		$('a img').hover(
			function(){ $(this).stop().animate({ opacity : '.85' }); }, 
			function(){ $(this).stop().animate({ opacity : '1' }); }
		);
	} else {
		// IE, do nothing		
	}
	
		
	
		
	/* Contact Form Validation
	___________________________________________________________________ */
	
	var hasChecked = false;
	$(".standard #cf_submit").click(function () { 
		hasChecked = true;
		return checkForm();
	});
	$(".standard #cf_name,.standard #cf_email,.standard #cf_message").live('change click', function(){
		if(hasChecked == true) {
			return checkForm();
		}
	});
	function checkForm() {
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if($(".standard #cf_name").val() == '') {
			$("#cf_name").addClass('error');
			hasError = true;
		}else{
			$("#cf_name").removeClass('error');
		}
		if($("#cf_email").val() == '') {
			$("#cf_email").addClass('error');
			hasError = true;
		}else if(!emailReg.test( $("#cf_email").val() )) {
			$("#cf_email").addClass('error');
			hasError = true;
		}else{
			$("#cf_email").removeClass('error');
		}
		if($("#cf_message").val() == '') {
			$("#cf_message").addClass('error');
			hasError = true;
		}else{
			$("#cf_message").removeClass('error');
		}
		if(hasError == true){
			return false;
		}else{
			return true;
		}
	}
	// end contact form validation
	
	

}); // end jQuery
