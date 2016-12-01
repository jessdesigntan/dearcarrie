<?php
include ("controllers/templates.php");
$userid = $_POST["userid"];
$image = $_POST["image"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$email = $_POST["email"];


$conn = connectToDataBase();
$sql = "UPDATE users SET image = '$image', name = '$name', description = '$desc', email = '$email' WHERE id = '$userid'";

$result = $conn->query($sql);
validateQuery($conn, $sql);

//Re-direct
header("location: editProfile?userID=$userid");
?>
