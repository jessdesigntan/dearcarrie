<?php
include ("controllers/templates.php");
$postID = $_POST["postID"];
$title = $_POST["title"];
$desc = $_POST["desc"];

$conn = connectToDataBase();
$sql = "UPDATE posts SET title='$title', description='$desc' WHERE id = '$postID'";
$result = $conn->query($sql);

validateQuery($conn, $sql);

//Re-direct
header("location: post?postID=$postID");
?>
