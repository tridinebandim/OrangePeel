<?php

include 'config.php'; require_once('auth.php');
date_default_timezone_set('Europe/London');
$time = date('Hi');
$djname = $_SESSION['SESS_DJ_NAME'];
$result = mysql_query("SELECT * FROM ra2_users WHERE djname='$djname'");
while($row = mysql_fetch_array($result)) {
	$userID = $row['userID'];
}
$result = mysql_query("SELECT * FROM ra2_shows WHERE userID='$userID'");
while($row = mysql_fetch_array($result)) {
	$showID = $row['showID'];
}
if ($showID == null) {
	$showID = 111;
}

// Get info
$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
	while($row = mysql_fetch_array($result)) {
		$liveDJID = $row['userID'];
		$timeout = $row['timeout'];
	}
$match_timeout = $liveDJID * date(i);
	if ($timeout != $match_timeout) {
	mysql_query("UPDATE ra2_livefeed 
				SET timeout='',
				userID=''
				WHERE status='live'");
	}
else {
$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$liveDJID'");
	while($row = mysql_fetch_array($result)) {
	$liveDJ = $row['djname'];
}
$result = mysql_query("SELECT * FROM ra2_shows WHERE userID='$liveDJID'");
while($row = mysql_fetch_array($result)) {
	$LiveShow = $row['name'];
	
}
if ($showID == 111) {$LiveShow = 'Unscheduled Live Mix';}
if ($liveDJID != null) {
	$studioStatus = '<b>ON AIR</b> <strong>'.$LiveShow.'</strong><br/>with '.$liveDJ;
	$liveActive = 'off';
}
else {
	$studioStatus = '<b>ON AIR</b> Auto Playlist';
	$liveActive = 'on';
}
}
echo '
	<div id="inStudio">
		'.$studioStatus.'
	</div>
	';
if ($liveActive == 'on') {echo '
	<a href="thestudio.php?log='.$userID.'&show='.$showID.'" 
		onclick="openWindow(this.href);
		this.blur();
		return false;">
	<div class="buttons" id="GoLive">
		Enter the Studio
	</div></a>
';}

?>