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
$desc = htmlentities($_POST["desc"], ENT_QUOTES);
$url = $_POST["url"];
$tel = $_POST["tel"];

//check extension
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
$max_file_size = 500 * 1024; #500kb
$max_file_size2 = 500 * 1024; #500kb
// $nw = 2000; # image with # height main
// $nh = 1000;
// $nw2 = 2000; # image with # height background
// $nh2 = 1000;


// main image
$mImageName = $_FILES["main"]["name"];
// $mImageType = $_FILES["main_image_new"]["type"];
// $mImageSize = $_FILES["main_image_new"]["size"];
// $mImageTmpName = $_FILES["main_image_new"]["tmp_name"];
// $mImageError = $_FILES["main_image_new"]["error"];

// background image
$bImageName = $_FILES["background"]["name"];
// $bImageType = $_FILES["background_new"]["type"];
// $bImageSize = $_FILES["background_new"]["size"];
// $bImageTmpName = $_FILES["background_new"]["tmp_name"];
// $bImageError = $_FILES["background_new"]["error"];

// if there is new main image
// if ($mImageName != "") {
//   unlink($mainImage);
//   $mainImage = uploadImage($mImageName, $mImageType, $mImageSize, $mImageTmpName, $mImageError, "topics");
// }

// if there is new background image
// if ($bImageName != "") {
//   unlink($backgroundImage);
//   $backgroundImage = uploadImage($bImageName, $bImageType, $bImageSize, $bImageTmpName, $bImageError, "topics");
// }

if ($action == "update") {
  if ( (isset($_FILES['main']) && $_FILES['main']['error'] == 0) || (isset($_FILES['background']) && $_FILES['background']['error'] == 0) ) {
    if ((! $_FILES['main']['error'] && $_FILES['main']['size'] < $max_file_size) || (! $_FILES['background']['error'] && $_FILES['background']['size'] < $max_file_size2)) {
      $ext = strtolower(pathinfo($_FILES['main']['name'], PATHINFO_EXTENSION));
      $ext2 = strtolower(pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION));
      if (in_array($ext, $valid_exts) || in_array($ext2, $valid_exts)) {

        $path = 'images/topics/' . uniqid() . '.' . $ext;
        if ($mImageName != "") {
          unlink($mainImage);
          $mainImage = $path;
        }

        $path2 = 'images/topics/' . uniqid() . '.' . $ext2;
        if ($bImageName != "") {
          unlink($backgroundImage);
          $backgroundImage = $path2;
        }

        $size = getimagesize($_FILES['main']['tmp_name']);
        $size2 = getimagesize($_FILES['background']['tmp_name']);

        $x = (int) $_POST['x'];
        $y = (int) $_POST['y'];
        $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
        $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

        $x1 = (int) $_POST['x2'];
        $y1 = (int) $_POST['y2'];
        $w1 = (int) $_POST['w2'] ? $_POST['w2'] : $size2[0];
        $h1 = (int) $_POST['h2'] ? $_POST['h2'] : $size2[1];

        $data = file_get_contents($_FILES['main']['tmp_name']);
        $data2 = file_get_contents($_FILES['background']['tmp_name']);

        $vImg = imagecreatefromstring($data);
        $vImg2 = imagecreatefromstring($data2);

        $dstImg = imagecreatetruecolor($nw, $nh);
        $dstImg2 = imagecreatetruecolor($nw2, $nh2);

        imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
        imagecopyresampled($dstImg2, $vImg2, 0, 0, $x1, $y1, $nw2, $nh2, $w1, $h1);

        imagejpeg($dstImg, $path);
        imagejpeg($dstImg2, $path2);

        imagedestroy($dstImg);
        imagedestroy($dstImg2);
        
        //save to database
        $conn = connectToDataBase();
        $sql = "UPDATE topics
          SET main_image='$mainImage', background='$backgroundImage', title='$title', short_desc='$short_desc', description='$desc', url='$url', tel='$tel', type='$type', order_num='$order'
          WHERE id = '$topicid'";

        $result = $conn->query($sql);
        validateQuery($conn, $sql);
        $conn->close();
        //Re-direct
        header("location: adminTopicDetails?topicID=$topicid");
      } else {
        echo 'unknown problem!';
      } 
    } else {
      echo 'file is too small or large';
    }
  } else {
    //save to database
    $conn = connectToDataBase();
    $sql = "UPDATE topics
          SET title='$title', short_desc='$short_desc', description='$desc', url='$url', tel='$tel', type='$type', order_num='$order', published = 1
          WHERE id = '$topicid'";

    $result = $conn->query($sql);
    validateQuery($conn, $sql);
    $conn->close();
    //Re-direct
    header("location: adminTopicDetails?topicID=$topicid");
  }
}else{
  // if delete / unpublish
  $sql = "UPDATE topics SET published = 0 WHERE id = '$topicid'";
}

?>
