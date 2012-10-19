<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>Shout Out!</title>

<link href="../css/forms.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
</head>
<?php
include '../resident-area/config.php';
$action = $_GET['action'];
date_default_timezone_set('Europe/London');
$name = $_POST['name'];
$location = $_POST['location'];
$shout = $_POST['shout'];
$timestamp = date('YmdHi');
$ip = @$REMOTE_ADDR;

if ($action == 'post'){
	$result = mysql_query("SELECT * FROM ra2_shouts ORDER BY shoutID DESC LIMIT 1");
	while($row = mysql_fetch_array($result)) {
			$Sip = $row['ip'];
			$Stimestamp = $row['timestamp'];
	}
	$nameCOUNT = strlen($name);
	$shoutCOUNT = strlen($shout);
	if ($Sip == $ip) {
		$postControl = $timestamp - $Stimestamp;
		if ($postControl <= 1) {
			$postOK = 'no';
			header('Location: shout-sorry.php');
		}
		}	
	if ($nameCOUNT <= 1 && $shoutCOUNT <= 3) {$nameERROR = 'error'; $shoutERROR = 'error';}
			elseif ($nameCOUNT <= 1){$nameERROR = 'error';}
			elseif ($shoutCOUNT <= 3) {$shoutERROR = 'error';}
			elseif ($postOK != 'no') {$postOK = 'yes';}
	if ($postOK == 'yes'){
	// get live dj
		$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
		while($row = mysql_fetch_array($result)) {
		$userID = $row['userID'];
		}
		mysql_query("INSERT INTO ra2_shouts (userID, ip, timestamp, name, location, shout, hide)
		VALUES ('$userID', '$ip', '$timestamp', '$name', '$location', '$shout', 'no')");
		header('Location: shout-thanks.php');
	}
}

?>


<body>
		<div id="stylized" class="myform">
		<form action="../forms/shout-form.php?action=post" method="post">
			<h1><b>SHOUT</b> BOX</h1>
			<p>Get in touch with the current live resident and send your shout straight into the studio!</p>

			<label>Alias
				<span class="small">What's your name?</span>
			</label>
			<input type="text" name="name" id="name" maxlength="27" value="<?php echo $name; ?>" class="<?php echo $nameERROR; ?>" />

			<label>Location
				<span class="small">Where are you?</span>
			</label>
			<input type="text" name="location" id="location" maxlength="27" value="<?php echo $location; ?>" />

			<label>Comment
				<span class="small">What's your shout?</span>
			</label>
			<textarea type="text" name="shout" id="comment" maxlength="100" class="<?php echo $shoutERROR; ?>" ><?php echo $shout; ?></textarea>

			<button type="submit">Send Shout</button><a href="#" onclick='window.parent.Shadowbox.close();'><div id="close">&times; Close</div></a>
		</form>
</div>
</body>
</html>
