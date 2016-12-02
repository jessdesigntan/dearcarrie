<?php
include("controllers/templates.php");
$postid = $_POST["postid"];
$comment = trim($_POST["comment"]);
$comment = nl2br($comment);
$userid = $_SESSION["userid"];
//Add to db
$conn = connectToDataBase();

$sql = "INSERT INTO comments (userid, postid, comment)
VALUES ('$userid', '$postid', '$comment')";

validateQuery($conn, $sql);

$postID = $conn->insert_id;
$conn->close();
//Re-direct
header("location: post?postID=$postid");
?>
