<?php
ob_start();
session_start();
/***************** SESSION FUNCTIONS *********************/

// return true if user is logged in
function checkLogin() {
	if(isset($_SESSION["role"])) {
		return false;
	}
	else {
		return true;
	}
}

function checkRole($userRole, $role) {
	if($userRole != $role) {
		return false;
	}
	else {
		return true;
	}
}

function goBackIfNotEqual($currentUser, $userID) {
	if($currentUser != $userID) {
		echo "<script type='text/javascript'>history.go(-1);</script>";
		exit;
	}
}

function redirectToLogin($userRole, $role) {
	if($userRole != $role) {
		echo "<script type='text/javascript'>window.top.location='/fyp/login';</script>";
		exit;
	}
}

/***************** DB INITIALIZATION *********************/
function connectToDataBase() {
	$theLineToDatabase =  mysqli_connect("localhost","root","root","dearcarrie");

	if(!$theLineToDatabase) {
		header("location: error.php?msg=Database connection error");
		exit();
	}
	else {
	  return $theLineToDatabase;
	}
}

/***************** QUERY FUNCTIONS *********************/
function getUserIDByEmail ($email) {
	$conn = connectToDataBase();

	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();
	return $value["id"];
}


/***************** QUICK CHECKS *********************/
//return true if empty
function ifEmpty($var) {
	if (empty($var)) {
    return true;
	}
	else {
		return false;
	}
}

function validateQuery($conn, $sql){
	if ($conn->query($sql) === FALSE) {
		header("location: error.php?msg=Database connection error");
		exit();
	}
}

function getPostByID($id) {
	$conn = connectToDataBase();

	$sql = "SELECT * FROM posts WHERE id = '$id'";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value;
}


function getUserByID($id) {
	$conn = connectToDataBase();

	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value;
}

function getTopicByID($id) {
	$conn = connectToDataBase();

	$sql = "SELECT * FROM topics WHERE id = '$id'";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value;
}

function displayAllPost() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM posts WHERE published = 1 ORDER BY id DESC";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No posts found");
	}
	$conn->close();
	return $resArr;
}

function displayAllPostByUserID($id) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM posts WHERE userid ='$id' AND published = 1 ORDER BY id DESC ";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No posts found");
	}
	$conn->close();
	return $resArr;
}

function displayAllTopics() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topics WHERE published = 1";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No posts found");
	}
	$conn->close();
	return $resArr;
}

function displayAllUsers() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No posts found");
	}
	$conn->close();
	return $resArr;
}

function showErrorMessage($msg) {
	header("Location: error.php?msg=$msg");
}

function countPostByUserID($id) {
	$conn = connectToDataBase();
	$sql = "SELECT COUNT(*) AS total FROM posts WHERE userid='$id' AND published = 1";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value["total"];
}

function searchPost($keyword) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM posts WHERE title lIKE '%$keyword%' OR description LIKE '%$keyword%' AND published = 1";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No posts found");
	}
	$conn->close();
	return $resArr;
}

//for uploading of imageSizefunction uploadImage($imageName, $imageType, $imageSize, $imageTmpName, $imageError){
//returns string finalImageName
function uploadImage($imageName, $imageType, $imageSize, $imageTmpName, $imageError, $path) {
	//mime = multipurpose internet mail extensions
	$imgMimes = Array( 'image/jpeg', 'image/gif', 'image/pjpeg', 'image/png', 'image/bmp', 'image/jpg', 'image/svg+xml');

	//if( in_array($imageType, $imgMimes)){
	if($check !== false) {

				if($imageError == 0 && $imageSize <= (1024*1024)) {
					$randomNumber = rand(100, 10000000);
					$finalImageName = "images/".$path."/".$randomNumber."_".$imageName;

					if(move_uploaded_file($imageTmpName, $finalImageName)) {

						return $finalImageName;
					}//end of if (move uploaded file)

					else {
						echo "here";
						//header("location: error.php?msg=Unable to insert the Image due to image error");
						exit();
					}//end of else
				}// end of if (image error & size)

				else {
					header("location: error.php?msg=Image size is too large/ There is an error in the image");
					exit();
				}
		}//end of if for image validation

		/*else {
			header("location: error.php?msg=Please insert an image type.");
			exit();
		}*/
}
?>
