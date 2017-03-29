<?php
include ("controllers/templates.php");
$userid = $_POST["userid"];
//$image = $_POST["image"];
$name = $_POST["name"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$email = $_POST["email"];

if ( isset($_POST['image']) ) {
	
	$data = preg_replace('/data:image\/(png|jpg|jpeg|gif|bmp);base64/','',$_POST['image']);
	$data = base64_decode($data);
	$img = imagecreatefromstring($data);

	$path = 'images/profile/';
	// generate random name
	$names  = substr(md5(time()),10);
	$ext = 'png';
	$imageName = $path.$names.'.'.$ext;

	// write the image to disk
	imagepng($img,  $imageName);
	imagedestroy($img);
	// return the image path
	//echo $imageName;
			
	//save to database
	$conn = connectToDataBase();
	$sql = "UPDATE users SET image = '$imageName', name = '$name', description = '$desc', email = '$email' WHERE id = '$userid'";

	$result = $conn->query($sql);
	validateQuery($conn, $sql);

	//Re-direct
	header("location: editProfile?userID=$userid");

} else {
	//save to database
	$conn = connectToDataBase();
	$sql = "UPDATE users SET name = '$name', description = '$desc', email = '$email' WHERE id = '$userid'";

	$result = $conn->query($sql);
	validateQuery($conn, $sql);

	//Re-direct
	header("location: editProfile?userID=$userid");
}

?>
