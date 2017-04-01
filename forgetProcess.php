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

	$sql = "update users set password = '$hashPassword' WHERE email = '$email'";
	$result = $conn->query($sql);
	validateQuery($conn, $sql);
  	//send email for step new password

	$to      = $email;
	$subject = "Dear Carrie - Forget Password";
	$message = "Hello," . "\n\n";
	$message .= "Here is your new password : " . $myPass . "\n";
	$message .= "Please change your password after you login into Dear Carrie" . "\n\n";
	$message .= "Thank You" . "\n";
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // Additional headers
  $headers .= 'From: Dear Carrie<jess_tjl@hotmail.com>' . "\r\n";

	mail($to, $subject, $message, $headers);
  	//header("Location: /fyp");
  	header("Location: forgetPassword?msg=<strong>Account recovery email sent to $email.</strong><br /> If you don't see this email in your inbox within 15 minutes, look for it in your junk mail folder. If you find it there, please mark it as \"Not Junk\". ");
}
?>
