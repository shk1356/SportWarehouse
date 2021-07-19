<?php
include "header.php";

session_start();
require_once "classes/authentication.php";

$title = "Login";
$pageHeading = "Login";
//the authentication class is static so there is no need to create an instance of the class
$message = "";
if(isset($_POST["loginSubmit"]))
{
if(!empty($_POST["username"]) && !empty($_POST["password"]))
{
//authenticate user
$loginSuccess = authentication::login($_POST["username"], $_POST["password"]);
if(!$loginSuccess)
{
$message = "Username or password incorrect";
$error = true;
}
}
}

//start buffer
ob_start();

//display create user form
include "templates/LoginForm.html.php";
$output = ob_get_clean();

include "templates/layout.html.php";
?>