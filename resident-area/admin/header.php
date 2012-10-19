	
	<?php include '../config.php'; require_once('../auth.php');
$userID = $_SESSION['SESS_USER_ID'];
$result = mysql_query("SELECT * FROM ra2_users WHERE userID='$userID'");
while($row = mysql_fetch_array($result)) {
	$djname = $row['djname'];
	$rank = $row['rank'];
}
if ($rank != 'admin' && $djname == $_SESSION['SESS_DJ_NAME'] ) {
	header("location: ../index.php");
}
 ?>
	<div id="header">
		<div id="logout">
			<a href="../logout.php">
            	<div id="close">
					Sign Out
				</div>
            </a>
		</div>
		<div id="headLine">
		</div>
	</div>