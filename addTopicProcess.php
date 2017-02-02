<?php
include("controllers/templates.php");

$type = $_POST["type"];
$order = $_POST["order"];
$title = $_POST["title"];
$short_desc = $_POST["short_desc"];
$url = $_POST["url"];
$tel = $_POST["tel"];
$desc = trim($_POST["desc"]);
$desc = nl2br($desc); //add <br/> to every breakline
$desc = htmlspecialchars($desc);
//main image
$mImageName = $_FILES["main"]["name"];
$mImageType = $_FILES["main"]["type"];
$mImageSize = $_FILES["main"]["size"];
$mImageTmpName = $_FILES["main"]["tmp_name"];
$mImageError = $_FILES["main"]["error"];

//background image
$bImageName = $_FILES["background"]["name"];
$bImageType = $_FILES["background"]["type"];
$bImageSize = $_FILES["background"]["size"];
$bImageTmpName = $_FILES["background"]["tmp_name"];
$bImageError = $_FILES["background"]["error"];

//add image to folder
$main_image = uploadImage($mImageName, $mImageType, $mImageSize, $mImageTmpName, $mImageError, "topics");
$background = uploadImage($bImageName, $bImageType, $bImageSize, $bImageTmpName, $bImageError, "topics");

//Add to db
$conn = connectToDataBase();
$userID = getUserIDByEmail($_SESSION["email"]);

$sql = "INSERT INTO topics (main_image, background, title, short_desc, description, url, tel, type, order_num)
VALUES ('$main_image', '$background', '$title', '$short_desc', '$desc', '$url', '$tel', '$type', '$order')";

validateQuery($conn, $sql);

$topicID = $conn->insert_id;
$conn->close();
//Re-direct
header("location: adminTopicDetails?topicID=$topicID");
?>
