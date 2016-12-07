<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $postid = $_GET["postid"];
  $commentid = $_GET["commentid"];
  $action = $_GET["action"];

  if ($action == "likepost") {
    likePost($userid,$postid);
    echo "Liked";
  }

  if ($action == "unlikepost") {
    unlikePost($userid,$postid);
    echo "Like Post";
  }

  if ($action == "likecomment") {
    likeComment($userid,$commentid);
    echo "Liked";
  }

  if ($action == "unlikecomment") {
    unlikeComment($userid,$commentid);
    echo "Like Comment";
  }
?>
