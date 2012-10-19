<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/shadowbox.js"></script>
<link rel="stylesheet" href="../css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/jquery.cookie.js"></script>
<script type="text/javascript" src="lib/custom.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!--<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript">
		// <![CDATA[
			function openWindow(url,width,height,options,name) {
				width = width ? width : 800;
				height = height ? height : 600;
				options = options ? options : 'resizable=yes';
				name = name ? name : 'openWindow';
				window.open(
					url,
					name,
					'screenX='+(screen.width-width)/2+',screenY='+(screen.height-height)/2+',width='+width+',height='+height+','+options
				)
			}
		// ]]>
	</script>

<script>
$(document).ready(function() {
 	 $("#onair").load("onair.php");
   var refreshId = setInterval(function() {
      $("#onair").load('onair.php?randval='+ Math.random());
   }, 5000);
   $.ajaxSetup({ cache: false });
});
</script>

<?php include 'config.php'; require_once('auth.php'); 
$djname = $_SESSION['SESS_DJ_NAME'];
$result = mysql_query("SELECT * FROM ra2_users WHERE djname='$djname'");
while($row = mysql_fetch_array($result)) {
	$djname = $row['djname'];
	$userID = $row['userID'];
	$location = $row['location'];
	$info = $row['info'];
	$style = $row['style'];
	$rank = $row['rank'];
	$email = $row['email'];
	$facebook = $row['facebook'];
	$twitter = $row['twitter'];
	$stickam = $row['stickam'];
	$website = $row['website'];
	$imagecheck1 = str_replace (" ", "", $djname);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$image = str_replace ("-", "", $imagecheck2);
}
$result = mysql_query("SELECT * FROM ra2_shows WHERE userID='$userID'");
while($row = mysql_fetch_array($result)) {
	$show = $row['name'];
	$showID = $row['showID'];
}

// Link creater
$twitterlink = '<a href="http://www.twitter.com/'.$twitter.'" class="visit" target="_blank">View</a>';
$facebooklink = '<a href="http://www.facebook.com/'.$facebook.'" class="visit" target="_blank">View</a>';
$websitelink = '<a href="http://'.$website.'" class="visit" target="_blank">View</a>';
$youtubelink = '<a href="http://www.youtube.com/'.$stickam.'" class="visit" target="_blank">View</a>';
// if blank
if ($email == null) {$email = '<span style="color:red;">Valid Email Required!</span>';}
if ($twitter == null) {$twitterlink = 'Not Set';}
if ($stickam == null) {$youtubelink = 'Not Set';}
if ($facebook == null) {$facebooklink = 'Not Set';}
if ($website == null) {$websitelink = 'Not Set';}
?>
</head>

<body>
<div id="siteAlign">
<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
			<div id="leftCOL">
			
			<div class="infobox" id="news">
				<h1>Notice Board</h1>
				
