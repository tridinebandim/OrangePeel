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

<?php include 'config.php';
include '../config.php';
$action = $_GET['action'];
$showID = $_POST['showname'];

if ($action == 'editshow') {
$showID = $_POST['showID'];
$name = $_POST['name'];
$info = $_POST['info'];
	mysql_query("UPDATE ra2_shows 
		SET name='$name', 
		info='$info'
		WHERE showID='$showID'");
	header('Location: shows-manage.php');
}

if ($action == 'delete') {
	$showID = $_POST['showname'];
	$n = 0;
	while ($n <= 23):
			$slot = 'slot'.$n;
			mysql_query("UPDATE ra2_schedule SET $slot='' WHERE $slot='$showID'");
		$n ++;
	endwhile;
	mysql_query("DELETE FROM ra2_shows WHERE showID='$showID'");
	header('Location: shows-manage.php');
}
 ?>
</head>

<body>
<div id="siteAlign">
	<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
		<?php include 'menu.php'; ?>

		<h1 class="manage">Manage Shows</h1>
		<p class="manage">What do you want to do? </p>
		<form action="shows-manage.php?action=edit" method="post" class="formList">
			<select name="showname">
			<option value="">Please Choose...</option>
				<?php 
				$result = mysql_query("SELECT * FROM ra2_shows");
					while($row = mysql_fetch_array($result)) {
						$showname = $row['name'];
						$showID = $row['showID'];
						echo '<option value="'.$showID.'">'.$showname.'</option>';
					}
					?>
			</select>
		<button type="submit">Edit</button>
		</form>
		<form action="shows-manage.php?action=delete" method="post" class="formList">
			<select name="showname">
			<option value="">Please Choose...</option>
								<?php 
				$result = mysql_query("SELECT * FROM ra2_shows");
					while($row = mysql_fetch_array($result)) {
						$showname = $row['name'];
						$showID = $row['showID'];
						echo '<option value="'.$showID.'">'.$showname.'</option>';
					}
					?>
			</select>
		<button type="submit">Remove</button>
		</form>
				<?php 
		if ($action == 'edit') {
		$result = mysql_query("SELECT * FROM ra2_shows WHERE showID='$showID'");
					while($row = mysql_fetch_array($result)) {
					$showID = $row['showID'];
					$userID = $row['userID'];
					$name = $row['name'];
					$info = $row['info'];
					}
			echo '
		<div class="rightList1">
		<form action="shows-manage.php?action=editshow" method="post">
				<label>Host Name:</label> <input type="text" readonly="readonly" name="djname" value="'.$djname.'"/>
				<label>Show Name:</label> <input type="text" name="name" value="'.$name.'"/>
				<label>Info:</label> <input type="text" id="info" name="info" value="'.$info.'" maxlength="70"/>
			<button type="submit">Edit</button>
			<input type="hidden" name="showID" value="'.$showID.'"/>
		</form>	
		</div>
		';} ?>
		</div>
	</div>
	<div id="copyRight">
		Copyright <a href="http://www.whatiscopyright.org/" target="_blank">&copy;</a> <?php echo date(Y); ?> | 
		<a href="http://www.houseofdance.net">the House of Dance network</a> | Some rights reserved, but others are left alone.
	</div>
</div>
</body>
</html>
