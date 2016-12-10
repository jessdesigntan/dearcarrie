<?php
include ('controllers/templates.php');

$userid = $_SESSION["userid"];
$old = md5($_POST["password_old"]);
$new = md5($_POST["password_new"]);
$confirm = md5($_POST["password_confirm"]);

$conn = connectToDataBase();
$sql = "SELECT password FROM users WHERE id ='$userid'";
$result = $conn->query($sql);
$value = $result->fetch_assoc();
$currentPw = $value["password"];

if ($currentPw != $old) {
  header("Location: editProfile?userID=$userid&msg=You entered the wrong password");
}

else {
  $updateSql = "UPDATE users SET password='$new' WHERE id='$userid'";
  validateQuery($conn, $updateSql);
  header("Location: editProfile?userID=$userid");
}

echo $currentPw;
?>
