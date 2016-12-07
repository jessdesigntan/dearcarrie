<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $postid = $_GET["postid"];
  $action = $_GET["action"];

  if ($action == "likepost") {
    likePost($userid,$postid);
    echo "Liked";
  }

  if ($action == "unlikepost") {
    unlikePost($userid,$postid);
    echo "Like Post";
  }
?>
