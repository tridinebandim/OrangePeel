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
<!--<link href="../resident-area/css/forms.css" rel="stylesheet" type="text/css" />-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	jQuery('#wrap').preventJump({});
});


// --------------------------------
// PREVENT JUMPING OF THE SCROLLBAR
// --------------------------------
(function($)
{
	$.fn.preventJump = function()
	{
		var defaults = {
		};
		
		return this.each(function()
		{
			var element = $(this),
				wrapper = element.parent(),
				window_height = parseInt($(window).height()),
				new_height = window_height+1;
				
			wrapper.css({height: new_height+'px'});
			
		});
	}
})(jQuery);
</script>

<?php 
include '../config.php';
$action = $_GET['action'];
$djID = $_POST['userID'];
$name = $_POST['name'];
$info = $_POST['info'];
if ($action == 'create') {
	mysql_query("INSERT INTO ra2_shows (userID, name, info, shouts)
		VALUES ('$djID', '$name', '$info', 'yes')");
		header('Location: shows-manage.php');
		//echo $djID;
		//echo $name;
		//echo $info;
}
		?>
</head>

<body>
<div id="siteAlign">
	<?php include 'header.php'; ?>
	<div id="container">
		<div id="page">
		<?php include 'menu.php'; ?>

		
		<h1>Create Show</h1>
		<label>Host:</label>
		<form id="showForm" action="shows-create.php?action=create" method="post">
			<select name="userID">
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
		<label>Show Name:</label>
			<input type="text" name="name"></input>
		<label>Show Info:</label>
			<input type="text" id="info" name="info"></input>
		<button type="submit">Create Show</button>	
		</form>
		</div>
	</div>
	<div id="copyRight">
		Copyright <a href="http://www.whatiscopyright.org/" target="_blank">&copy;</a> <?php echo date(Y); ?> | 
		<a href="http://www.houseofdance.net">the House of Dance network</a> | Some rights reserved, but others are left alone.
	</div>
</div>
</body>
</html>
