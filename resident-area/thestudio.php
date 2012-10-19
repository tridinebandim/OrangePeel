<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Resident Area | The Studio</title>

<link href="../resident-area/css/main.css" rel="stylesheet" type="text/css" />
<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="lib/notifications.css" />
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/jquery.cookie.js"></script>
<script type="text/javascript" src="lib/custom.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
 	 $("#loveRefresh").load("love.php");
   var refreshId = setInterval(function() {
      $("#loveRefresh").load('love.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});
 $(document).ready(function() {
 	 $("#shoutRefresh").load("shoutcount.php");
   var refreshId = setInterval(function() {
      $("#shoutRefresh").load('shoutcount.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});
 $(document).ready(function() {
 	 $("#shout-out").load("shout.php");
   var refreshId = setInterval(function() {
      $("#shout-out").load('shout.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});
 $(document).ready(function() {
 	 $("#timeout").load("timeout.php");
   var refreshId = setInterval(function() {
      $("#timeout").load('timeout.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
 $(document).ready(function() {
 	 $("#GMTrefresh").load("GMT.php");
   var refreshId = setInterval(function() {
      $("#GMTrefresh").load('GMT.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
		// <![CDATA[
			function openWindow2(url,width,height,options,name) {
				width = width ? width : 800;
				height = height ? height : 600;
				options = options ? options : 'resizable=yes';
				name = name ? name : 'openWindow2';
				window.open(
					url,
					name,
					'screenX='+(screen.width-width)/2+',screenY='+(screen.height-height)/2+',width='+width+',height='+height+','+options
				)
			}
		// ]]>


</script>

<?php include 'config.php'; require_once('auth.php'); 
date_default_timezone_set('Europe/London');
$day = $_GET['day']; // Get selected day
$Cday = date('l'); //  Get current day
$Chour = date('H'); // Get current hour
$starttime = date('Hi'); // Get current hour and minute
$Cslot = 'slot'.$Chour;
$djname = $_SESSION['SESS_DJ_NAME'];
//$endtime = $starttime + '100';

$result = mysql_query("SELECT * FROM ra2_users WHERE djname='$djname'");
while($row = mysql_fetch_array($result)) {
	$image = str_replace (" ", "", $djname);
	$djname = $row['djname'];
	$userID = $row['userID'];
	$location = $row['location'];
	$info = $row['info'];
	$style = $row['style'];
	$rank = $row['rank'];
	$facebook = $row['facebook'];
	$twitter = $row['twitter'];
	$stickam = $row['stickam'];
	$website = $row['website'];
}

$result = mysql_query("SELECT * FROM ra2_shows WHERE userID='$userID'");
while($row = mysql_fetch_array($result)) {
	$show = $row['name'];
	$showID = $row['showID'];
}

if ($showID == null) {
	$showID = 111;
	$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
	while($row = mysql_fetch_array($result)) {
	$show = $row['name'];
	$showID = $row['showID'];
}

}

$result = mysql_query("SELECT * FROM ra2_schedule");
while($row = mysql_fetch_array($result)) {
	$noSlots = $row['COUNT($day)'];
}

$log = $_GET['log'];
if ($log != null){
	mysql_query("UPDATE ra2_livefeed SET userID='$log', start='$starttime', end='$endtime', showID='$showID' WHERE status='live'");
	mysql_query("UPDATE ra2_livefeed SET userID='', start='', end='', showID='' WHERE status='wait'");
	header ('Location: thestudio.php');
}

$result = mysql_query("SELECT * FROM ra2_shouts WHERE shout='LOVE' ORDER BY shoutID DESC LIMIT 1");
while($row = mysql_fetch_array($result)) {
		$lovetime = $row['timestamp'];
		$loveip = $row['ip'];
}
$lovehide = $_GET['lovehide'];
if ($lovehide == 'yes') {
	mysql_query("UPDATE ra2_shouts SET hide='yes' WHERE timestamp='$lovetime' AND ip='$loveip'");
	header('Location: thestudio.php');
}
$shoutip = $_GET['shoutip'];
$shouttime = $_GET['shouttime'];
$shouthide = $_GET['shouthide'];
if ($shouthide == 'yes') {
	mysql_query("UPDATE ra2_shouts SET hide='yes' WHERE timestamp='$shouttime' AND ip='$shoutip'");
	header('Location: thestudio.php');
}
if ($shouthide == 'unpop') {
	mysql_query("UPDATE ra2_shouts SET hide='unpop' WHERE timestamp='$shouttime' AND ip='$shoutip'");
	header('Location: thestudio.php');
}
$action = $_GET['action'];
if ($action == 'offair') {
	include 'config.php';
	mysql_query("UPDATE ra2_livefeed SET userID='' WHERE status='live'");
	echo '<script>window.close();</script>';
	//header('Location: thestudio.php');
}

		
	// on next stuffage
function showDisplay ($slotNO) {
	$Chour = date('H');
	$Bhour = $Chour - 1;
if ($slotNO == $Bhour) {
	// Set the correct day by number
	$Cday = date('N'); //  Get current day
	// Get prev, current and next slot IDs
	$prevSlot = $slotNO - 1;
	$prevSlot = 'slot'.$prevSlot;
	$nextSlot = $slotNO + 1;
	$nextSlot = 'slot'.$nextSlot;
	$currSlot = $slotNO;
	$currSlot = 'slot'.$slotNO;
	// GET CURRENT SLOT SHOW ID
	$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday'");
	while($row = mysql_fetch_array($result)) {
		$prevshowID = $row[$prevSlot];
		$showID = $row[$currSlot];
		$nextshowID = $row[$nextSlot];
		$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
			while($row = mysql_fetch_array($result)) {
			$showName = $row['name'];
			$showInfo = $row['info'];
			$userID = $row['userID'];
			$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$userID'");
				while($row = mysql_fetch_array($result)) {
				$userName = $row['djname'];
				}
			}
	}
	// Show TIMES
	$startTime = $slotNO;
	$endTime = $slotNO + 1;
	// ADD SLOTS TOGETHER
	if ($prevshowID == $showID) {
		$startTime = $startTime - 1;
	}
	// ADD A ZERO TO ONE DIGIT NUMBERS
	$startNO = strlen($startTime);
	$endNO = strlen($endTime);
	if ($startNO == 1) {$startTime = '0'.$startTime;}
	if ($endNO == 1) {$endTime = '0'.$endTime;}
	// MIDNIGHT TIME FIX
	if ($endTime == '24') {
		$endTime = '00';	
	}
	$Chour = date('H'); // Get current hour
	$Cday = date('N'); //  Get current day
	// If next show is same dont display
	if ($showID == $nextshowID) {}
	elseif ($showID == $prevousID) {}
	elseif ($showID != null) {
	// DISPLAY AREA
	echo '
		<div class="infobox whatson">
			<h6>on before</h6>
			<b>'.$showName.'</b> with '.$userName.'</b>
			<p>'.$showInfo.'</p>
		</div>
	';
	//////////////////
	}

}	
		/*<div class="infobox whatson">
			<h6>on before</h6>
			<b>Name of big long Show</b> with liquidice<br/>
			<p>Some info about this show for you to say</p>
		</div>
		<div class="infobox whatson">
			<h6>on next</h6>
			<b>Name of big long Show</b> with liquidice<br/>
			<p>Some info about this show for you to say</p>
		</div>
		<div class="infobox whatson endbot">
			<h6>on later</h6>
			<b>Name of big long Show</b> with liquidice<br/>
			<p>Some info about this show for you to say</p>
		</div>*/ 
}		
		
		
?>
</head>

<body id="dashboard" onLoad="show_clock()">
<span id="timeout"><?php if ($action != 'offair') {include 'timeout.php';} ?></span>
<div id="siteAlign">
	<div id="container">
		<div id="page">

		<div class="infobox" id="top">
			<h1><b>THE</b> STUDIO</h1>
			<!--<div class="buttons gooff">GO OFF AIR</div>-->
			<p id="intro">Can all DJs please remember to hit "OFF AIR" at the end of there shows.</p>
		</div>
		<!-- SHOW INFO -->
		<div class="infobox show" id="top">
			<h1 id="toph1"><b><?php echo strtoupper($show); ?></b><br/> with <?php echo $djname; ?></h1>
		</div>
		<!-- WORLD TIME -->
		<div class="infobox time" id="GMTrefresh">
			<?php include 'GMT.php'; ?>
		</div>
		<div class="infobox time">
			<b>LOCAL</b><br/>
			<script language="javascript" src="js/liveclock.js"></script>
		</div>
		<!-- SHOW TIME -->
		<div class="infobox time">
			<!--
			<b>LEFT</b><br/>
			<?php 
				// grab current time
				$time = new DateTime('now', new DateTimeZone('GMT-1'));
				$currenttime = $time->format('H:i');
				// dummy time set
				//$currenttime = '1315';
				$endtime = '2100';
				// seperate hours from mins
				$endhour = substr($endtime, -4, 2);
				$endmin = substr($endtime, -2, 2);
				$curhour = substr($currenttime, -4, 2);
				$curmin = substr($currenttime, -2, 2);
				// calculate time left
				$hourleft = $endhour - $curhour;
				$minleft = $curmin - $endmin;
				// add zeros to single digits
				$counthourleft = strlen($hourleft);
				$countminleft = strlen($minleft);
				if ($counthourleft == 1) {$hourleft = '0'.$hourleft;}
				if ($countminleft == 1) {$minleft = '0'.$minleft;}
				// if negative, don't show
				if ($hourleft < 0 || $minleft < 0) {
					$hourleft = '00';
					$minleft = '00';
				}
				// join together hour and mins
				$timeleft = $hourleft.':'.$minleft;
				// post
				echo $timeleft;

			?>
		-->
		</div>
		<div class="infobox time">
			<!--
			<b>END</b><br/>
			<?php 
				echo $endhour.':'.$endmin;
			?>
			-->
		</div>
		<!-- SPACER -->
		<div class="infobox spacer"></div>
		<!-- LOVE -->
		<div id='loveRefresh'>
			<?php include 'love.php'; ?>
		</div>
		<!-- SHOUT -->
		<div id='shoutRefresh'>
			<?php include 'shoutcount.php'; ?>
		</div>
		<!-- WHATS ON -->
	<div id='whats-on'>
	<div class="infobox whatson statinfo">
			<h6>Station Info</h6>
			<b>New Rules</b> please take note<br/>
			<p>Make sure you have read the new broadcasting rules over on the <strong>Resident Area</strong> home page.
			It is important you start to follow these rules as they will be heavily enforced from <strong>01/01/2012</strong>.</p>
		</div>

	<?php
showDisplay (0);
showDisplay (1);
showDisplay (2);
showDisplay (3);
showDisplay (4);
showDisplay (5);
showDisplay (6);
showDisplay (7);
showDisplay (8);
showDisplay (9);
showDisplay (10);
showDisplay (11);
showDisplay (12);
showDisplay (13);
showDisplay (14);
showDisplay (15);
showDisplay (16);
showDisplay (17);
showDisplay (18);
showDisplay (19);
showDisplay (20);
showDisplay (21);
showDisplay (22);
showDisplay (23);
?>	
<!--
	<div class="infobox whatson">
			<h6>on before</h6>
			<b>Fluxathon</b> with Deejay Flux<br/>
			<p>A 10 hour mixing session from HoD HQ</p>
		</div>
		<div class="infobox whatson">
			<h6>on next</h6>
			<b>Old Skool Dayz</b> with liquidice<br/>
			<p>The tunes you thought you'd never hear again.</p>
		</div>
		<div class="infobox whatson endbot">
			<h6>on later</h6>
			<b>Public House</b> with DJ Sandz<br/>
			<p>The freshest commerical House in town.</p>
		</div>	
-->	
		
		
	</div>
		<!-- SHOUT OUTS -->
	<div id="shout-out">
		<?php include 'shout.php'; ?>
	</div>
	<a class="studiobutton" href="../asylum/chat/" onclick="openWindow2(this.href);this.blur();return false;">
		<div class="buttons">Launch ChatRoom</div>
	</a>
	<a class="studiobutton" href="?action=offair">
		<div class="buttons offair">OFF AIR</div>
	</a>
	<mark>The Studio v<?php echo $version; ?></mark>
	
		</div>
		</div>
	</div>
</div>
</body>
</html>
