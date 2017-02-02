<?php
include("controllers/templates.php");

$postid = $_POST["postid"];
$userid = $_SESSION["userid"];
$itemid = $_POST["itemid"];
$type = $_POST["type"];
$desc = htmlentities($desc, ENT_QUOTES);
//Add to db
$conn = connectToDataBase();

$sql = "INSERT INTO reports (userid, itemid, comment, type)
VALUES ('$userid', '$itemid', '$desc', '$type')";

validateQuery($conn, $sql);

$postID = $conn->insert_id;
$conn->close();
//Re-direct
header("location: post?postID=$postid");
?>
