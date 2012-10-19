<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>

<link href="../resident-area/css/main.css" rel="stylesheet" type="text/css" />
<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/jquery.cookie.js"></script>
<script type="text/javascript" src="lib/custom.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<?php include 'config.php'; require_once('auth.php'); 
$djname = $_SESSION['SESS_DJ_NAME'];
date_default_timezone_set('Europe/London');
$day = $_GET['day']; // Get selected day
$Cday = date('l'); //  Get current day
$Chour = date('H'); // Get current hour
$Cslot = 'slot'.$Chour;
$result = mysql_query("SELECT * FROM ra2_users WHERE djname='$djname'");
while($row = mysql_fetch_array($result)) {
	$djname = $row['djname'];
	$userID = $row['userID'];
	$location = $row['location'];
	$info = $row['info'];
	$style = $row['style'];
	$rank = $row['rank'];
	$facebook = $row['facebook'];
	$twitter = $row['twitter'];
	$stickam = $row['stickam'];
	$website = $row['website'];
	// image check
	$imagecheck1 = str_replace (" ", "", $djname);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$image = str_replace ("-", "", $imagecheck2);
//
}
$result = mysql_query("SELECT * FROM ra2_shows WHERE userID='$userID'");
while($row = mysql_fetch_array($result)) {
	$show = $row['name'];
	$showID = $row['showID'];
	$info = $row['info'];
}
$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday' AND $Chour='$showID'");
while($row = mysql_fetch_array($result)) {
	$SLOT = 'yes';
}
if ($SLOT != 'yes') {}

$timeout = $userID * date(i);
$log = $_GET['log'];
if ($log != null){
	mysql_query("UPDATE ra2_livefeed SET userID='$log', start='$starttime', end='$endtime', showID='$showID', timeout='$timeout' WHERE status='wait'");
	header ('Location: golive.php');
}

$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
	while($row = mysql_fetch_array($result)) {
		$LuserID = $row['userID'];
		$LshowID = $row['showID'];
		$Linfo = $row['info'];
		$Lstart = $row['start'];
		$Lend = $row['end'];
		$timeout = $row['timeout'];
	}

$match_timeout = $LuserID * date(i);
	if ($timeout != $match_timeout || $timeout != 0) {
	mysql_query("UPDATE ra2_livefeed 
				SET timeout='',
				start='',
				end='',
				userID='',
				adhocID='',
				showID=''
				WHERE status='live'");
	}
	if ($LuserID == null || $userID == $LuserID) {
		$GOLIVE = '<a href="thestudio.php?log='.$userID.'"><div class="button" name="demo">Go Live</div></a>';
	}
$action = 'wait';
?>
<script type="text/javascript">
 $(document).ready(function() {
 	 $("#timeout").load("timeout.php");
   var refreshId = setInterval(function() {
      $("#timeout").load('timeout.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
</script>
</head>

<body id="dashboard">
<span id="timeout"><?php include 'timeout.php'; ?></span>
<div id="siteAlign">
	<div id="container">
		<div id="page">

		<div class="infobox" id="top">
			<h1><b>GO</b> LIVE</h1><br/>
			<p>Before you go live please confirm the following details...</p>
		</div>
		<div class="infobox" id="form">
		<h2>SCHEDULE <b>MODE</b></h2>
			<form id="stylized" class="myform">
			<label>Show Name</label>
			<input name="showname" value="<?php echo $show; ?>" readonly="readonly" />
			<label>Hosted by</label>
			<input name="host" value="<?php echo $djname; ?>" readonly="readonly" />
			<label>Start Time</label>
			<input name="start" value="<?php echo $start; ?>" readonly="readonly" />
			<label>End Time</label>
			<input name="end" value="<?php echo $end; ?>" readonly="readonly" />
			<label>Show Info</label>
			<textarea name="info" readonly="readonly"><?php echo $info; ?></textarea>
			<?php echo $GOLIVE; ?>
			</form>
		</div>
		<div class="infobox" id="displayarea">
			<h2>DISPLAY <b>CHECKER</b></h2>
			<br/>
			<div id="liveBoard">
				<div id="live">
					<b>&laquo;LIVE NOW</b>
					<div class="onTime">14:00 - 15:00</div>
					<div class="showInfo">
							<a href="#">
								<div id="onImage" style="background: url(images/residents/<?php echo strtolower($image); ?>.gif) center;"></div>
							</a>
						<h4><a href="#"><?php echo strtoupper($show); ?></a></h4> with 
						<a href="#"><?php echo $djname; ?></a>
						<span><?php echo $info; ?></span>
						<a href="#">
							<div class="button">Shout Out!</div>
						</a>
						<a href="#">
							<div class="button">Send Love &hearts;!</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="infobox" id="instudio">
			<h1><b>IN</b> STUDIO</h1>
			<p></p>
		</div>

		</div>
	</div>
</div>
</body>
</html>
