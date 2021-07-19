<?php
require_once "classes/DBAccess.php";
$title = "Update";
$pageHeading = "Categories";
//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();
$message = "";
//update the category when the button is clicked
if(isset($_POST["submit"]))
{
//check a category name and id was supplied
if(!empty($_POST["CategoryName"]) && !empty($_POST["CategoryId"]))
{
//set up query to execute
$sql = "update Category set CategoryName=:CategoryName  where CategoryId = :CategoryId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":CategoryName" , $_POST["CategoryName"], PDO::PARAM_STR);
$stmt->bindValue(":CategoryID" , $_POST["CategoryID"], PDO::PARAM_INT);
//execute SQL query
$db->executeNonQuery($stmt, false);
$message = "The category was updated";
}
}
//display the category to be updated
//get the category id from the query string or from the posted data if the submit button was pressed
if(isset($_GET["id"]))
{
$catId = $_GET["id"];
}
elseif (isset($_POST["CategoryId"]))
{
$catId = $_POST["CategoryId"];
}
else
{
$catId = 0;
}
$sql = "select CategoryID, CategoryName from Category where CategoryID = :CategoryId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":CategoryId" , $catId, PDO::PARAM_INT);
$rows = $db->executeSQL($stmt);


//select all categories to display in a table
$sql = "select CategoryID,CategoryName from Category";
$stmt = $pdo->prepare($sql);
$categoryRows = $db->executeSQL($stmt);
//start buffer
ob_start();
//display categories
include "templates/displayCategory.html.php";
//display form
include "templates/categoryForm2.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
?>
















