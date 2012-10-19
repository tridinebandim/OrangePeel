<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD | Non-Stop Music 24/7</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/playlist.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
<?php include 'google.txt'; ?>
</head>

<body id="playlist">
<div id="fixTop">
	<h1>PLAY<b>LISTS</b></h1>
	<!--<h2><a href="#">Send a Shoutout!</a></h2>-->
	
<!--	
	
		<div id="menu">
		<?php
		include 'resident-area/config.php';
        $result = mysql_query("SELECT * FROM ra2_playlists");
			while($row = mysql_fetch_array($result)) {
				$listName = $row['name'];
				$listID = $row['listID'];
				$selected = $_GET['listID'];
				if ($selected == $listID) {$active = 'active';}
			echo '<a href="?listID='.$listID.'"><div class="list" id="'.$selected.'">'.$listName.'</div></a>';
			}
		?></div>
</div>

<div id="container">

<?php 
include 'resident-area/config.php';
$listID = $_GET['listID'];
if ($listID == null) {$listID = 1;}
$currentstamp = date('YmdHi');
$result = mysql_query("SELECT * FROM ra2_tracks WHERE listID='$listID'");
	while($row = mysql_fetch_array($result)) {
		$title = $row['title'];
		$artist = $row['artist'];
		// add plus ready for youtube links
		$titleLink = str_replace (" ", "+", $title);
		$artistLink = str_replace (" ", "+", $artist);
		// work out if its a new track
		$timestamp = $row['timestamp'];
		$newtrack = $currentstamp - $timestamp;
		if ($newtrack <= 140000) {$new = '<div class="info">new</div>';} // 140000 = 14 days
		// display tracks
		echo '
			<a href="http://www.youtube.com/results?search_query='.$artistLink.'+'.$titleLink.'" target="_blank">
				<div class="item">
					'.$new.'
					<div class="name">
						'.$title.'
						<br/><b>
						'.$artist.'
						</b>
					</div>
				</div>
			</a>
';
}
?>
</div>
-->
<div style="width: 100%; padding-top: 60px; text-align: center; float: left;">
<img src="images/coming-soon.png" alt="Playlists coming soon" />
<br/><br/>
Heard a good track on the station and wondered what it is? 
<br/>
Weekly updated playlists are soon to be a feature on HoD Radio for the first time.
</div>


</body>
</html>
