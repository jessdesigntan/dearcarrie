<?php
include("controllers/templates.php");

//Get form values
$name = $_POST["name"];
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
  $_SESSION["email"] = $email;
  $_SESSION["role"] = "normal";
  
  //Re-direct
  header("location: /fyp");
}
?>