<p>Welcome to the brand new HoD Radio Resident Area. If you have been a resident with us for a while then you would have been a little bit familiar with the v1.0, even if it was just for the one visit. v1.0 didn't really work out very well. The concept was great but the connection with the website and the DJs while broadcasting was poor to say the least. Cue v2.0!</p>
<p>Resident Area v2 is a completely new system built from the ground up. Completely bespoke to HoD Radio, the Resident Area v2 is not just a highly modified off the shelf content management system but a fully customisable and controllable tool for all our residents to use.</p>
<p><b>When you are about to go live</b> for your show, you can now log into the virtual studio. Doing this controls the HoD Radio website. It will promote your show live on the homepage as well as indicate you are currently live within the residents list as well as the schedule. While on in 'the studio', you will also receive shout outs and a new feature 'love' from listeners on the website. These get sent straight into the studio with no need what so ever to refresh. (a bit like when you have a new Facebook notification, only without the annoying noise!)</p>
<p>These are just a few of the features currently avalible within the new Residents Area. There are more that are still being tested out and soon to be released, including auto playlist stop/start as well as tracking twitter mentions about your current show.</p>
			</div>
			<!--
			<div class="infobox" id="jingles">
				<h1>Authorised Jingles</h1>
				<p>The following jingle packs are authorised for use by HoD. <b>Strictly</b> no other jingles can be used without prior consent by a Director.
				</p><p>
				<div class="buttons">Sweeper Pack</div> 
				<div class="buttons">Accapella Pack</div> 
				<div class="buttons">Bed Pack</div> 
				<div class="buttons">All Jingles</div>
				</p>
			</div>
			-->
			</div>
			<div id="rightCOL">
			<div id='onair'>
				<?php include 'onair.php'; ?>
			</div>
			<div class="infobox">
				
				<h1>Broadcasting</h1>
				<p>Please be aware all residents are <strong>required</strong> to be logged into 'the Studio' while on air. 
				
				<!-- SCHEDULE CHECK BUTTONS AND CONTACT ADMIN
				<div class="buttons">Check the Schedule</div>
				<div class="buttons">Contact Admin</div>
				-->
				</p>
			</div>
			
			<div class="infobox">
				
				<h1>Your Residency</h1>
				<p>Do you see something out of date here?<br/>
				Just click <a class="bulledit">&bull;</a> to update.<br/><br/>
				<img width="100" height="90" class="image" src="images/residents/<?php echo strtolower ($image); ?>.gif"/>
				<b><?php echo $djname; ?></b><br/><?php echo ucfirst($rank); ?> <br/>
				<b><?php echo $show; ?></b> 
				<!--today @ 14:00 GMT-->
				<br/><br/><br/><br/>
				<b>Location</b> <?php echo $location; ?> <a href="edititem.php?edit=location" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				<b>Contact</b> <?php echo $email; ?> <a href="edititem.php?edit=email" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				<b>Website</b> <?php echo $websitelink; ?> <a href="edititem.php?edit=website" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				<b>Facebook</b> <?php echo $facebooklink; ?> <a href="edititem.php?edit=facebook" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				<b>Twitter</b> <?php echo $twitterlink; ?> <a href="edititem.php?edit=twitter" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				<b>Youtube</b> <?php echo $youtubelink; ?> <a href="edititem.php?edit=youtube" rel="shadowbox;height=100px;width=393px;" class="bulledit">&bull;</a><br/>
				</p>
				<?php if ($rank == 'admin') {echo'
				<a href="admin"><div class="buttons">Admin Area</div></a>
				';}?>
			</div>
		
		
		</div>
		<!--
		<div class="infobox" id="news">
			<h1>Admin News</h1>
			<p>Get some admin news here, come on, read all about it!</p>
		</div>
		<div class="infobox">
			<div class="image">
				<img class="image" src="images/residents/<?php echo strtolower ($image); ?>.gif"/>
			</div>
			<h1><?php echo $djname; ?></h1>
			<div class="leftfloat">
				<p>	
					<b>Rank:</b> <?php echo $rank; ?><br/>
					<b>Show:</b> <?php echo $show; ?><br/>
				</p>
			</div>
			<form id="update" action="?action=update" method="post" >
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>" />
			<label>Facebook</label>
			<input type="text" name="facebook" value="<?php echo $facebook; ?>" />
			<label>Twitter</label>
			<input type="text" name="twitter" value="<?php echo $twitter; ?>" />
			<label>Website</label>
			<input type="text" name="email" value="<?php echo $website; ?>" />
			<label>Location</label>
			<input type="text" name="email" value="<?php echo $location; ?>" />
			<button type="submit" >Update</button>
			</form>
		</div>
		<div class="infobox">
			<h2><b>Station Status</b></h2>
			<p>Here will be some stuff about the station</p>
			<a href="golive.php?log=<?php echo $userID; ?>" onclick="openWindow(this.href);this.blur();return false;"><div class="buttons">GoLive</div></a>
			<a href="dashboard.php"><div class="buttons">Old DashBoard</div></a>
			<?php if ($rank == 'admin') {echo'
				<a href="admin"><div class="buttons">Admin Area</div></a>
				';}?>
		</div>

		</div>-->
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>
