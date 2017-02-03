<?php
include("controllers/templates.php");
$postid = $_POST["postid"];
$comment = trim($_POST["comment"]);
$comment = htmlentities($comment, ENT_QUOTES);
$userid = $_SESSION["userid"];
//Add to db
$conn = connectToDataBase();

$sql = "INSERT INTO comments (userid, postid, comment)
VALUES ('$userid', '$postid', '$comment')";

validateQuery($conn, $sql);

$postID = $conn->insert_id;
$conn->close();

//send email
sendCommentEmail($userid, $postid, $comment);

//Re-direct
header("location: post?postID=$postid");
?>
