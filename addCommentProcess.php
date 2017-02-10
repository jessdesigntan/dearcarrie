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


$to_user = getUserbyPostID($postid);
if ($to_user != $userid) {
  //notification to the post owner
  $sql = "INSERT INTO notifications (item, type, from_user, to_user)
  VALUES ('$postid', 'comment_new', '$userid', '$to_user')";
  validateQuery($conn, $sql);
}

//notification to post's followers
$postFollowers = getPostFollowers($postid);
foreach ($postFollowers as $postFollower) {
  $to_user = $postFollower["userid"];
  $sql = "INSERT INTO notifications (item, type, from_user, to_user)
  values ('$postid', 'new_comment_follow_post', '$userid', '$to_user')";

  mysqli_query($conn, $sql);
}

//notification to people who commented on the post
$postCommenters = getUserThatCommented($postid);
foreach ($postFollowers as $postFollower) {
  $to_user = $postFollower["userid"];
  if ($to_user != $userid) {
    $sql = "INSERT INTO notifications (item, type, from_user, to_user)
    values ('$postid', 'new_comment_commented', '$userid', '$to_user')";
  }

  mysqli_query($conn, $sql);
}

//send email
sendCommentEmail($userid, $postid, $comment);

//Re-direct
header("location: post?postID=$postid");
?>
