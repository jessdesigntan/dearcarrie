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

  $conn->close();
  //Re-direct
  header("location: post?postID=$postID");
?>
