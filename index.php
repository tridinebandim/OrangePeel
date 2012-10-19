<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="tv, radio, dj, deejay, music, funky house, electro house, trance, vocal trance, garage, bassline, hardcore, studio, competition, live" />
<meta name="description" content="One of the first online music channels. We have a wide range of music genres and live DJs that broadcast non-stop 24/7" />

<title>HoD Radio | Non-Stop Music 24/7</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
<script src="linkFader.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
		
		$('#schedule').fadeTo(100, 0.5);
		$('#residents').fadeTo(100, 0.5);
		$('#asylum').fadeTo(100, 0.5);
		$('#playlists').fadeTo(100, 0.5);
		$('#footer #logo').fadeTo(2500, 0.5);
		
		$("#schedule").hover(function(){
			$("#schedule").fadeTo(100, 1.0); // This sets the opacity to 100% on hover
		},function(){
				$("#schedule").fadeTo(100, 0.5); // This sets the opacity back to 60% on mouseout
		});
		
		$("#residents").hover(function(){
			$("#residents").fadeTo(100, 1.0); // This sets the opacity to 100% on hover
		},function(){
				$("#residents").fadeTo(100, 0.5); // This sets the opacity back to 60% on mouseout
		});
		
		$("#asylum").hover(function(){
			$("#asylum").fadeTo(100, 1.0); // This sets the opacity to 100% on hover
		},function(){
			$("#asylum").fadeTo(100, 0.5); // This sets the opacity back to 60% on mouseout
		});
		
		$("#playlists").hover(function(){
			$("#playlists").fadeTo(100, 1.0); // This sets the opacity to 100% on hover
		},function(){
				$("#playlists").fadeTo(100, 0.5); // This sets the opacity back to 60% on mouseout
		});
		
		$("#footer #logo").hover(function(){
			$("#footer #logo").fadeTo(100, 1.0); // This sets the opacity to 100% on hover
		},function(){
				$("#footer #logo").fadeTo(100, 0.5); // This sets the opacity back to 60% on mouseout
		});

    });
