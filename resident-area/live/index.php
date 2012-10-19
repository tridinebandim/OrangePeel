<script>
$(document).ready(function() {
 	 $("#timeout").load("timeout.php");
   var refreshId = setInterval(function() {
      $("#timeout").load('timeout.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
</script>


<?php
include 'config.php'; 
require_once('auth.php');
$userID = $_SESSION['SESS_USER_ID'];
$timeout = $userID * date(i);
mysql_query("
	UPDATE ra2_livefeed 
	SET 
	userID='$userID', 
	timeout='$timeout' 
	WHERE 
	status='wait'");
}
echo '<span id="timeout">'
include 'timeout.php';
echo '</span>';


echo 'wait page';
?>
