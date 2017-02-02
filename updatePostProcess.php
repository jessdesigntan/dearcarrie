<?php
include("controllers/templates.php");

$action = $_POST["action"];
$postid = $_POST["postid"];
$title = $_POST["title"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$topics = $_POST['topic'];
echo $desc;
echo $action;

$conn = connectToDataBase();

if ($action == "update") {
  $sql = "UPDATE posts
          SET title = '$title', description = '$desc'
          WHERE id = '$postid'";
}

if ($action == "publish") {
  // if delete
  $sql = "UPDATE posts
          SET published = 1
          WHERE id = '$postid'";
}

if ($action == "unpublish") {
  $sql = "UPDATE posts
          SET published = 0
          WHERE id = '$postid'";
}

if ($action == "topic") {
  //delete previous topics
  $sql = "DELETE FROM curation WHERE postid = '$postid'";
  $result = $conn->query($sql);

  foreach ($topics as $topicid) {
    $sql = "INSERT INTO curation (topicid, postid) VALUES('$topicid', '$postid')";
    $result = $conn->query($sql);

    //increase posts by 1 in topics table
    $sql = "UPDATE curation (topicid, postid) VALUES('$topicid', '$postid')";
    $result = $conn->query($sql);
  }


}

validateQuery($conn, $sql);

//Re-direct
header("location: postDetails?postID=$postid");

?>
