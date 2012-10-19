<?php

////////////////////////////////////////
// Resident Area v2 
// by Darren Ravenscroft
// http://www.darren-ravenscroft.co.uk
////////////////////////////////////////

////////////////////////////////////////
/////////////CONFIG FILE////////////////
////////////////////////////////////////

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// FOR RESIDENT AREA /////////////////////////////
mysql_select_db("darren_hod", $con);

// FOR LOGIN /////////////////////////////////////
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'darren_hod');
//////////////////////////////////////////////////
// The Studio Version ////////////////////////////
$version = '1.1';
//////////////////////////////////////////////////

/*
$ip = @$REMOTE_ADDR;
if ($ip != '62.255.88.64') {
	if ($ip != '86.22.154.44') {
		header('Location: http://www.hodradio.net/orangepeel/');
	}
}
*/
?>