<?php
include("controllers/templates.php");

$email = $_POST["email"];

$conn = connectToDataBase();
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$value = $result->fetch_assoc();

validateQuery($conn, $sql);

if (count($value["id"]) == 0) {
  header("Location: forgetPassword?msg=This email is not registered in Dear Carrie. Please sign up for new account.");
}

else {
	//random new password
	$myPass = randomPassword();
	$hashPassword = md5($myPass);

	$sql = "UPDATE users SET password = '$hashPassword' WHERE email = '$email'";
	$result = $conn->query($sql);
	validateQuery($conn, $sql);

  //get user details
  $userID = getUserIDByEmail($email);
  $username = getUserByID($userID);
  $name = $username["name"];
	//send email
	$subject = "Dear Carrie - Forget Password";
	// Get HTML contents from file
  $htmlContent = file_get_contents("email/password_reset.php");

  $htmlContent = str_replace("{name}", $name, $htmlContent);
  $htmlContent = str_replace("{newPass}", $myPass, $htmlContent);


	// Set content-type for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Additional headers
	$headers .= 'From: Dear Carrie<jess_tjl@hotmail.com>' . "\r\n";

	// Send email

	if(mail($email,$subject,$htmlContent,$headers)):
	$successMsg = 'Email has sent successfully.';
	else:
	$errorMsg = 'Some problem occurred, please try again.';
	endif;

  // Redirect
  header("Location: forgetPassword?msg=<strong>Account recovery email sent to $email.</strong><br /> If you don't see this email in your inbox within 15 minutes, look for it in your junk mail folder. If you find it there, please mark it as \"Not Junk\". ");
}
?>
