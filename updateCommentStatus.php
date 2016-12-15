<?php
  include('controllers/templates.php');
  $commentID = $_POST["commentid"];
  $action = $_POST["action"];

  $conn = connectToDataBase();

  if ($action == "publish") {
    $sql = "UPDATE comments
            SET published = '1'
            WHERE id = '$commentID'";
  }

  if ($action == "unpublish") {
    $sql = "UPDATE comments
            SET published = '0'
            WHERE id = '$commentID'";
  }

  validateQuery($conn, $sql);

  //Re-direct
  header("location: commentDetails?commentID=$commentID");
?>
