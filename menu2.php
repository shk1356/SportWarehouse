<?php
include "header.php";

require_once "classes/DBAccess.php";

$title = "Products by category";
//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//set up query to execute
$sql = "select CategoryName, CategoryID from Category";

//execute SQL query
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);

//start buffer
ob_start();

//display categories
include "templates/menu2.html.php";
$categoryName = "";

//check if there is a query string field named id
if(isset($_GET["id"]))
{
//retrieve category name
$sql = "select categoryName from Category where categoryID = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET["id"]);
$categoryName = $db->executeSQLReturnOneValue($stmt);

//retreive products
$sql = "select ItemID ,ItemName,PhotoPath,Price,Sale,Description from items where categoryID = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET["id"]);
//execute SQL query
$rows = $db->executeSQL($stmt);
//display products

include "templates/products.html.php";
}

$output = ob_get_clean();

include "templates/layout.html.php";
$pdo = null;
?>




