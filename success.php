<?php
session_start();

require_once "classes/authentication.php";
$title = "Success";
$pageHeading = "Login Successful";
$loginName = $_SESSION["username"];
//start buffer
ob_start();
include "header.php";
//display create user form
include "templates/success.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
?>