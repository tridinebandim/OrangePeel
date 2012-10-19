<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD | Non-Stop Music 24/7</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/schedule.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript">
Shadowbox.init();
</script>
<?php include 'google.txt'; ?>
</head>
<?php
include 'resident-area/config.php';
date_default_timezone_set('Europe/London');
$day = $_GET['day']; // Get selected day
$Cday = date('l'); //  Get current day
$Chour = date('H'); // Get current hour
// If no day is selected, redirect schedule to current day
if ($day == null) {$day = $Cday; header('Location: schedule.php?day='.$Cday.'');}
// set day on nav bar
if ($day == 'Sunday') {$sun = 'active'; $day = '0';}
elseif ($day == 'Monday') {$mon = 'active'; $day = '1';}
elseif ($day == 'Tuesday') {$tue = 'active'; $day = '2';}
elseif ($day == 'Wednesday') {$wed = 'active';$day = '3';}
elseif ($day == 'Thursday') {$thu = 'active'; $day = '4';}
elseif ($day == 'Friday') {$fri = 'active'; $day = '5';}
elseif ($day == 'Saturday') {$sat = 'active'; $day = '6';}
// get all shows for current selected day


	
function showDisplay ($slotNO) {
	// Set the correct day by number
	$day = $_GET['day'];
	if ($day == 'Sunday') {$day = '0';}
	elseif ($day == 'Monday') {$day = '1';}
	elseif ($day == 'Tuesday') {$day = '2';}
	elseif ($day == 'Wednesday') {$day = '3';}
	elseif ($day == 'Thursday') {$day = '4';}
	elseif ($day == 'Friday') {$day = '5';}
	elseif ($day == 'Saturday') {$day = '6';}
	// Get prev, current and next slot IDs
	$prevSlot = $slotNO - 1;
	$prevSlot = 'slot'.$prevSlot;
	$nextSlot = $slotNO + 1;
	$nextSlot = 'slot'.$nextSlot;
	$currSlot = $slotNO;
	$currSlot = 'slot'.$slotNO;
	// GET CURRENT SLOT SHOW ID
	$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$day'");
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
	// Set ORANGE if currently live
	$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
		while($row = mysql_fetch_array($result)) {
			$CshowID = $row['showID'];
			$start = $row['start'];
			$hostID = $row['userID'];
			$start = substr($start, -4, 2);
		}
	$Chour = date('H'); // Get current hour
	$Cday = date('N'); //  Get current day
	if ($hostID == $userID) {
		$active = 'onNow';
	}
	// Set image: remove spaces, dashes, bullet points and change to lowercase.
	$imagecheck1 = str_replace (" ", "", $userName);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$imagecheck3 = strtolower($imagecheck2);
	$image = str_replace ("-", "", $imagecheck3);
	// If next show is same dont display
	if ($showID == $nextshowID) {}
	elseif ($showID != null) {
	// DISPLAY AREA
	echo '
		<div class="showBox" id="'.$active.'">
			<div class="time">'.$startTime.':00 - '.$endTime.':00</div>
				<div class="image" style="background:url(resident-area/images/residents/'.$image.'.gif) center;"></div>
				<div class="name">
					'.$showName.'
					<br/><b>with <a href="profile.php?dj='.$userName.'" rel="shadowbox;height=235px;width=570px;">'.$userName.'</a></b>
				</div>
				<div class="info">
					'.$showInfo.'
				</div>
		</div>
	';
	//////////////////
	}

}

?>
<body id="schedule">
<div id="fixTop">
	<h1>WEEKLY <b>SCHEDULE</b></h1>
	<!--<h2><a href="#">Check out the Playlist</a></h2>-->
		<div id="menu">
			<a href="?day=Sunday"><div class="day" id="<?php echo $sun; ?>">Sunday</div></a>
			<a href="?day=Monday"><div class="day" id="<?php echo $mon; ?>">Monday</div></a>
			<a href="?day=Tuesday"><div class="day" id="<?php echo $tue; ?>">Tuesday</div></a>
			<a href="?day=Wednesday"><div class="day" id="<?php echo $wed; ?>">Wednesday</div></a>
			<a href="?day=Thursday"><div class="day" id="<?php echo $thu; ?>">Thursday</div></a>
			<a href="?day=Friday"><div class="day" id="<?php echo $fri; ?>">Friday</div></a>
			<a href="?day=Saturday"><div class="day" id="<?php echo $sat; ?>">Saturday</div></a>
		</div>
</div>
<div id="container">
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
</div>
<!--
<div id="container">
	<div class="showBox" id="<?php //echo $act0; ?>">
		<div class="time">00:00 - 12:00</div>
		<div class="image" style="background:url(http://static.stickam.com/media/image/converted/online/1755/1491/8/81ca95b0-7a98-11e0-b7cd-09bac2c4c26c.jpg) center;"></div>
		
		<a href="forms/shout-form.html" rel="shadowbox;height=306px;width=392px;">
		<div class="button">Send a Shoutout</div></a>
		
		<div class="name"><?php //echo $showname; ?><br/><b>with <a href="#"><?php// echo $djname; ?></a></b></div>
		<div class="info">
		<?php //echo $showinfo; ?> 
		</div>
	</div>
	-->

	

</div>

</body>
</html>
