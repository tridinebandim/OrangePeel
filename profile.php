<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD | Liquidice</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/profile.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
<?php include 'google.txt'; ?>
</head>
<body id="schedule">
<?php 
include 'resident-area/config.php';
$djname = $_GET['dj'];
$result = mysql_query("SELECT * FROM ra2_users WHERE djname='$djname'");
while($row = mysql_fetch_array($result)) {
	$imagecheck1 = str_replace (" ", "", $djname);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$image = str_replace ("-", "", $imagecheck2);
	$location = $row['location'];
	$info = $row['info'];
	$style = $row['style'];
	$facebook = $row['facebook'];
	$twitter = $row['twitter'];
	$stickam = $row['stickam'];
	$website = $row['website'];
}

if ($facebook != null) {
	$facebookDisplay = '
	<a href="http://www.facebook.com/'.$facebook.'" target="_blank">
		<div id="facebook">
			Facebook
		</div>
	</a>';
}
if ($twitter != null) {
	$twitterDisplay = '
	<a href="http://www.twitter.com/'.$twitter.'" target="_blank">
		<div id="twitter">
			Twitter
		</div>
	</a>';
}
if ($stickam != null) {
	$stickamDisplay = '
	<a href="http://www.youtube.com/'.$stickam.'" target="_blank">
		<div id="youtube">
			Youtube
		</div>
	</a>';
}
if ($website != null) {
	$websiteDisplay = '
	<a href="http://'.$website.'" target="_blank">
		<div class="button">
			Website
		</div>
	</a>';
}

?>
<h1>RESIDENT <b>DJ</b></h1>
<a href="#" onclick='window.parent.Shadowbox.close();'><div id="close">&times; Close</div></a>
<div id="container">
<div id="image"><img src="resident-area/images/residents/<?php echo strtolower ($image); ?>.gif"/></div>
<div id="name"><?php echo $djname; ?></div>
<div id="location"><?php echo $location; ?></div>
<div id="styles"><?php echo $style; ?></div>
<div id="info"><?php echo $info; ?></div>
<div id="links">

			<?php echo $facebookDisplay; ?>
			<?php echo $twitterDisplay; ?>
			<?php echo $stickamDisplay; ?>
			<?php echo $websiteDisplay; ?>
			
</div>
</div>

</body>
</html>
