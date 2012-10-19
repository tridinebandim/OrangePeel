<?php
      //mysql information, must be correct in order to get news
      //this information can be found in your config.php in the root forum directory.
      $dbms = 'mysql';
      $dbserver = 'localhost';
      $dbport = '';
      $dbname = 'darren_asylum';
	  //$dbuser = 'darren_asylum';
      $dbuser = 'root';
      //$dbpasswd = 'S28c4Ps686';
	  $dbpasswd = '';
     
      //table prefix, came from when you installed phpbb3. phpbb_ is the default.
      //Also can be found in config.php
      $table_prefix = 'phpbb_';
     
      //Relative path to your forum
      //NO BACK/FRONT SLASHES, PLEASE
      $forumpath = "asylum";

      //I don't remember where the following two lines came from but I will leave it for fun :OOO
      $acm_type = 'file';
      $load_extensions = '';

      //Set a character limit?
      //Set as 0 for no limit
      $charlimit = "1000";

      //How will we parse the time stamp????
      //Time stamp explanation can be found:
      // http://us3.php.net/date
      $timestamp = 'YmdHi';
     
      //Forum ID from where to grab the news
      //To put multiple forums, do the following:
      //if I wanted the forum ID's 1, 40, and 32,
      // $forum_id = array("1", "40", "32");
      $forum_id = array("1");

      //show avatars?
      //yes = true
      //no = false
      //note: Different sized avatars may look a bit "fugly" with the current template;
      //rest is up to you :)
      $showavatars = true;
     
      //Be careful, checking connection
      $db = mysql_connect($dbserver, $dbuser, $dbpasswd) or die('Could not connect to DB server!');
     
      //uh-oh
      mysql_select_db($dbname) or die("Could not connect to database: " . mysql_error());
?>
