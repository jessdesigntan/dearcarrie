<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $postid = $_GET["postid"];

  followPost($userid,$postid);

  echo "Following";

?>
