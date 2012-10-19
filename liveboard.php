<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="js/shadowbox.js"></script>
<link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
<script type="text/javascript">
Shadowbox.init();
</script>
<?php
include 'resident-area/config.php';
date_default_timezone_set('Europe/London');
$time = date('Hi');
// Get info
$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
	while($row = mysql_fetch_array($result)) {
		$userID = $row['userID'];
		$showID = $row['showID'];
		$info = $row['info'];
		$start = $row['start'];
		$end = $row['end'];
		$timeout = $row['timeout'];
	}

$match_timeout = $userID * date(i);
	if ($timeout != $match_timeout) {
	mysql_query("UPDATE ra2_livefeed 
				SET timeout='',
				userID=''
				WHERE status='live'");
	}

$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$userID'");
	while($row = mysql_fetch_array($result)) {
		$djname = $row['djname'];
	}
if (is_numeric($showID)) {
	$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
	while($row = mysql_fetch_array($result)) {
		$showname = strtoupper($row['name']);
		$info = $row['info'];
	}
}else{
	$showname = strtoupper($showID);
}
// Work out times
$liveTime = $time - $start; // Negative result = NOT LIVE
$endTime = $end - $time; // Negative result = NOT LIVE
/* Format Times for displaying on site*/
$starthour = substr($start, -4, 2);
$startmin = substr($start, -2, 2);
$endhour = substr($end, -4, 2);
$endmin = substr($end, -2, 2);
$start = $starthour.':00';
$end = $endhour.':00'; 
// image check
	$imagecheck1 = str_replace (" ", "", $djname);
	$imagecheck2 = str_replace (".", "", $imagecheck1);
	$image = str_replace ("-", "", $imagecheck2);
//
if ($userID == null) {
	playlist (0);
}
elseif ($userID == null) {
	playlist (0);
}
else {
	echo '
		<div id="live">
		<b>&laquo;LIVE NOW</b>
			<div class="onTime">'.$start.' - '.$end.'</div>
		<div class="showInfo">
			<a href="profile.php?dj='.$djname.'" rel="shadowbox;height=235px;width=570px;">
			<div id="onImage" style="background: url(resident-area/images/residents/'.strtolower ($image).'.gif) center;"></div>
			</a>
			<h4><a href="schedule.php" rel="shadowbox;height=440px;width=670px;">'.$showname.'</a></h4> with 
			<a href="profile.php?dj='.$djname.'" rel="shadowbox;height=235px;width=570px;">'.$djname.'</a>
			<span>'.ucfirst($info).'</span>
			<a href="forms/shout-form.php" rel="shadowbox;height=306px;width=392px;">
			<div class="button">Shout Out!</div></a>
			<a href="forms/love-form.php" rel="shadowbox;height=160px;width=230px;">
			<div class="button">Send Love &hearts;!</div>
			</a>
			
		</div>
	</div>';

	//  GET NEXT SHOW
	$Cday = date('N'); //  Get current day
	$Chour = date('H'); // Get current hour
	$Cslot = 'slot'.$Chour;
	
	$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday'");
		while($row = mysql_fetch_array($result)) {
				$CshowID = $row[$Cslot];
		}
	$Nhour = $Chour ++;
		$Nslot = 'slot'.$Nhour;
		$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday'");
			while($row = mysql_fetch_array($result)) {
				$NshowID = $row[$Nslot];
			}
		$count = 0;	
	while ($CshowID == $NshowID || $NshowID == null && $count <= 23) :
		$Nhour ++;
		$Nslot = 'slot'.$Nhour;
		$Eslot = 'slot'.$Ehour;
		$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday'");
			while($row = mysql_fetch_array($result)) {
				$NshowID = $row[$Nslot];
			}
		$Ehour = $Nhour + 1;
		
		$checkslot = $Ehour;
		$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$Cday'");
			while($row = mysql_fetch_array($result)) {
				$NshowID = $row[$Nslot];
			}
		
		$count ++;

	endwhile;
	
	$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$NshowID'");
		while($row = mysql_fetch_array($result)) {
				$showname = $row['name'];
				$userID = $row['userID'];
		}
	$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$userID'");
		while($row = mysql_fetch_array($result)) {
				$djname = $row['djname'];
		}

	$result = mysql_query("SELECT * FROM ra2_livefeed WHERE status='live'");
		while($row = mysql_fetch_array($result)) {
				$LuserID = $row['userID'];
		}
		$NextStatus = 'ON NEXT';
	if ($LuserID == $userID) {
		$NextStatus = 'TOMORROW';
		$offs = '<!--';
		$offe = '-->';
		$OFF = 'Music 24/7 with more live shows!';
		$Nhour = 00;
		$Ehour = 00;
		$showname= '';
		$djname = '';
	}
echo '	<div id="liveNext">
		<b id="title">&raquo;'.$NextStatus.'</b>
			<div class="onTime">'.$offs.$Nhour.':00 - '.$Ehour.':00'.$offe.'</div>
		<div class="showInfo">
			<marquee behavior="scroll" scrollammount="3" ><b>'.$OFF.$offs.$showname.'</b> hosted by <b>'.$djname.$offe.'</b></marquee>
		</div>
	</div>
	
	';
}




function playlist ($slotNO) {

$now = '
<div id="now">
		<b>&laquo;ON NOW</b>
			<div class="onTime"></div>
		<div class="showInfo">
			<h4><a href="schedule.php" rel="shadowbox;height=440px;width=670px;">NON STOP MUSIC</a></h4> Finest and freshest blend of music from different genres
		</div>
</div>';
$nextday = '
<div id="tomorrow">
		<b>&raquo;TOMORROW</b>
			<div class="onTime">00:00 - 00:00</div>
		<div class="showInfo">
			<h4><a href="schedule.php" rel="shadowbox;height=440px;width=670px;">FLASH BACK</a></h4> Oldskool anthems you nearly forgot about from our <a href="#">playlist</a>
		</div>
</div>';

	
	while ($slotNO <= 23) :
	$time = date('G');
	$day = date('N'); //  Get current day
	$prevSlot = $slotNO - 1;
	$prevSlot = 'slot'.$prevSlot;
	$nextSlot = $slotNO + 1;
	$nextSlot = 'slot'.$nextSlot;
	$currSlot = $slotNO;
	$currSlot = 'slot'.$slotNO;
	// GET CURRENT SLOT SHOW ID
	$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='$day'");
	while($row = mysql_fetch_array($result)) {
		$prevshowID = $row[$prevSlot];
		$showID = $row[$currSlot];
		$nextshowID = $row[$nextSlot];
		$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
			while($row = mysql_fetch_array($result)) {
			$showName = $row['name'];
			$showInfo = $row['info'];
			$userID = $row['userID'];
			$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$userID'");
				while($row = mysql_fetch_array($result)) {
				$userName = $row['djname'];
				}
			}
		}
	// Show TIMES
	$startTime = $slotNO;
	$endTime = $slotNO + 1;
	// ADD SLOTS TOGETHER
	if ($prevshowID == $showID) {
		$startTime = $startTime - 1;
	}
	// ADD A ZERO TO ONE DIGIT NUMBERS
	$startNO = strlen($startTime);
	$endNO = strlen($endTime);
	if ($startNO == 1) {$startTime = '0'.$startTime;}
	if ($endNO == 1) {$endTime = '0'.$endTime;}
	// MIDNIGHT TIME FIX
	if ($endTime == '24') {
		$endTime = '00';	
	}
	// If next show is same dont display
	$time = date('G');
	$hittime = $endTime;
	if ($hittime == 00) {$hittime = 24;}
	if ($showID == $nextshowID || $hittime < $time) {}
	elseif ($showID != null && $Counter <= 2) {
	if ($Counter == 0) {$control = 'now'; $display = '&laquo;ON NOW';
	$showName = 'Non Stop Music';
	$showInfo = 'Finest and freshest blend of music from different genres';
	$userName = '';
	}
	if ($Counter == 1) {$control = 'next'; $display = '&raquo;ON NEXT';}
	if ($Counter == 2) {$control = 'later'; $display = '&raquo;ON LATER';}
	echo '<div id="'.$control.'">
		<b>'.$display.'</b>
			<div class="onTime">'.$startTime.':00 - '.$endTime.':00</div>
		<div class="showInfo">
			<h4><a href="schedule.php" rel="shadowbox;height=440px;width=670px;">'.strtoupper ($showName).'</a></h4> '.$showInfo.' <a href="profile.php?dj='.$userName.'" rel="shadowbox;height=235px;width=570px;">'.$userName.'</a>
		</div>
	</div>
	';
	$Counter ++;
	}
	if ($showID != null && $Counter == 0) {echo $now; $Counter ++;}
	//if ($showID != null && $Counter == 1) {echo $nextday; $Counter ++;}
	//if ($showID != null && $Counter == 0) {echo $nextday; $Counter ++;}
	$slotNO ++;
	endwhile;
}
?>