<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<link href="css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/jquery.tooltip.css">
<!--<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" type="text/css" href="lib/notifications.css" />
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/jquery.cookie.js"></script>
<script type="text/javascript" src="lib/custom.js"></script>


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
<script>
 $(document).ready(function() {
 	 $("#shouter").load("shout.php");
   var refreshId = setInterval(function() {
      $("#shouter").load('shout.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});

 $(document).ready(function() {
 	 $("#love").load("love.php");
   var refreshId = setInterval(function() {
      $("#love").load('love.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});

 $(document).ready(function() {
 	 $("#showtimes").load("showtimes.php");
   var refreshId = setInterval(function() {
      $("#showtimes").load('showtimes.php?randval='+ Math.random());
   }, 100);
   $.ajaxSetup({ cache: false });
});
</script>
<?php include 'config.php'; require_once('auth.php');

$result = mysql_query("SELECT * FROM ra2_shouts WHERE shout='LOVE' ORDER BY shoutID DESC LIMIT 1");
while($row = mysql_fetch_array($result)) {
		$lovetime = $row['timestamp'];
		$loveip = $row['ip'];
}
$lovehide = $_GET['lovehide'];
if ($lovehide == 'yes') {
	mysql_query("UPDATE ra2_shouts SET hide='yes' WHERE timestamp='$lovetime' AND ip='$loveip'");
	header('Location: dashboard.php');
}
$shoutip = $_GET['shoutip'];
$shouttime = $_GET['shouttime'];
$shouthide = $_GET['shouthide'];
if ($shouthide == 'yes') {
	mysql_query("UPDATE ra2_shouts SET hide='yes' WHERE timestamp='$shouttime' AND ip='$shoutip'");
	header('Location: dashboard.php');
}

?>
</head>

<body onLoad="show_clock()">
<div id="siteAlign">
<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
		<!--
			<div class="notification warning closeable dashboardNOTE">
				<p><strong>IMPORTANT NOTICE!</strong> <br/>This is a tip/info notification. It looks cool and works in all browsers and closes by clicking.</p>
			</div>-->
			<div class="bar1">
			<?php
			//if () {
				echo '<a href="#" class="button black heavy" title="You do not have permission to go live just yet.">ON AIR</a>';
			//}
			//elseif () {
			//	echo '<a href="#" class="button red heavy" title="You now have permission to GO LIVE">ON AIR</a>';
			//}
			?>
				<a href="#" class="button heavy showname">BACK TO THE OLDSKOOL GARAGE DAYS <span class="hosted">with DJ Terry Fursland</span></a>
			</div>
			<div class="bar1">
				<a href="#" class="button times" title="The start time of your show">START <div class='normal'>00:00</div></a>
				<span id="showtimes"><?php include 'showtimes.php'; ?></span>
				<a href="#" class="button times" title="The end time of your show">END <div class='normal'>00:00</div></a>
				<a href="#" class="button times" title="The live time in GMT">GMT <div class='normal'>00:00</div></a>
				<a href="#" class="button times" title="The live time in your area">LOCAL <div class='normal'>
				<script language="javascript" src="js/liveclock.js"></script>
				</div></a>
				<span id="love"><?php include 'love.php'; ?></span>
				<a href="#" class="button black times" title="Your overall number of shouts"> SHOUT<div class='normal'>#123</div></a>
			</div>
			<div class="col2">
				<a href="#" class="button large schedbit blue">
				<span class="when">on before</span><div class="coltime">12:00 - 14:00</div>
				<br/>NON-STOP NEW MUSIC <span class="normal">selected from the <b>playlist</b></span><br/>
				<strong>Some information about this show will go here!</strong>
				</a>
				<a href="#" class="button large schedbit green">
				<span class="when">on next</span><div class="coltime">14:00 - 15:00</div>
				<br/>QUEER QUARTER <span class="normal">with <b>DJ Sandz</b></span><br/>
				<strong>Some information about this show will go here!</strong>
				</a>
				<a href="#" class="button large schedbit yellow">
				<span class="when">on later</span><div class="coltime">15:00 - 20:00</div>
				<br/>FLUXATHON <span class="normal">with <b>Deejay Flux</b></span><br/>
				<strong>Some information about this show will go here!</strong>
				</a>
				<a href="#" class="button large schedbit violet">
				<span class="when">on tomorrow</span><div class="coltime">14:00 - 15:00</div>
				<br/>SOMESORT OF SHOW <span class="normal">with <b>DJ Whatshisface</b></span><br/>
				<strong>Some information about this show will go here!</strong>
				</a>
			</div>

			<div class="col1" id='shouter'>
			<?php include 'shout.php'; ?>
			</div>


<div class="bar1">
			<a href="#" class="button"><script type='text/javascript' src='../jwplayer.js'></script>
 
<div id='mediaspace'></div>
 
<script type='text/javascript'>
  jwplayer('mediaspace').setup({
    'flashplayer': '../player.swf',
    'backcolor': '#282828',
    'frontcolor': '#ffffff',
    'lightcolor': '#FF7E00',
    'streamer': 'rtmp://hodtv.net/hodtv_live/_definst_/',
    'file': 'live.sdp',
    'dock': 'true',
    'autostart': 'true',
    'icons': 'false',
    'stretching': 'exactfit',
    'width': '200',
    'height': '150'
  });
</script></a>
</div>

</div>		
	</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
