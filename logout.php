<?php
session_start();
$_SESSION["email"] = "";
unset($_SESSION["email"]);
$_SESSION["role"] = "";
unset($_SESSION["role"]);
session_destroy();
header("Location: /fyp");
?>
