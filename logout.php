<?php
session_start();
$_SESSION["userid"] = "";
unset($_SESSION["userid"]);

$_SESSION["email"] = "";
unset($_SESSION["email"]);

$_SESSION["role"] = "";
unset($_SESSION["role"]);

$_SESSION["name"] = "";
unset($_SESSION["name"]);

session_destroy();

if (isset($_SERVER["HTTP_REFERER"])) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
