<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD Shout!</title>
<link href="../css/forms.css" rel="stylesheet" type="text/css" />

</head>
<?php
include '../resident-area/config.php';
$ip = @$REMOTE_ADDR;
$result = mysql_query("SELECT * FROM ra2_shouts ORDER BY shoutID DESC LIMIT 1");
	while($row = mysql_fetch_array($result)) {
			$Sname = $row['name'];
			$Slocation = $row['location'];
			$Sshout = $row['shout'];
			$Sip = $row['ip'];
	}
if ($Sip == $ip) {
	$showName = $Sname;
	$showLocation = $Slocation;
	$showShout = $Sshout;
}
else {
	$showName = 'Woops...';
	$showLocation = 'Something went a little wrong...';
	$showShout = 'Try sending your shout out again. That might do the trick! Sorry';
}

?>
<body>
		<div id="stylized" class="myform">
		<div id="thanks">
			<h1><b>SHOUT</b> SENT</h1>
			<p>Your shoutout has just zapped across the interwebs and landed in the studio, this is what the DJ received:</p>
			
			<form >
			<label>Alias
			</label>
			<input type="text" name="name" id="name" readonly="readonly" value="<?php echo $showName; ?>" />

			<label>Location
			</label>
			<input type="text" name="location" id="location" readonly="readonly" value="<?php echo $showLocation; ?>" />

			<label>Comment
			</label>
			
			<textarea type="text" name="comment" id="comment" readonly="readonly" ><?php echo $showShout; ?></textarea
			div></form>
		<a href="#" onclick='window.parent.Shadowbox.close();'><div id="close">&times; Close</div></a>
		
		
</div>
</body>
</html>
