jQuery.noConflict();

// ------------------
// START EDITING HERE
// ------------------
jQuery(document).ready(function(){

	jQuery('.closeable').closeThis({
		animation: 'fadeAndSlide', 	// set animation
		animationSpeed: 400 		// set animation speed
	});
	
	jQuery('#wrap').rememberState();
	
});
// ----------------
// END EDITING HERE
// ----------------



// -----------------------
// CLOSEABLE NOTIFICATIONS
// -----------------------
(function($)
{
	$.fn.closeThis = function(options)
	{
		var defaults = {
			animation: 'slide',
			animationSpeed: 300
		};
		
		var options = $.extend({}, defaults, options);
		
		return this.each(function()
		{
			var message = $(this);
			
			message.css({cursor: 'pointer'});
			
			message.click(function()
			{
				hideMessage(message);
			});
			
			function hideMessage(object)
			{
				switch(options.animation)
				{
					case 'fade':
						fadeAnimation(object);
						break;
					case 'slide':
						slideAnimation(object);
						break;
					case 'size':
						sizeAnimation(object);
						break;
					case 'fadeThenSlide':
						fadeAndSlideAnimation(object);
						break;
					default:
						fadeAndSlideAnimation(object);
				}
			}
			
			function fadeAnimation(object)
			{
				object.fadeOut(options.animationSpeed);
			}
			
			function slideAnimation(object)
			{
				object.slideUp(options.animationSpeed);
			}
			
			function sizeAnimation(object)
			{
				object.hide(options.animationSpeed);
			}
			
			function fadeAndSlideAnimation(object)
			{
				object.fadeTo(options.animationSpeed, 0, function() { slideAnimation(message) } );
			}
			
		});
	}
})(jQuery);



// -----------------------
// HIDE CLOSED BOXES
// -----------------------
(function($)
{
	$.fn.rememberState = function(options)
	{
		var defaults = {
		};
		
		var options = $.extend({}, defaults, options);
		
		return this.each(function()
		{
			var wrapper = $(this),
				notifications = wrapper.find('.notification'),
				nNumber = notifications.length;
				
			notifications.each(function(i)
			{
				$(this).attr('id', 'notification_'+i);
				var id = $(this).attr('id');
				
				$(this).click(function()
				{
					$.cookie(id, 'hidden');
				});
				
				var boxCookies = $.cookie(id);
				if(boxCookies == 'hidden')
				{
					$('#'+id).hide();
				}
				
			});			
		});
	}
})(jQuery);