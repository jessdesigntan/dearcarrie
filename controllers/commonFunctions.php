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

function validateQuery($conn, $sql){
	if ($conn->query($sql) === FALSE) {
		header("location: error.php?msg=Database connection error");
		exit();
	}
}
?>
