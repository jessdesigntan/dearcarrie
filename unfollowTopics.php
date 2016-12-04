<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $topicid = $_GET["topicid"];

  unfollowTopic($userid,$topicid);

  echo "Follow Topic";
  
?>
