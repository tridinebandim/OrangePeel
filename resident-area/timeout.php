<?php 

include 'config.php';
require_once('auth.php'); 
date_default_timezone_set('Europe/London');

if ($action == 'wait') {
$userID = $_SESSION['SESS_USER_ID'];
$timeout = $userID * date(i);
mysql_query("UPDATE ra2_livefeed SET userID='$userID', timeout='$timeout' WHERE status='wait'");
}
else {
$userID = $_SESSION['SESS_USER_ID'];
$timeout = $userID * date(i);
mysql_query("UPDATE ra2_livefeed SET userID='$userID', timeout='$timeout' WHERE status='live'");
}
 ?>