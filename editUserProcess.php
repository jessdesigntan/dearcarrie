<?php
include("controllers/templates.php");

$userid = $_POST["userid"];
$role = $_POST["role"];
$name = $_POST["name"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$action = $_POST["action"];


// if ($imageName != "") {
//   if ($image != "images/default.svg") {
//     unlink($image);
//   }
//   $image = uploadImage($imageName, $imageType, $imageSize, $imageTmpName, $imageError, "profile");
// }

if ($action == "update") {
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
                
        //save to database
        $conn = connectToDataBase();
        $sql = "UPDATE users SET name='$name', description='$desc', role='$role', image='$imageName' WHERE id = '$userid'";
        $result = $conn->query($sql);
        validateQuery($conn, $sql);

        //Re-direct
        header("location: userDetails?userID=$userid");
            
    } else {
        //save to database
        $conn = connectToDataBase();
        $sql = "UPDATE users SET name='$name', description='$desc', role='$role' WHERE id = '$userid'";
        $result = $conn->query($sql);
        validateQuery($conn, $sql);

        //Re-direct
        header("location: userDetails?userID=$userid");
    }
} else {
    // if delete
    $conn = connectToDataBase();
    $sql = "DELETE FROM users WHERE id = '$userid'";
    $result = $conn->query($sql);
    validateQuery($conn, $sql);

    header("location: userList");
}

?>
