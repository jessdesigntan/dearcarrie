<?php
include("controllers/templates.php");

$userid = $_POST["userid"];
$role = $_POST["role"];
$name = $_POST["name"];
$desc = $_POST["desc"];
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
}
else {
  // if delete
  $sql = "UPDATE users SET active = 0 WHERE id = '$userid'";
}

$result = $conn->query($sql);
validateQuery($conn, $sql);

//Re-direct
if ($action == "update") {
  header("location: userDetails?userID=$userid");
}
else {
  header("location: userDetails?userID=$userid");
}

?>
