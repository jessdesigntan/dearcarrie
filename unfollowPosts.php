<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $postid = $_GET["postid"];

  unfollowPost($userid,$postid);

  echo "Follow Post";

?>
