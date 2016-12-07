<?php
include("controllers/templates.php");

$title = $_POST["title"];
$desc = trim($_POST["desc"]);
$desc = nl2br($desc); //add <br/> to every breakline

//Add to db
$conn = connectToDataBase();
$userID = $_SESSION["userid"];

$sql = "INSERT INTO posts (userid, title, description)
VALUES ('$userID', '$title', '$desc')";

validateQuery($conn, $sql);

$postID = $conn->insert_id;
$conn->close();
//Re-direct
header("location: post?postID=$postID");
?>
