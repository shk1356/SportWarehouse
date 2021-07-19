<?php
require_once "classes/DBAccess.php";
$title = "Insert";
$pageHeading = "Categories";
//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();
$message = "";
//insert catehory when the button is clicked
if(isset($_POST["submit"]))
{
//check a category name was supplied
if(!empty($_POST["CategoryName"]))
{
//set up query to execute
$sql = "insert into Category(CategoryName) values(:CategoryName)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":CategoryName" , $_POST["CategoryName"], PDO::PARAM_STR);
//execute SQL query
$id = $db->executeNonQuery($stmt, true);
$message = "The category was added, id: " . $id;
}
}
//start buffer
ob_start();
//display form
include "templates/categoryForm.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
?>