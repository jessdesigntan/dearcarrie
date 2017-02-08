<?php
  include("controllers/templates.php");

  $id = $_GET["commentID"];
  $postID = $_GET["postID"];
  $userID = $_GET["userID"];

  goBackIfNotEqual($_SESSION["userid"], $userID);

  //Add to db
  $conn = connectToDataBase();

  $sql = "DELETE FROM comments WHERE id = '$id'";

  validateQuery($conn, $sql);

  $to_user = getUserbyPostID($postID);
  $sql = "DELETE FROM notifications WHERE type = 'comment_new' AND from_user = '$userID' AND to_user = '$to_user' AND item = '$postID'";
  validateQuery($conn, $sql);

  //Re-direct
  header("location: post?postID=$postID");
?>
