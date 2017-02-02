<?php
include("controllers/templates.php");

$action = $_POST["action"];
$topicid = $_POST["topicid"];
$type = $_POST["type"];
$order = $_POST["order"];
$title = $_POST["title"];
$mainImage = $_POST["main_image_old"];
$backgroundImage = $_POST["background_old"];
$short_desc = htmlspecialchars($_POST["short_desc"]);
$desc = htmlspecialchars($_POST["desc"]);
$url = $_POST["url"];
$tel = $_POST["tel"];

// main image
$mImageName = $_FILES["main_image_new"]["name"];
$mImageType = $_FILES["main_image_new"]["type"];
$mImageSize = $_FILES["main_image_new"]["size"];
$mImageTmpName = $_FILES["main_image_new"]["tmp_name"];
$mImageError = $_FILES["main_image_new"]["error"];

// background image
$bImageName = $_FILES["background_new"]["name"];
$bImageType = $_FILES["background_new"]["type"];
$bImageSize = $_FILES["background_new"]["size"];
$bImageTmpName = $_FILES["background_new"]["tmp_name"];
$bImageError = $_FILES["background_new"]["error"];

// if there is new main image
if ($mImageName != "") {
  unlink($mainImage);
  $mainImage = uploadImage($mImageName, $mImageType, $mImageSize, $mImageTmpName, $mImageError, "topics");
}

// if there is new background image
if ($bImageName != "") {
  unlink($backgroundImage);
  $backgroundImage = uploadImage($bImageName, $bImageType, $bImageSize, $bImageTmpName, $bImageError, "topics");
}

$conn = connectToDataBase();
if ($action == "update") {
  $sql = "UPDATE topics
          SET main_image='$mainImage', background='$backgroundImage', title='$title', short_desc='$short_desc', description='$desc', url='$url', tel='$tel', type='$type', order_num='$order'
          WHERE id = '$topicid'";
}
else if ($action == "unpublish") {
  // if delete
  $sql = "UPDATE topics SET published = 0 WHERE id = '$topicid'";
}

else {
  $sql = "UPDATE topics
          SET main_image='$mainImage', background='$backgroundImage', title='$title', short_desc='$short_desc', description='$desc', url='$url', tel='$tel', type='$type', order_num='$order', published = 1
          WHERE id = '$topicid'";
}

$result = $conn->query($sql);
validateQuery($conn, $sql);

//Re-direct

header("location: adminTopicDetails?topicID=$topicid");
?>
