<?php
      //----------------------------------------------------------------------------//
      // PHPBB3 News Mod V.3.0                                                      //
      //                                                                            //
      // Tested and working on PHPBB3 ALL VERSIONS                                  //
      //                                                                            //
      // Added Features Since Last Version:                                         //
      //   -New BBCode Parsing                                                      //
      //   -Reply Count                                                             //
      //   -No more forum-linking issues                                            //
      //                                                                            //
      // MOD Made by Cruddpuppet (http://www.uranet.net/)                           //
      //                                                                            //
      // Reply Count by ecwpa                                                       //
      //                                                                            //
      // Free for editing, but not distribution! If you have any questions on this, //
      // feel free to email me at cruddpuppet@gmail.com !                           //
      //                                                                            //
      //                                                                            //
      // Explanation of all the template variables, and what they do:               //
      //                                                                            //
      //   {subject}      Shows the topic's title.                                  //
      //   {posterlink}   Shows poster's name, with a link to their forum profile   //
      //   {poster}       Shows poster's name, without the link.                    //
      //   {postdate}     Shows the date/time the post was made.                    //
      //   {message}      Shows the post's content. BBcode/smileys are parsed       //
      //                     only if the post made asks for it.                     //
      //   {replylink}    A link that can be used to reply to the post.             //
      //   {reply_URL}    The URL of the reply page.                                //
      //   {viewlink}     A link the the topic.                                     //
      //   {replies}      The amount of replies made to the topic.                  //
      //   {avatar}       Displays the avatar. (If specified in the config file.)   //
      //                                                                            //
      //----------------------------------------------------------------------------//

      if(file_exists("news-config.php")) {
        include("news-config.php");
        echo "";
      }
      else {
        echo "Config file missing, or incorrect permissions!";
        echo "Stopping the rest of the page from loading!";
        exit();
      }
     
      //Grab news posts with SQL query
      $queryp1 = "SELECT * FROM " . $table_prefix . "posts WHERE forum_id='" . $forum_id[0] . "'";
//$dxx = "SELECT * FROM phpbb3_posts WHERE forum_id='1'";
//$rsult = mysql_query($dxx);
//      while ($row = mysql_fetch_array($rsult)) {
//       echo "<pre>";
//       print_r($row);
//       }

      $queryp2 = "";
      foreach($forum_id as $blaaah) {
        if($blaaah == $forum_id[0]) {
          echo "";
          echo "";
        }
        else {
          $queryp2 .= " OR forum_id='".$blaaah."'";
        }
      }
      $queryp3 = " ORDER BY topic_id DESC, post_id;";
      $query = $queryp1.$queryp2.$queryp3;
      $result = mysql_query($query);
      $num = mysql_num_rows($result);
      //define('IN_PHPBB', true);
      //$phpbb_root_path2 = $forumpath."/";
	  //$phpbb_root_path2 = "dev/asylum/";
      //$phpEx2 = substr(strrchr(__FILE__, '.'), 1);
      //require_once($phpbb_root_path2 . 'common.' . $phpEx2);
      // Start session management
      //$user->session_begin();
      //$auth->acl($user->data);
      //$user->setup();
