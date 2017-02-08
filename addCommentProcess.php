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

//notification
$to_user = getUserbyPostID($postid);
if ($to_user != $from_user) {
  $sql = "INSERT INTO notifications (item, type, from_user, to_user)
  VALUES ('$postid', 'comment_new', '$userid', '$to_user')";
  validateQuery($conn, $sql);
}


//send email
sendCommentEmail($userid, $postid, $comment);

//Re-direct
header("location: post?postID=$postid");
?>
