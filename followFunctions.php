<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $currentUser = $_GET["currentuser"];
  $postid = $_GET["postid"];
  $topicid = $_GET["topicid"];
  $action = $_GET["action"];

  if ($action == "followpost") {
    followPost($userid,$postid);
    echo "Following";
  }

  if ($action == "unfollowpost") {
    unfollowPost($userid,$postid);
    echo "Follow Post";
  }

  if ($action == "followtopic") {
    followTopic($userid,$topicid);
    echo "Following";
  }

  if ($action == "unfollowtopic") {
    unfollowTopic($userid,$topicid);
    echo "Follow Topic";
  }

  if ($action == "followuser") {
    followUser($currentUser,$userid);
    echo "Following";
  }

  if ($action == "unfollowuser") {
    unfollowUser($currentUser,$userid);
    echo "Follow";
  }
?>
