<?php
include("controllers/templates.php");

$email = $_POST["email"];
$password = md5($_POST["password"]);

$conn = connectToDataBase();
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);
$value = $result->fetch_assoc();

validateQuery($conn, $sql);

if (count($value["id"]) == 0) {
  header("Location: login?msg=Username does not exists or password is wrong");
}

else {
  $_SESSION["email"] = $value["email"];
  $_SESSION["role"] = $value["role"];
  header("Location: /fyp");
}
?>
