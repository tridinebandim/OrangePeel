<?php 
include 'config.php';
require_once('auth.php'); 
// SHOUT COUNT
$shoutAmount = 0;
date_default_timezone_set('Europe/London');
$timestamp = date('YmdHi');
$userID = $_SESSION['SESS_USER_ID'];
$result = mysql_query("SELECT shout FROM ra2_shouts WHERE shout!='LOVE' AND userID='$userID'");
while($row = mysql_fetch_array($result)) {
		$shoutAmount ++;		
}
$result = mysql_query("SELECT * FROM ra2_shouts WHERE shout!='LOVE' ORDER BY shoutID DESC LIMIT 1");
while($row = mysql_fetch_array($result)) {
		$shouttime = $row['timestamp'];
		$hide = $row['hide'];
		$ip = $row['ip'];
}
		
		
echo'
	<div class="infobox time end">
			<b>SHOUT</b><br/>
			<small>#</small>'.$shoutAmount.'
		</div>


';

?>