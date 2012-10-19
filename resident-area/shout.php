
<?php 
include 'config.php';
require_once('auth.php');
date_default_timezone_set('Europe/London');
$timestamp = date('YmdHi');
$userID = $_SESSION['SESS_USER_ID'];
$result = mysql_query("SELECT * FROM ra2_shouts WHERE userID='$userID' ORDER BY shoutID DESC");
while($row = mysql_fetch_array($result)) {
	$Sname = $row['name'];
	$Slocation = $row['location'];
	$Sshout = $row['shout'];
	$hide = $row['hide'];
	$Sip = $row['ip'];
	$Stimestamp = $row['timestamp'];
	$hourstamp = substr($Stimestamp, -4, 2);
	$minstamp = substr($Stimestamp, -2, 2);
	$displaytime = $timestamp - $Stimestamp;
		if ($hide != 'unpop') {
			$triggershout = 'pop'; 
			$command = '&bull;';
			$action = 'unpop';
		}
		else {
			$triggershout = '';
			$command = '&times;';
			$action = 'yes';
		}
	if ($hide != 'yes' && $Sshout != 'LOVE') {
	
	echo '
	<div class="infobox shoutout end '.$triggershout.'">
			<h6> <a href="?shouttime='.$Stimestamp.'&shoutip='.$Sip.'&shouthide='.$action.'">'.$command.'</a></h6>
			<div class="qus">Name:</div><div class="ans">'.$Sname.'</div>
			<div class="qus">Location:</div><div class="ans">'.$Slocation.'</div>
			<div class="qus">Message:</div><div class="ans">
			'.$Sshout.'
			</div>
		</div>
	';
	
	
	
	/*
	echo '<a href="?shouttime='.$Stimestamp.'&shoutip='.$Sip.'&shouthide=yes" class="button large '.$triggershout.' shoutbit"><div class="shoutclose">&times;</div>';
	echo '<div class="shoutqus">Name:</div><div class="shoutit">'.$Sname.'</div>';
	echo '<div class="shoutqus">Location:</div><div class="shoutit">'.$Slocation.'</div>';
	echo '<div class="shoutqus">Shout:</div><div class="shoutit">'.$Sshout.'</div>';
	echo '<div class="shoutqusDs">From</div><div class="shoutip">'.$Sip.'</div>';
	echo '<div class="shoutqusD">@</div><div class="shouttime">'.$hourstamp.':'.$minstamp.'</div></a>';
	*/
	
	}
}
?>
