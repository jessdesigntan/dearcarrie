<?php
  include('controllers/templates.php');
  $reportID = $_POST["reportid"];
  $action = $_POST["action"];

  $conn = connectToDataBase();

  if ($action == "resolve") {
    $sql = "UPDATE reports
            SET seen = '1'
            WHERE id = '$reportID'";
  }

  if ($action == "unsolve") {
    $sql = "UPDATE reports
            SET seen = '0'
            WHERE id = '$reportID'";
  }

  validateQuery($conn, $sql);

  //Re-direct
  header("location: reportDetails?reportID=$reportID");
?>
