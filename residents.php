<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD | Non-Stop Music 24/7</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/residents.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>


<?php 
include 'resident-area/config.php';
echo "<script>
var nam = [
'',";
$result = mysql_query("SELECT * FROM ra2_users WHERE active='yes' ORDER BY userID ASC");
while($row = mysql_fetch_array($result)) {
	$djname = $row['djname'];
	$djname = strtoupper ($djname);
	echo "'".$djname."',";}
echo "];
function rollover(n) {
document.getElementById('djname').innerHTML = nam[n];} 
</script>";
?>

<?php include 'google.txt'; ?>
</head>

<body id="schedule">
<div id="fixTop">
	<h1>RESIDENT <b>DJS</b></h1>
		<!--<a href="forms/shout-form.html" rel="shadowbox;height=310px;width=392px;">
			<div class="button">Send Shoutout to Studio!</div>
		</a>-->
	<h2><div id="djname"></div></h2>
		<div id="menu"></div>
</div>

<div id="container">

	
<?php 
include 'resident-area/config.php';
// WHO IS LIVE
date_default_timezone_set('Europe/London');
$time = date('Hi');
// Get info
$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
	while($row = mysql_fetch_array($result)) {
		$liveID = $row['userID'];
		$start = $row['start'];
		$end = $row['end'];
	}
// Work out times
$liveTime = $time - $start; // Negetive result = NOT LIVE
$endTime = $end - $time; // Negetive result = NOT LIVE
if ($liveTime < 0) {
	$live = 'no';
}
elseif ($endTime < 0) {
	$live = 'no';
}
else {
	$live = 'yes';
}
//////////////////////
$rollover = 0;
//$live = 'onNow';
$result = mysql_query("SELECT * FROM ra2_users WHERE active='yes' ORDER BY userID ASC");
while($row = mysql_fetch_array($result)) {
	$djname = $row['djname'];
	$ID = $row['userID'];
	$rollover ++;
	$starthour = substr($start, -4, 2);
	$Chour = date('H'); // Get current hour
	if ($liveID == $ID) {$live = 'onNow';}
	else {$live = 'no';}
	
	$imagecheck1 = str_replace (" ", "", $djname);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$image = str_replace ("-", "", $imagecheck2);
	echo '<div class="djBox" id="'.$live.'" >';
	echo '<span onMouseOver="rollover('.$rollover.')" onMouseOut="rollover(0)">';
	echo '<a href="profile.php?dj='.$djname.'" rel="shadowbox;height=235px;width=570px;">';
	echo '<div class="image" style="background: url(resident-area/images/residents/'.strtolower ($image).'.gif) center;"></div>';
	echo '</a></span></div>';
	}
?>

</div>

</body>
</html>
