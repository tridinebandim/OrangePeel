<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>HoD Radio | Resident Area</title>

<link href="../resident-area/css/main.css" rel="stylesheet" type="text/css" />


<?php include 'config.php'; ?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
   function m(el) {
      if ( el.defaultValue == el.value ) el.value = "";
}
//--><!]]>
</script>
</head>
<body>
<div id="siteAlign">

	<div id="loginBox">
	<h6>
	<?php $action = $_GET['action'];
		if ($action == 'failed') {echo 'Incorrect Login';}
	?></h6>
	<form  method="post" action="login-exec.php" >
	<input type="text" value="Username" onFocus="m(this)" name="login"/>
	<br/><br/>
	<input type="password" value="password" onFocus="m(this)" name="password" />
	<button type="submit" name="Submit" >Sign In</button>
	<!--<a href="#">Forget password?</a></form>-->
	</div>
</div>
</body>
</html>
