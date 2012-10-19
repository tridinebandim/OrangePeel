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
$djID = $_POST['djname'];
if ($action == 'pull') {
	mysql_query("UPDATE ra2_users SET active='no' WHERE userID='$djID'");
	header('Location: residents-manage.php');
}
if ($action == 'push') {
	mysql_query("UPDATE ra2_users SET active='yes' WHERE userID='$djID'");
	header('Location: residents-manage.php');
}
if ($action == 'suspend') {
	mysql_query("UPDATE ra2_users SET active='suspended' WHERE userID='$djID'");
	header('Location: residents-manage.php');
}
if ($action == 'activate') {
	mysql_query("UPDATE ra2_users SET active='no' WHERE userID='$djID'");
	header('Location: residents-manage.php');
}
$status = 'What do you want to do? ';
if ($action == 'updated') {$status = 'Updated <b>OK</b>, what else do you want to do?';}
if ($action == 'editdj') {
$userID = $_POST['djID'];
$djname = $_POST['djname'];
$username = $_POST['username'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$rank = $_POST['rank'];
$style = $_POST['style'];
$info = $_POST['info'];
	mysql_query("UPDATE ra2_users 
		SET djname='$djname', 
		username='$username', 
		realname='$realname', 
		email='$email', 
		rank='$rank', 
		style='$style', 
		info='$info'
		WHERE userID='$userID'");
	header('Location: residents-manage.php?action=updated');
}
		?>

<script language="JavaScript">
<!--
function check_length(my_form)
{
maxLen = 150; // max number of characters allowed
if (my_form.info.value.length >= maxLen) {
// Alert message if maximum limit is reached.
// If required Alert can be removed.
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
my_form.info.value = my_form.info.value.substring(0, maxLen);
}
else{ // Maximum length not reached so update the value of my_text counter
my_form.text_num.value = maxLen - my_form.info.value.length;}
}
//-->
</script>
</head>

<body>
<div id="siteAlign">
	<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
	<?php include 'menu.php'; ?>
	
		<h1 class="manage">Manage Residents</h1>
		<p class="manage"><?php echo $status; ?></p>
		<div class="formList">
		<form  action="residents-manage.php?action=edit" method="post" class="formList">
			<select name="djname">
			<option value="">Please Choose...</option>
			<?php 
				$result = mysql_query("SELECT * FROM ra2_users ORDER BY djname ASC");
					while($row = mysql_fetch_array($result)) {
						$djname = $row['djname'];
						$userID = $row['userID'];
						echo '<option value="'.$userID.'">'.$djname.'</option>';
					}
					?>
			</select>
		<button type="submit">Edit</button>
		</form>
		<form  action="residents-manage.php?action=push" method="post" class="formList">
			<select name="djname">
			<option value="">Please Choose...</option>
				<?php 
				$result = mysql_query("SELECT * FROM ra2_users WHERE active='no' ORDER BY djname ASC");
					while($row = mysql_fetch_array($result)) {
						$djname = $row['djname'];
						$userID = $row['userID'];
						echo '<option value="'.$userID.'">'.$djname.'</option>';
					}
					?>
			</select>
		<button type="submit">Push</button>
		</form>
		<form  action="residents-manage.php?action=pull" method="post" class="formList">
			<select name="djname">
			<option value="">Please Choose...</option>
				<?php 
				$result = mysql_query("SELECT * FROM ra2_users WHERE active='yes' ORDER BY djname ASC");
					while($row = mysql_fetch_array($result)) {
						$djname = $row['djname'];
						$userID = $row['userID'];
						echo '<option value="'.$userID.'">'.$djname.'</option>';
					}
					?>
			</select>
		<button type="submit">Pull</button>
		</form>
		<form action="residents-manage.php?action=suspend" method="post" class="formList">
			<select name="djname">
			<option value="">Please Choose...</option>
				<?php 
				$result = mysql_query("SELECT * FROM ra2_users WHERE NOT active='suspended' ORDER BY djname ASC");
					while($row = mysql_fetch_array($result)) {
						$djname = $row['djname'];
						$userID = $row['userID'];
						echo '<option value="'.$userID.'">'.$djname.'</option>';
					}
					?>
			</select>
		<button type="submit">Suspend</button>
		</form>
				<form action="residents-manage.php?action=activate" method="post" class="formList">
			<select name="djname">
			<option value="">Please Choose...</option>
				<?php 
				$result = mysql_query("SELECT * FROM ra2_users WHERE active='suspended' ORDER BY djname ASC");
					while($row = mysql_fetch_array($result)) {
						$djname = $row['djname'];
						$userID = $row['userID'];
						echo '<option value="'.$userID.'">'.$djname.'</option>';
					}
					?>
			</select>
		<button type="submit">Activate</button>
		</form>
		</div>
		<?php 
		if ($action == 'edit') {
		$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$djID'");
					while($row = mysql_fetch_array($result)) {
					$userID = $row['userID'];
					$djname = $row['djname'];
					$username = $row['username'];
					$realname = $row['realname'];
					$password = $row['password'];
					$email = $row['email'];
					$rank = $row['rank'];
					$style = $row['style'];
					$info = $row['info'];
					}
			if ($rank == 'manager') {$manager = 'selected';}
			elseif ($rank == 'admin') {$admin = 'selected';}
			else {$resident = 'selected';}
			echo '
		<div class="rightList1">
		<form action="residents-manage.php?action=editdj" method="post" name="my_form">
				<label>DJ Name:</label> <input type="text" name="djname" value="'.$djname.'"/>
				<label>Username:</label> <input type="text" name="username" value="'.$username.'"/>
				<label>Password:</label> <input type="password" name="password" value="'.$password.'"/>
				<label>Email:</label> <input type="text" name="email" value="'.$email.'"/>
				
		</div>
		<div class="rightList2">
			<label>Rank:</label> 
			<select name="rank">
				<option value="resident" '.$resident.'>Resident</option>
				<option value="manager" '.$manager.'>Manager</option>
				<option value="admin" '.$admin.'>Admin</option>
			</select>
				
			<label>Real Name:</label> <input type="text" name="realname" value="'.$realname.'"/>
			<label>Style:</label> <input type="text" name="style" value="'.$style.'"/>
			<label>Info:</label> <textarea name="info" rows="5" onKeyPress=check_length(this.form); onKeyDown=check_length(this.form);/>'.$info.'</textarea>
			<input id="charLeft" size="1" value="150" name="text_num">
			<button type="submit">Edit</button>
			<input type="hidden" name="djID" value="'.$userID.'"/>
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
