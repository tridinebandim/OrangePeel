
<?php 
include 'config.php';
date_default_timezone_set('Europe/London');
$currenttime = date('Hi');
$currenthour = substr($currenttime, -4, 2);
$currentmin = substr($currenttime, -2, 2);
$currentsecond = date('s');
/*$result = mysql_query("SELECT shout FROM ra2_shouts WHERE shout='LOVE' AND userID='1'");
while($row = mysql_fetch_array($result)) {
		$loveAmount ++;		
}*/



//if () {
//	$style = 'red-pastel';
//}else{
//	$style = '';
//}

echo '<a href="#" class="button times '.$style.'" >LEFT <div class="normal">';
echo '00:00';
echo '</div></a>';
// echo $hourleft.':'.$minleft;
?>