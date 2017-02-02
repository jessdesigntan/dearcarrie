<?php
include ("controllers/templates.php");
$postID = $_POST["postID"];
$title = $_POST["title"];
$desc = htmlspecialchars($_POST["desc"]);
$action = $_POST["action"];

$conn = connectToDataBase();
if ($action == "update") {
  $sql = "UPDATE posts SET title='$title', description='$desc' WHERE id = '$postID'";
}
else {
  $sql = "UPDATE posts SET published = 0 WHERE id = '$postID'";
}
$result = $conn->query($sql);
validateQuery($conn, $sql);

//Re-direct
if ($action == "update") {
  header("location: post?postID=$postID");
}
else {
  $userid = $_SESSION["userid"];
  header("location: profile?userID=$userid");
}

?>
