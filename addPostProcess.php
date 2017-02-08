<?php
include("controllers/templates.php");

$title = htmlentities($_POST["title"], ENT_QUOTES);
$desc = trim($_POST["desc"]);
$desc = htmlentities($desc, ENT_QUOTES);


//Add to db
$conn = connectToDataBase();
$userID = $_SESSION["userid"];

$sql = "INSERT INTO posts (userid, title, description)
VALUES ('$userID', '$title', '$desc')";

validateQuery($conn, $sql);

$postID = $conn->insert_id;

//notifications to followers of users
$sql = "INSERT INTO notifications (item, type, from_user)
values ('$postID', 'user_new_post', '$userID')";

validateQuery($conn, $sql);

//Re-direct
header("location: post?postID=$postID");

?>
