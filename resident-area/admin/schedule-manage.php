<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>

<link href="../../resident-area/css/main.css" rel="stylesheet" type="text/css" />
<link href="../../resident-area/css/nav_bright.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../lib/notifications.css" />
<script type="text/javascript" src="../lib/jquery.js"></script>
<script type="text/javascript" src="../lib/jquery.cookie.js"></script>
<script type="text/javascript" src="../lib/custom.js"></script>
<link href="../../../resident-area/css/forms.css" rel="stylesheet" type="text/css" />

<?php 
include '../config.php';
$action = $_GET['action'];
$showID = $_POST['showID'];
$day = $_POST['day'];
$n = 0;

if ($action == 'addshow') {
	$showID = $_GET['showID'];
	$slot = $_GET['slot'];
	$day = $_GET['day'];
		mysql_query("UPDATE ra2_schedule SET $slot='$showID' WHERE day='$day'");
	header('Location: schedule-manage.php?action=show&reset=yes&showid='.$showID);
}
if ($action == 'removeshow') {
	$showID = $_GET['showID'];
	$slot = $_GET['slot'];
	$day = $_GET['day'];
		mysql_query("UPDATE ra2_schedule SET $slot='' WHERE day='$day'");
	header('Location: schedule-manage.php?action=show&reset=yes&showid='.$showID);
}

		?>


</head>

<body>
<div id="siteAlign">
	<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
	<?php include 'menu.php'; ?>

		<h1 class="manage">Manage Schedule</h1>
		<p class="manage">What would you like to do?</p>
		<div class="formList">
		<form  action="schedule-manage.php?action=show" method="post" class="formList">
			<select name="showID">
			<option value="">Choose a Show...</option>
			<?php 
				$result = mysql_query("SELECT * FROM ra2_shows ORDER BY name ASC");
					while($row = mysql_fetch_array($result)) {
						$showname = $row['name'];
						$showID = $row['showID'];
						echo '<option value="'.$showID.'">'.$showname.'</option>';
					}
					?>
			</select>
		<button type="submit">Manage</button>
		</form>
		<form  action="schedule-manage.php?action=playlist" method="post" class="formList">
			<select name="listID">
			<option value="">Choose a Playlist...</option>
			<?php 
				$result = mysql_query("SELECT * FROM ra2_playlists ORDER BY name ASC");
					while($row = mysql_fetch_array($result)) {
						$listname = $row['name'];
						$listID = $row['showID'];
						echo '<option value="'.$listID.'">'.$listname.'</option>';
					}
					?>
			</select>
			<button type="submit">Manage</button>
		</form>
		
		</div>
		
		<?php 
		if ($action == 'show') {
		$showID = $_POST['showID'];
		$reset = $_GET['reset'];
		if ($reset == 'yes') {$showID = $_GET['showid'];}
		$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
					while($row = mysql_fetch_array($result)) {
					$showID = $row['showID'];
					$showname = $row['name'];
					}
			echo '<p>Below displays the schedule for <b>'.$showname.'</b></p>';
			echo '<div id="adminSchedule"><div class="smallList">';
			$n = 0;
			echo 'SUN';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='0'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=0"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=0"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'MON';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='1'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=1"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=1"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'TUE';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='2'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=2"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=2"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'WED';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='3'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=3"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=3"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'THUR';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='4'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=4"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=4"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'FRI';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='5'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=5"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=5"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</div>';
		echo '<div class="smallList">';
			$n = 0;
			echo 'SAT';
			while ($n <= 23):
				$result = mysql_query("SELECT * FROM ra2_schedule WHERE day='6'");
					while($row = mysql_fetch_array($result)) {
						$slot = 'slot'.$n;
						$empty = $row[$slot];
						// add zeros to one digits
						$NO = strlen($n);
						if ($NO == 1) {$n = '0'.$n;}
						// display
						if ($empty == null) {
							echo '<a href="schedule-manage.php?action=addshow&showID='.$showID.'&slot='.$slot.'&day=6"><div class="buttons">'.$n.':00</div></a>';
						}
						elseif ($empty == $showID) {
							echo '<a href="schedule-manage.php?action=removeshow&showID='.$showID.'&slot='.$slot.'&day=6"><div class="buttons on">'.$n.':00</div></a>';
						}
						elseif ($empty != null) {
							echo '<div class="buttons off">'.$n.':00</div>';
						}
					}
				$n ++;
			endwhile;
		echo '</form></div></div>';
		} 
		?>
		</div>
	</div>
	<div id="copyRight">
		Copyright <a href="http://www.whatiscopyright.org/" target="_blank">&copy;</a> <?php echo date(Y); ?> | 
		<a href="http://www.houseofdance.net">the House of Dance network</a> | Some rights reserved, but others are left alone.
	</div>
</div>
</body>
</html>
