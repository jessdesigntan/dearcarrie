<?php
include("controllers/templates.php");

$action = $_POST["action"];
$postid = $_POST["postid"];
$title = $_POST["title"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$topics = $_POST['topic'];

$conn = connectToDataBase();

if ($action == "update") {
  $sql = "UPDATE posts
          SET title = '$title', description = '$desc'
          WHERE id = '$postid'";
  $result = $conn->query($sql);
}

if ($action == "publish") {
  // if delete
  $sql = "UPDATE posts
          SET published = 1
          WHERE id = '$postid'";
  $result = $conn->query($sql);
}

if ($action == "unpublish") {
  $sql = "UPDATE posts
          SET published = 0
          WHERE id = '$postid'";
  $result = $conn->query($sql);
}

if ($action == "topic") {
  //delete previous topics
  $sql = "DELETE FROM curation WHERE postid = '$postid'";
  $result = $conn->query($sql);

  foreach ($topics as $topicid) {
    $sql = "INSERT INTO curation (topicid, postid) VALUES('$topicid', '$postid')";
    $result = $conn->query($sql);

    //for every topic inserted,
    $followers = getTopicFollowers($topicid);
    foreach ($followers as $follower) {
      $to_user = $follower["userid"];
      $sql1 = "INSERT INTO notifications (item, type, to_user, from_user)
      VALUES ('$topicid', 'new_post_topic', '$to_user', '$postid')";
      mysqli_query($conn, $sql1);
    }
  }


}

//Re-direct
header("location: postDetails?postID=$postid");

?>
