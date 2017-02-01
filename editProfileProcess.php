<?php
include ("controllers/templates.php");
$userid = $_POST["userid"];
$image = $_POST["imageOld"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$email = $_POST["email"];

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
$sql = "UPDATE users SET image = '$image', name = '$name', description = '$desc', email = '$email' WHERE id = '$userid'";

$result = $conn->query($sql);
validateQuery($conn, $sql);

//Re-direct
header("location: editProfile?userID=$userid");
?>
