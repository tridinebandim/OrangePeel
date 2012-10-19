<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>

<link href="../../resident-area/css/main.css" rel="stylesheet" type="text/css" />
<link href="../../resident-area/css/nav_bright.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../lib/notifications.css" />
<script type="text/javascript" src="../lib/jquery.js"></script>
<script type="text/javascript" src="../lib/jquery.cookie.js"></script>
<script type="text/javascript" src="../lib/custom.js"></script>
<!--<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	jQuery('#wrap').preventJump({});
});


// --------------------------------
// PREVENT JUMPING OF THE SCROLLBAR
// --------------------------------
(function($)
{
	$.fn.preventJump = function()
	{
		var defaults = {
		};
		
		return this.each(function()
		{
			var element = $(this),
				wrapper = element.parent(),
				window_height = parseInt($(window).height()),
				new_height = window_height+1;
				
			wrapper.css({height: new_height+'px'});
			
		});
	}
})(jQuery);
</script>
</head>

<body>
<div id="siteAlign">
<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
		<!-- ADMIN MESSAGE START
		<div class="notification tip closeable">
			<p><strong>New Residency Request!</strong> <br/>This is an new resident notification. It will pop up when ever there are un-processed applications.</p>
		</div>	
		 ADMIN MESSAGE END -->
		<?php include 'menu.php'; ?>

		
		<h1>7 Day Stats</h1>
		<p>The weeks overall love count, most loved DJ, overall shout count, most shouted DJ, overall on air time, DJ on air the longest</P>
		<h1>Global Stats</h1>
		<p>Love count, most loved DJ, shout count, most shouted DJ, amount of active DJs (logged in within past month), DJ amount</P>
		</div>
	</div>
	<div id="copyRight">
		Copyright <a href="http://www.whatiscopyright.org/" target="_blank">&copy;</a> <?php echo date(Y); ?> | 
		<a href="http://www.houseofdance.net">the House of Dance network</a> | Some rights reserved, but others are left alone.
	</div>
</div>
</body>
</html>
