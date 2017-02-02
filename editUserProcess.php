<?php
include("controllers/templates.php");

$userid = $_POST["userid"];
$role = $_POST["role"];
$name = $_POST["name"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$image = $_POST["imageOld"];
$action = $_POST["action"];
// image

$imageName = $_FILES["imageNew"]["name"];
$imageType = $_FILES["imageNew"]["type"];
$imageSize = $_FILES["imageNew"]["size"];
$imageTmpName = $_FILES["imageNew"]["tmp_name"];
$imageError = $_FILES["imageNew"]["error"];

if ($imageName != "") {
  if ($image != "images/default.svg") {
    unlink($image);
  }
  $image = uploadImage($imageName, $imageType, $imageSize, $imageTmpName, $imageError, "profile");
}

$conn = connectToDataBase();
if ($action == "update") {
  $sql = "UPDATE users SET name='$name', description='$desc', role='$role', image='$image' WHERE id = '$userid'";
  $result = $conn->query($sql);
}
else {
  // if delete
  $sql = "DELETE FROM users WHERE id = '$userid'";
  $result = $conn->query($sql);
}

//Re-direct
if ($action == "update") {
  header("location: userDetails?userID=$userid");
}
else {
  header("location: userList");
}

?>
