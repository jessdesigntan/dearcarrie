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

function getCommentByID($id) {
	$conn = connectToDataBase();

	$sql = "SELECT *
					FROM comments c
					INNER JOIN users u ON c.userid = u.id
					WHERE  c.id = '$id'
					ORDER BY c.id DESC, u.role ASC ";

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


function displayAllTopicsOrderByTitleAsc() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topics ORDER BY title ASC";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 showErrorMessage("No topics found");
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
	$sql = "SELECT * FROM topics ORDER BY id DESC";
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

function getAllCommentsByPostID($id) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM comments WHERE postid = $id";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	} else {
		 //showErrorMessage("No comments found");
	}
	$conn->close();
	return $resArr;
}

function getAllTopicsByPostID($id) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM curation WHERE postid = $id";
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
						echo "Unable to insert the Image due to image error";
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

function displayPubStatus($status) {
	if ($status) {
		return "Published";
	}
	else {
		return "Unpublished";
	}
}

function displayFeaturedTopics() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topics WHERE type = 'featured' ORDER BY order_num";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	}

	$conn->close();
	return $resArr;
}

function displayCuratedTopics() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topics WHERE type = 'curated' ORDER BY order_num";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	}
	$conn->close();
	return $resArr;
}

function displayMainTopics() {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topics WHERE type = 'main' ORDER BY order_num";
	$result = $conn->query($sql);
	$resArr = array();

	if ($result->num_rows > 0) {
		 // output data of each row
		 while($row = $result->fetch_assoc()) {
			 $resArr[] = $row;
		 }
	}
	$conn->close();
	return $resArr;
}

function getPostsByTopicID($topicid) {
	$conn = connectToDataBase();
	$sql = "SELECT *
					FROM posts p
					INNER JOIN curation c ON p.id = c.postid
					WHERE published = 1 AND c.topicid = '$topicid'
					ORDER BY p.id DESC";
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

//make sure posts are published
function countPostByTopicID($topicid) {
	$conn = connectToDataBase();
	$sql = "SELECT COUNT(*) AS total
					FROM curation c
					INNER JOIN posts p ON c.postid = p.id
					WHERE c.topicid='$topicid' AND p.published = 1";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value["total"];
}

function countFollowersByTopicID($topicid) {
	$conn = connectToDataBase();
	$sql = "SELECT COUNT(*) AS total
					FROM topic_follow
					WHERE topicid = '$topicid'";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();

	$conn->close();
	return $value["total"];
}

function followTopic ($userid, $topicid) {
	$conn = connectToDataBase();
	$sql = "INSERT INTO topic_follow (userid, topicid) VALUES ('$userid', '$topicid')";
	validateQuery($conn, $sql);
}

function unfollowTopic ($userid, $topicid) {
	$conn = connectToDataBase();
	$sql = "DELETE FROM topic_follow WHERE userid = '$userid' AND topicid = '$topicid'";
	validateQuery($conn, $sql);
}

function isFollowingTopic ($userid, $topicid) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM topic_follow WHERE userid='$userid' AND topicid='$topicid' LIMIT 1";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
			return true; //is following
	} else {
		return false;
	}
}

function isFollowingPost ($userid, $postid) {
	$conn = connectToDataBase();
	$sql = "SELECT * FROM post_follow WHERE userid='$userid' AND postid='$postid' LIMIT 1";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
			return true; //is following
	} else {
		return false;
	}
}

function followPost ($userid, $postid) {
	$conn = connectToDataBase();
	$sql = "INSERT INTO post_follow (userid, postid) VALUES ('$userid', '$postid')";
	validateQuery($conn, $sql);
}

function unfollowPost ($userid, $postid) {
	$conn = connectToDataBase();
	$sql = "DELETE FROM post_follow WHERE userid = '$userid' AND postid = '$postid'";
	validateQuery($conn, $sql);
}
?>
