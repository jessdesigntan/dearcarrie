<?php
include("controllers/templates.php");

//Get form values
$name = htmlentities($_POST["name"],ENT_QUOTES);
$email = $_POST["email"];
$password = $_POST["password1"];
$password2 = $_POST["password2"];

//Form validation
if ($password != $password2) {
  header("location: signup");
}
else {
  //Add to db
  $conn = connectToDataBase();
  $hashPassword = md5($password);
  $sql = "INSERT INTO users (name, email, password)
  VALUES ('$name', '$email', '$hashPassword')";

  validateQuery($conn, $sql);

  //Logged user in immediately
  $_SESSION["userid"] = $conn->insert_id;;
  $_SESSION["email"] = $email;
  $_SESSION["role"] = "normal";
  $_SESSION["name"] = strtok($name, " "); //get first word of the name

  //send email
  $subject = "Welcome to Dear Carrie!";
  // Get HTML contents from file
  $htmlContent = file_get_contents("email/new_user.php");
  $htmlContent = str_replace("{name}", $name, $htmlContent);

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


  //Re-direct
  header("location: /fyp");
}
?>
