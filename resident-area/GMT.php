<?php 
$time = new DateTime('now', new DateTimeZone('GMT'));
echo '<b>GMT</b><br/>';
echo $time->format('H:i');
?>