</script>
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
 	 $("#livefeed").load("liveboard.php");
   var refreshId = setInterval(function() {
      $("#livefeed").load('liveboard.php?randval='+ Math.random());
   }, 60000);
   $.ajaxSetup({ cache: false });
});

 $(document).ready(function() {
 	 $("#timeout").load("timeout.php");
   var refreshId = setInterval(function() {
      $("#timeout").load('timeout.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
</script>
<?php include 'resident-area/config.php'; ?>
<?php

define('IN_PHPBB', true);
$phpbb_root_path = './asylum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if($user->data['is_registered']){
	$state = 'show';
}
else{
   $state = 'hide';
}

?>

<?php include 'google.txt'; ?>
</head>

<body>
<div id="siteAlign">
<div id="page">

<div id="header">
	<div id="logo">
		<a href="index.php"><img src="images/hodradio.jpg" height="290" width="234" alt="HoD Radio" /></a>
	</div>
<div id="player"> 
<script type='text/javascript' src='jwplayer.js'></script>

<object style="clear:center;" type="application/x-shockwave-flash" data="

player.swf?
streamer=rtmp://hodtv.net/hodtv_live/_definst_/doConnect=HoDn1i2h
	&amp;file=live.sdp
	&amp;height=290
	&amp;width=470
	&amp;allowscriptaccess=always
	&amp;allowfullscreen=true
	&amp;autostart=true
	&amp;stretching=exactfit
	&amp;backcolor=000000
	&amp;lightcolor=ff7e00
	&amp;frontcolor=ffffff"


width="470" height="290" name="mediaplayer">

<param name="movie" value="player.swf?
streamer=rtmp://hodtv.net/hodtv_live/_definst_/doConnect=HoDn1i2h
	&amp;file=live.sdp
	&amp;height=290
	&amp;width=470
	&amp;autostart=true
	&amp;stretching=exactfit" />
<param name="allowfullscreen" value="true" />
Your browser does not support this object.
</object>


<!--
<script type='text/javascript' src='jwplayer.js'></script>
 
 

<div id='mediaspace'><div class="on">Woops!</div><br/><br/>Something went a bit wrong, we suggest you tune into one of our radio streams here instead: <br/><br/>
Windows Media Player<br/>
Winamp Media Player<br/>
itunes player</div>
 
<script type='text/javascript'>
  jwplayer('mediaspace').setup({
    'flashplayer': 'player.swf',
    'backcolor': '#282828',
    'frontcolor': '#ffffff',
    'lightcolor': '#FF7E00',
    'streamer': 'rtmp://hodtv.net/hodtv_live/_definst_/',
    'file': 'live.sdp',
    'controlbar': 'none',
    'dock': 'false',
    'autostart': 'true',
    'icons': 'false',
    'stretching': 'exactfit',
    'width': '470',
    'height': '290'
  });
</script>
-->
	</div>
	<div id="liveBoard">
		<span id="livefeed">
    		<?php include 'liveboard.php' ?>
   		</span>
	</div>
</div>
<div id="navBox">
	<a href="schedule.php" rel="shadowbox;height=440px;width=670px;"><div id="schedule">SCHEDULE</div></a>
	<div class="line"></div>
	<a href="residents.php" rel="shadowbox;height=440px;width=670px;"><div id="residents">RESIDENTS</div></a>
	<div class="line"></div>
	<a href="asylum"><div id="asylum">ASYLUM</div></a>
	<div class="line"></div>
	<a href="playlist.php" rel="shadowbox;height=440px;width=670px;"><div id="playlists">PLAYLISTS</div></a>
</div>
<div id="content">

<div id="col1">
<div id="breakingNews">
	<h1>Non-Stop Music <b>24/7</b></h1>
	<h2>What's all this racket about?</h2>
	<p>Yes, we are back! Bigger, better and now even in widescreen! </br>
	The <b>House of Dance</b>, or 'HoD' as we like to be called, is an internet <b>radio</b> and <b>TV</b> station broadcasting out worldwide.
	With an impressive <a href="residents.php" rel="shadowbox;height=440px;width=670px;">residency</a> of up to 40 DJs based in locations across
	the globe, a packed <a href="schedule.php" rel="shadowbox;height=440px;width=670px;">schedule</a> of <b>live shows</b> and a great playlist.
	
	 <!--<a href="forms/residency-form.html" rel="shadowbox;height=422px;width=393px;">join us today</a> -->
 </p>
</div>


<div id="news">
	<!--<h1>In the news...</h1>-->
	<?php
	/*
	include 'asylum/config.php';
	$news = mysql_query("SELECT * FROM phpbb_posts WHERE forum_id='1' ORDER BY post_id DESC LIMIT 1");
		while($newsitem = mysql_fetch_array($news)) {
			$topicID = $newsitem['topic_id'];
		}
	$news = mysql_query("SELECT * FROM phpbb_posts WHERE forum_id='1' AND topic_id='$topicID' ORDER BY post_id ASC LIMIT 1");
		while($newsitem = mysql_fetch_array($news)) {
			$postID = $newsitem['post_id'];
			$postcontent = $newsitem['post_text'];
			$topictitle = $newsitem['post_subject'];
			$posterID = $newsitem['poster_id'];
			$posttime = $newsitem['post_time'];
			//include('asylum/includes/bbcode.' . $phpEx);
			//$postcontent = bbcode($postcontent);
		}
		$news = mysql_query("SELECT * FROM phpbb_users WHERE user_id='$posterID'");
		while($newsitem = mysql_fetch_array($news)) {
		$poster = $newsitem['username'];
		}
		$postcontentNo = strlen($postcontent);
		if ($postcontentNo >= 750) {
				$postcontent = substr($postcontent, 0,750);
				$postcontent = $postcontent.'... (<a href="">read more</a>)';
			}
	echo '
		<div id="newsItem">
		<h2>'.$topictitle.'</h2>
		<img src="http://www.mtv.com/shared/promoimages/bands/h/harris_calvin/a_z/281x211.jpg" />
		<p>'.$postcontent.'</p>
		<div id="post">posted by <a href="asylum/memberlist.php?mode=viewprofile&u='.$posterID.'">'.$poster.'</a> '.time_since ($posttime).' ago</div>
		</div>
		<div id="newsEnd"></div>
	';
	*/
	?>
	
		<?php  include 'news.php'; ?>
</div>
</div>

<div id="bannerCol">
<a href="booth.php" id="boothLink" rel="shadowbox;height=422px;width=393px;">
	<div id="booth">
		<h5>DJ <strong>BOOTH</strong></h5>
		<b>Fancy having a go at hosting your own show? Unlock Your Potential!</b>
	</div>
</a>

<a href="#" id="playBackLink">
	<div id="playBack">
		<h5>PLAY<strong>BACK</strong></h5>
		<b>Listen back to our favourite shows!</b>
	</div>
</a>

<a href="playlist.php" rel="shadowbox;height=440px;width=670px;" id="playListLink">
	<div id="playList">
		<h5>PLAY<strong>LIST</strong></h5>
		<b>Check out the refreshed oldskool playlist!</b>
	</div>
</a>
</div>


<div id="dynamicBox">
	<h6>THE <b>ASYLUM</b></h6>
	<div id="userBox">	
		<?php 
if ($state == 'show') {	
			include 'asylum/config.php';
			$rankID = $user->data['user_type'];
			$resultb = mysql_query("SELECT * FROM phpbb_ranks WHERE rank_id=$rankID");
				while($rowb = mysql_fetch_array($resultb)) {
					$title = $rowb['rank_title'];
				}
			if ($title == null) {
				$title = 'Registered Member';
			}
			$avatar = $user->data['user_avatar'];
			$username = $user->data['username'];
			$unread = $user->data['user_unread_privmsg'];
			$sessionID = $user->data['session_id'];
			$asylumID = $user->data['user_id'];
		echo '
		<div id="login">
			<a href="asylum/memberlist.php?mode=viewprofile&u='.$asylumID.'" >
				<img src="asylum/download/file.php?avatar='.$avatar.'"/>
			</a>
		<div id="name"><a href="asylum/memberlist.php?mode=viewprofile&u='.$asylumID.'">'.$username.'</a></div>
		<div id="rank">'.$title.'</div>
		<a href="asylum/ucp.php?i=pm&folder=inbox"><div class="button">Inbox ('.$unread.')</div></a>
		<a href="asylum/ucp.php"><div class="button">Settings</div></a>
		<a href="asylum/chat/" onclick="openWindow(this.href);this.blur();return false;"><div class="button">Live Chat!</div></a>
		<a href="asylum/ucp.php?mode=logout&amp;sid='.$sessionID.'"><div id="close">Log Out</div></a>
		</div>
';		
}
elseif ($state == 'hide') {
	echo '
	<form id="login" action="asylum/ucp.php?mode=login&from=home" method="post">
			<fieldset>
					<label for="username">Username</label>
					<input type="text" name="username" id="name" title="Username" />
					<label for="password">Password</label>
					<input type="password" name="password" id="password" title="Password" />
					<label id="register">
                    	<a href="asylum/ucp.php?mode=register">Are you an addict?</a>
                    </label>

                    <button type="submit" name="login">Check In &raquo;</button>
			</fieldset>
            <input type="hidden" name="redirect" value="../index.php" />
		</form>
';
}
		?>
	</div>
</div>

		
<div id="latestTopics">
	<h6>LATEST <b>TOPICS</b></h6>
	<div id="mediaBox">
	<?php 
	
	function time_since($original) {
    // array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );
   
    $today = time(); 
    $since = $today - $original;
   
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
       
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
       
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            // DEBUG print "<!-- It's $name -->\n";
            break;
        }
    }
   
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
   
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
       
        // add second item if it's greater than 0
        //if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
        //    $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        //}
    }
    return $print;
} 

	$posts = mysql_query("SELECT * FROM phpbb_posts ORDER BY post_id DESC LIMIT 5");
		while($row = mysql_fetch_array($posts)) {
			$subject = $row['post_subject'];
			$posterID = $row['poster_id'];
			$forumID = $row['forum_id'];
			$postID = $row['post_id'];

			$subject = trim($subject, "Re: ");
			$subject = ucfirst($subject);
			$subjectNo = strlen($subject);
			if ($subjectNo >= 33) {
				$subject = substr($subject, 0,33);
				$subject = $subject.'...';
			}
			
			$users = mysql_query("SELECT * FROM phpbb_users WHERE user_id=$posterID");
				while($rows = mysql_fetch_array($users)) {
				$poster = $rows['username'];
				}
			echo '
				<div class="postItem">
					<b><a href="asylum/viewtopic.php?f='.$forumID.'&p='.$postID.'#p'.$postID.'">'.$subject.'</a></b><br/>
					posted by <a href="asylum/memberlist.php?mode=viewprofile&u='.$posterID.'">'.$poster.'</a> '.time_since ($row['post_time']).' ago
				</div>
			';
		}

	
	?>

	</div>
</div>


<div id="otherMedia">
	<h6>SOCIAL <b>MEDIA</b></h6>
	<div id="mediaBox">
	
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=158013094252610";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like" data-href="hodtv.net" 
	data-send="true" data-layout="button_count" 
	data-width="450" data-show-faces="true" 
	data-colorscheme="dark" data-font="verdana">
	</div>
	<br/>
	<a href="https://twitter.com/HoDRadio" class="twitter-follow-button" 
	data-show-count="false" data-button="grey">Follow @HoDRadio</a>
	<script src="//platform.twitter.com/widgets.js" 
	type="text/javascript"></script>
	
	
			<!--
			<a href="http://www.facebook.com/pages/HoD-Radio/294226583939828" target="_blank">
				<div id="facebook">Facebook</div>
			</a>
			<div id="twitter">Twitter</div>
			<div id="youtube">YouTube</div>
			<div id="stickam">Stickam</div>
			<div id="winMedia">Listen in Windows Media</div>
			<div id="iTunes">Listen in iTunes</div>
			<div id="winAmp">Listen in Winamp</div>
			-->
	</div>
</div>





<div class="dummy"></div>
</div></div>
<!--<div class="tab" id="tabOn"></div>
<div class="tab" id="tabFB">f</div>
<div class="tab" id="tabTwit">t</div>-->
<div id="footer">
	<a href="http://www.houseofdance.net"><div id="logo"></div></a>
	<div id="quickLink">
		<h6>QUICK <b>LINKS</b></h6>
		<ul>
			<li><a href="index.php">&raquo; Home</a></li>
			<li><a href="schedule.php" rel="shadowbox;height=440px;width=670px;">&raquo; Schedule</a></li>
			<li><a href="residents.php" rel="shadowbox;height=440px;width=670px;">&raquo; Residents</a></li>
			<li><a href="asylum">&raquo; the Asylum</a></li>
			<li><a href="playlist.php" rel="shadowbox;height=440px;width=670px;">&raquo; Playlists</a></li>
			<!--
			<li><a href="about.php">&raquo; About Us</a></li>
			<li><a href="contact.php">&raquo; Contact Us</a></li>
			<li><a href="sitemap.php">&raquo; Site Map</a></li>
			-->
		</ul>
	</div>
	<div id="twitterPull">
		<h6>LATEST <b>TWEET</b> <a href="http://www.twitter.com/HoDRadio" target="_blank">@HODRADIO</a></h6>
		<div id="tweetBox">
			<div id="tweet">
				
					
					<quote><ul id="twitter_update_list" ><li>Loading Tweets..</li></ul></quote>
					
				<!--<span><a href="#">Follow us on twitter</a></span>-->
			</div>
		</div>
	</div>
	
</div>
<div id="footerCap"></div>
<div id="copyRight">
	Copyright <a href="http://www.whatiscopyright.org/" target="_blank">&copy;</a> <?php echo date(Y); ?> | 
		<a href="http://www.houseofdance.net">the House of Dance network</a>
	| Some rights reserved, but others are left alone.
	<div id="residentsArea">
		Residents Area: 
			<a href="resident-area/login.php">Sign In</a>
	</div>
</div>


</div>




</div>


<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
<script src="http://twitter.com/statuses/user_timeline/HoDRadio.json?callback=twitterCallback2&count=1" type="text/javascript"></script>

<script type="text/javascript" src="http://localhost/d3n.at/orangepeel/clickheat/js/clickheat.js"></script><noscript></noscript><script type="text/javascript"><!--
clickHeatSite = 'hodradio';clickHeatGroup = 'hodradio';clickHeatServer = 'http://localhost/d3n.at/orangepeel/clickheat/click.php';initClickHeat(); //-->
</script>
</body>
</html>
