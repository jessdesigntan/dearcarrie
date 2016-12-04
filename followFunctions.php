<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
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
?>
