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

	/*$to      = $email;
	$subject = "Dear Carrie - Forget Password";
	$message = "Hello," . "\n\n";
	$message .= "Here is your new password : " . $myPass . "\n";
	$message .= "Please change your password after you login into Dear Carrie" . "\n\n";
	$message .= "Thank You" . "\n";
	$headers = "From: no-reply@mail.com" . "\r\n" .
	"Reply-To: no-reply@mail.com" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();

	mail($to, $subject, $message, $headers);*/
	
	//send email
	$subject = "Dear Carrie - Forget Password";
	// Get HTML contents from file
	$htmlContent = '
		<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;">
			<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tbody>
		        <tr>
		
		        	<td>
		                <table align="center" width="690px" border="0" cellspacing="0" cellpadding="0" style="width:690px!important;padding:20px;">
		                <tbody>
											<tr align="center" style="margin:30px 0 40px 0;display:block;">
													<td><a href="http://www.jessdesigntan.com/fyp" target="_blank"><img src="http://jessdesigntan.com/fyp/images/logo.svg" alt="dear carrie" width="200"></a></td>
											</tr>
		                	<tr>
		                    	<td>
		                			<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #eee;border-top:5px solid #ff5a5f;">
		                            <tbody>
		                                <tr>
		                                    <td colspan="3" align="center" style="margin:0;padding:0;">
		                                        <table width="690" align="center" border="0" cellspacing="0" cellpadding="0" style="margin:0px!important;">
		                                        <tbody>
																							<!--<tr>
																								<td align="center">
																									<img src="http://jessdesigntan.com/fyp/images/split.jpg" width="100%">
																								</td>
																							</tr>-->
		                                        	<tr>
		                                            <td align="center" style="display:block;margin-top:30px;">
		                                                <h1 style="font-weight:100;">Dear Carrie - Forget Password</h1>
		                                            </td>
		                                          </tr>
																							<tr style="padding:0 20px;display:block;">
																								<td align="center" style="display:block;margin-top:20px;">
		                                                <p style="color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0">Hi '.$email.',<br/><br/></p>
		                                                <p style="color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0">Here is your new password : '. $myPass .'</p>
																										<p style="color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0;text-align:center;">Please change your password after you login into Dear Carrie.</p>
		                                            </td>
		                                          </tr>
		                                          <tr>
		                                            <td colspan="4">
		                                                <div style="width:100%;text-align:center;margin:30px 0">
		                                                    <table align="center" cellpadding="0" cellspacing="0" style="font-family:HelveticaNeue-Light,Arial,sans-serif;margin:0 auto;padding:0">
		                                                    <tbody>
		                                                    	<tr>
		                                                            <td align="center" style="margin:0;text-align:center"><a href="http://www.jessdesigntan.com/fyp" style="text-transform:uppercase;font-size:13px;line-height:20px;text-decoration:none;color:#ffffff;background-color:#ff5a5f;padding:12px 30px;display:block;letter-spacing:2px" target="_blank">Go to site</a></td>
		                                                      	</tr>
		                                                   	</tbody>
		                                                    </table>
		                                               	</div>
		                                           	</td>
		                                       		</tr>
		                                        	<tr><td colspan="3" height="30"></td></tr>
		                                 	</tbody>
		                                    </table>
		                             	</td>
		                   			</tr>
		
		                          	</tbody>
		                            </table>
		                  			<table align="center" width="690px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:690px!important">
		                            <tbody>
		                            	<tr>
		                                	<td>
		                                        <table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
		                                        <tbody>
		                                            <tr>
		                                            	<td width="360" valign="top" style="padding:20px;">
		                                              	<div style="color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0">&copy; 2017 Dear Carrie.</div>
		                                              	<div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
		                                              	<div style="color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0">All rights reserved.</div>
		                                        			</td>
		                                              	<td align="right" valign="top" style="padding:20px;">
		                                                	<span style="line-height:20px;font-size:10px"><a href="https://www.facebook.com" target="_blank"><img src="http://jessdesigntan.com/fyp/images/facebook.svg" alt="fb" width="30px"></a>&nbsp;</span>
		                                              	</td>
		                                            </tr>
		                                            <tr><td colspan="2" height="5"></td></tr>
		
		                                      	</tbody>
		                                        </table>
		                                   	</td>
		                  				</tr>
		                          	</tbody>
		                            </table>
		                  		</td>
		                	</tr>
		              	</tbody>
		                </table>
		            </td>
				</tr>
		 	</tbody>
		    </table>
		</div>

	';
	
	// Set content-type for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	// Additional headers
	$headers .= 'From: Dear Carrie<jess_tjl@hotmail.com>' . "\r\n";
	//$headers .= 'Cc: codexworld@gmail.com' . "\r\n";
	// Send email
	if(mail($email,$subject,$htmlContent,$headers)):
	$successMsg = 'Email has sent successfully.';
	else:
	$errorMsg = 'Some problem occurred, please try again.';
	endif;
  	//header("Location: /fyp");
  	header("Location: forgetPassword?msg=<strong>Account recovery email sent to $email.</strong><br /> If you don't see this email in your inbox within 15 minutes, look for it in your junk mail folder. If you find it there, please mark it as \"Not Junk\". ");
}
?>
