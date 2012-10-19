<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>Send some love!</title>

<link href="../css/forms.css" rel="stylesheet" type="text/css" />

</head>
<?php
include '../resident-area/config.php';
date_default_timezone_set('Europe/London');
$timestamp = date('YmdHi');
$ip = @$REMOTE_ADDR;

$result = mysql_query("SELECT * FROM ra2_shouts ORDER BY shoutID DESC LIMIT 1");
while($row = mysql_fetch_array($result)) {
		$Sip = $row['ip'];
		$Stimestamp = $row['timestamp'];
}

if ($Sip == $ip) {
	$postControl = $timestamp - $Stimestamp;
	if ($postControl <= 1) {
		$postOK == 'no';
		$message = '<b>SORRY</b>You have already sent some love or a shout. Try again in a few minutes.<br/><br/><a href="#" onclick="window.parent.Shadowbox.close();"><div id="close">&times; Close</div></a>';
	}else {$postOK = 'yes';}
}else {$postOK = 'yes';}
if ($postOK == 'yes'){
//get live dj
	$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
		while($row = mysql_fetch_array($result)) {
		$userID = $row['userID'];
		}

	mysql_query("INSERT INTO ra2_shouts (userID, ip, timestamp, name, location, shout)
	VALUES ('$userID', '$ip', '$timestamp', 'n/a', 'n/a', 'LOVE')");
	$message = '<div id="love">&hearts;</div>
	<script type="text/javascript">
	setTimeout("window.parent.Shadowbox.close()", 3000);
	</script>';
}

?>


<body>
<div id="loveBox">
		<?php echo $message; ?>
</div>
</body>
</html>
