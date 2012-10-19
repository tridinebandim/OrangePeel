<?php 
include 'config.php';
require_once('auth.php'); 
// GET OVERALL LOVE
$loveAmount = 0;
date_default_timezone_set('Europe/London');
$timestamp = date('YmdHi');
$userID = $_SESSION['SESS_USER_ID'];
$result = mysql_query("SELECT shout FROM ra2_shouts WHERE shout='LOVE' AND userID='$userID'");
while($row = mysql_fetch_array($result)) {
		$loveAmount ++;		
}
$result = mysql_query("SELECT * FROM ra2_shouts WHERE shout='LOVE' ORDER BY shoutID DESC LIMIT 1");
while($row = mysql_fetch_array($result)) {
		$lovetime = $row['timestamp'];
		$hide = $row['hide'];
		$ip = $row['ip'];
}
$displaytime = $timestamp - $lovetime;
		if ($displaytime <= 1 && $hide != 'yes') {$triggerlove = 'pop';}
		else {$triggerlove = '';}
		
echo'
<a href="?lovehide=yes">
	<div class="infobox love '.$triggerlove.'">
		<b>LOVE</b><br/>
		<small>&hearts;</small>'.$loveAmount.'
	</div>
</a>
	<div class="infobox love">
		<!--<b>ALL</b><br/>
		<small>&hearts;</small>'.$loveAmount.'-->
	</div>
';

?>