<?php
include("controllers/templates.php");

$userid = $_POST["userid"];
$role = $_POST["role"];
$name = $_POST["name"];
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$action = $_POST["action"];

//check extension
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
$max_file_size = 1000 * 1024; #1000kb
$nw = $nh = 200; # image with # height

// if ($imageName != "") {
//   if ($image != "images/default.svg") {
//     unlink($image);
//   }
//   $image = uploadImage($imageName, $imageType, $imageSize, $imageTmpName, $imageError, "profile");
// }

if ($action == "update") {
  if ( isset($_FILES['image']) && $_FILES['image']['error'] == 0 ) {
    if (! $_FILES['image']['error'] && $_FILES['image']['size'] < $max_file_size) {
      $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      if (in_array($ext, $valid_exts)) {
        $path = 'images/profile/' . uniqid() . '.' . $ext;
        $size = getimagesize($_FILES['image']['tmp_name']);

        $x = (int) $_POST['x'];
        $y = (int) $_POST['y'];
        $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
        $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

        $data = file_get_contents($_FILES['image']['tmp_name']);
        $vImg = imagecreatefromstring($data);
        $dstImg = imagecreatetruecolor($nw, $nh);
        imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
        imagejpeg($dstImg, $path);
        imagedestroy($dstImg);
        
        //save to database
        $conn = connectToDataBase();
        $sql = "UPDATE users SET name='$name', description='$desc', role='$role', image='$path' WHERE id = '$userid'";
        $result = $conn->query($sql);
        validateQuery($conn, $sql);

        //Re-direct
        header("location: userDetails?userID=$userid");
      } else {
        echo 'unknown problem!';
      } 
    } else {
      echo 'file is too small or large';
    }
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
    $sql = "UPDATE users SET active = 0 WHERE id = '$userid'";
    $result = $conn->query($sql);
    validateQuery($conn, $sql);

    header("location: userDetails?userID=$userid");
}

?>