#      include($forumpath."/includes/functions_content.php");


     
      //Array to store the news
      $newsitems = array();
      $one = "1";
     
      //How many posts do you want?
      $newsdisplay = "1";
     
      //Time to get the posts
      while ($row = mysql_fetch_array($result)) {
          //Has the amount of posts to be displayed been reached?
          if ($one <= $newsdisplay) {
              //Set some variables for future reference
              $current_topic = $row['topic_id'];
              $current_forum = $row['forum_id'];
              $current_post_id = $row['post_id'];
              $current_subject = $row['post_subject'];
              // How many replies we have?
              $replies_query = "SELECT (sum(post_postcount)-1) as replies FROM " . $table_prefix . "posts WHERE topic_id='" . $row['topic_id'] . "';";
              $replies_result = mysql_query($replies_query);
              $replies_row = mysql_fetch_object($replies_result);
              $replies =  $replies_row->replies;
              //Query the database for the username from the user id
              $useridquery = "SELECT * FROM " . $table_prefix . "users WHERE user_id='" . $row['poster_id'] . "';";
              $useridresults = mysql_query($useridquery);
              $useridrow = mysql_fetch_object($useridresults);
             
              //Has the subject already been posted?
              //If so, do nothing
              //The first post is the original, so we have nothing to worry about
              if (in_array($current_topic, $newsitems)) {
                  echo "";
                  echo "";
              } else {
                  //Hmm... It's not in the array, so we'll put it there so it's not repeated
                  array_push($newsitems, $row['topic_id']);
                 
                  //Extra parsing where bbcode function doesn't parse
$row['bbcode_options'] = (($row['enable_bbcode']) ? OPTION_FLAG_BBCODE : 0) +
    (($row['enable_smilies']) ? OPTION_FLAG_SMILIES : 0) + 
    (($row['enable_magic_url']) ? OPTION_FLAG_LINKS : 0);
$message = generate_text_for_display($row['post_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $row['bbcode_options']);

                  if($charlimit > 0) {
                    if(strlen($message) > $charlimit) {
                      $message = substr($message,0,$charlimit) . "...<a href=\"/d3n.at/dev/" . $forumpath . "/viewtopic.php?f=".$current_forum."&amp;t=" . $current_topic . "\">(read more)</a>";
                      echo "";
                    }
                  }
                  else {
                    $message = $message;
                    echo "";
                  }
// REPLY COUNT ADDITION BY ecwpa
// REPLY COUNT ADDITION BY ecwpa
              // How many replies we have?
              $replies_query = "SELECT (sum(post_postcount)-1) as replies FROM " . $table_prefix . "posts WHERE topic_id='" . $row['topic_id'] . "';";
              $replies_result = mysql_query($replies_query);
              $replies_row = mysql_fetch_object($replies_result);
              $replies =  $replies_row->replies;
                  // my humble additions
                      $replylink = "<a href=\"" . $forumpath . "/posting.php?mode=reply&amp;f=" . $current_forum . "&amp;t=" . $current_topic . "\">Reply</a>";
                 
                  $replyURL = "/" . $forumpath . "/posting.php?mode=reply&amp;f=" . $current_forum . "&amp;t=" . $current_topic;
                  $viewURL = "/" . $forumpath . "/viewtopic.php?f=" . $current_forum . "&amp;t=" . $current_topic;
                     
                  $viewlink = "<a href=\"" . $forumpath . "/viewtopic.php?f=" . $current_forum . "&amp;t=" . $current_topic . "\">Read Comments</a>";
                     
                 // Comments
                
                 // more than 1
                 if ($replies > 1)
                     $viewlink = "<a href='" . $viewURL . "'>" . $replies . " Comments</a>";

                 // 0 comments
                 elseif ($replies < 1)
					$viewlink = "<a href='" . $replyURL . "'>Be the first to comment!</a>";
                
                // 1 comment
                 else
                 $viewlink = "<a href='" . $viewURL . "'> " . $replies . " Comment</a>";
                  //get variables ready for template
                 
                  $posterlink = '<a href="'.$forumpath.'/memberlist.php?mode=viewprofile&amp;u='.$row['poster_id'].'">'.$useridrow->username.'</a>';
                  $poster = $useridrow->username;
				  date_default_timezone_set('Europe/London');
				  $currenttime = date('YmdHi');
                  $postdate = date($timestamp, $row['post_time']);
					// post
					$postmin = substr($postdate, -2, 2);
					$posthour = substr($postdate, -4, 2);
					$postday = substr($postdate, -6, 2);
					$postmonth = substr($postdate, -8, 2);
					$postyear = substr($postdate, -12, 4);
					// current
					$currmin = substr($currenttime, -2, 2);
					$currhour = substr($currenttimee, -4, 2);
					$currday = substr($currenttime, -6, 2);
					$currmonth = substr($currenttime, -8, 2);
					$curryear = substr($currenttime, -12, 4);
					// work out how long ago
					$takemin = $currmin - $postmin;
					$takehour = $currhour - $posthour;
					$takeday = $currday - $postday;
					$takemonth = $currmonth - $postmonth;
					$takeyear = $curryear - $postyear;
					// rules for display 
					
					if ($takeyear == 0 && $takemonth == 0 && $takeday == 0) {
						if ($takemin <= 59) {
							$showtime = $takemin.' minutes ago';
						}
						elseif ($takehour <= 23 && $takehour != 0) {
							$showtime = $takehour.' hours ago';
						}
					}
				
                  $avatar = '<img id="poster" src="'.$forumpath.'/download/file.php?avatar='.$useridrow->user_avatar.'" alt="HoD News" />';

                  //load + use template
                  if(file_exists("template.html")) {
                    $template = file_get_contents("template.html");
                    $template = str_replace("{subject}", $current_subject, $template);
                    $template = str_replace("{posterlink}", $posterlink, $template);
                    $template = str_replace("{poster}", $poster, $template);
                    $template = str_replace("{postdate}", $showtime, $template);
                    $template = str_replace("{message}", $message, $template);
                    $template = str_replace("{replylink}", $replylink, $template);
                    $template = str_replace("{reply_URL}", $replyURL, $template);
                    $template = str_replace("{viewlink}", $viewlink, $template);
                    $template = str_replace("{replies}", $replies, $template);
                    $template = str_replace("{replylink}", $replylink, $template);
                    $template = str_replace("{viewlink}", $viewlink, $template);
                    if($showavatars) {
                      $template = str_replace("{avatar}", $avatar, $template);
                      echo "";
                    }
                    else {
                      $template = str_replace("{avatar}", "", $template);
                      echo "";
                    }
                    echo $template;
                  }
                  else {
                    echo "Template file not found! Stopping Execution of the rest of the page :(";
                    exit();
                  }
                  //Time to make sure that the amount of news posts to be displayed will be reached.
                  $one++;
              }
          }
      }
    //credits (You are welcome to take this line out, but I would rather you didn't, so more people can find this mod)
    //echo('PHPBB3 MOD by <a href="http://www.uranet.net/">cruddpuppet</a>');
    ?>
