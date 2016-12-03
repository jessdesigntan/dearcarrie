<?php
  include('controllers/templates.php');
  $userid = $_GET["userid"];
  $topicid = $_GET["topicid"];

  followTopic($userid,$topicid);

  echo "Following";
?>
