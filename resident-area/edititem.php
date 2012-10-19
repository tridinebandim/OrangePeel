<html>
<head>
<link href="../css/forms.css" rel="stylesheet" type="text/css" />
<?php include 'config.php'; require_once('auth.php'); 
$action = $_GET['edit'];
$submit = $_GET['submit'];
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
}

$postvalue = $_POST['edititem'];

if ($submit == 'location'){
mysql_query("UPDATE ra2_users SET 
	location='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}
if ($submit == 'email'){
	$pos = strpos($postvalue, '@');
	if ($pos === false) {$postvalue = '';}
mysql_query("UPDATE ra2_users SET
	email='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}
if ($submit == 'facebook'){
	$postvalue = strstr($postvalue, 'facebook.com', false);
	$postvalue = str_replace('http://','',$postvalue);
	$postvalue = str_replace('www.','',$postvalue);
	$postvalue = str_replace('facebook','',$postvalue);
	$postvalue = str_replace('.com/','',$postvalue);
mysql_query("UPDATE ra2_users SET
	facebook='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}
if ($submit == 'twitter'){
	$postvalue = strstr($postvalue, 'twitter.com', false);
	$postvalue = str_replace('http://','',$postvalue);
	$postvalue = str_replace('www.','',$postvalue);
	$postvalue = str_replace('twitter','',$postvalue);
	$postvalue = str_replace('.com/','',$postvalue);
mysql_query("UPDATE ra2_users SET 
	twitter='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}
if ($submit == 'youtube'){
	$postvalue = strstr($postvalue, 'youtube.com', false);
	$postvalue = str_replace('http://','',$postvalue);
	$postvalue = str_replace('www.','',$postvalue);
	$postvalue = str_replace('youtube','',$postvalue);
	$postvalue = str_replace('.com/','',$postvalue);
mysql_query("UPDATE ra2_users SET 
	stickam='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}
if ($submit == 'website'){
	$postvalue = str_replace('http://','',$postvalue);
mysql_query("UPDATE ra2_users SET 
	website='$postvalue' 
	WHERE
	userID='$userID'
");
closeShadow ();
}

function closeShadow () {
	echo '<script>parent.location.reload();parent.Shadowbox.close()</script>';
}

if ($action == 'location') {
$title = 'Location';
$detail = 'City/Town, Country';
$value = $location;
}
if ($action == 'email') {
$title = 'Contact Email';
$detail = 'Shown to admin only.';
$value = $email;
}
if ($action == 'website') {
$title = 'Website URL';
$detail = 'Personal website';
if ($website != null) {$value = 'http://www.'.$website;}
}
if ($action == 'facebook') {
$title = 'Facebook Profile';
$detail = 'Personal Profile';
if ($facebook != null) {$value = 'http://www.facebook.com/'.$facebook;}
}
if ($action == 'twitter') {
$title = 'Twitter Profile';
$detail = 'Personal Profile';
if ($twitter != null) {$value = 'http://www.twitter.com/'.$twitter;}
}
if ($action == 'youtube') {
$title = 'Youtube Account';
$detail = 'Personal Account';
if ($stickam != null) {$value = 'http://www.youtube.com/'.$stickam;}
}


?>
</head>
<body>
<div id="stylized" class="myform"><?php echo $postvalue; ?>
	<form action="edititem.php?submit=<?php echo $action; ?>" method="post">
		<label><?php echo $title; ?>
				<span class="small"><?php echo $detail; ?></span>
		</label>
		<input type="text" name="edititem" id="name" value="<?php echo $value; ?>" />
		<button type="submit" style="float:right;">Save</button>
	</form>	
	<a href="#" onclick='window.parent.Shadowbox.close();'><div id="close">&times; Close</div></a>
	
</div>
</body>
</html>