<?php
$to = 'jess_tjl@hotmail.com';
$subject = "Welcome to Dear Carrie!";
// Get HTML contents from file
$htmlContent = file_get_contents("new_follower.php");
$htmlContent = str_replace("{name}", "Jess", $htmlContent);

// Set content-type for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Dear Carrie<jess_tjl@hotmail.com>' . "\r\n";
//$headers .= 'Cc: codexworld@gmail.com' . "\r\n";
// Send email
if(mail($to,$subject,$htmlContent,$headers)):
	$successMsg = 'Email has sent successfully.';
else:
	$errorMsg = 'Some problem occurred, please try again.';
endif;
?>
