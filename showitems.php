
<?php

require_once "classes/DBAccess.php";

$title = "display products";

include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//start buffer
ob_start();

//set up query to execute
$sql = "select ItemID from items";

//execute SQL query
$stmt = $pdo->prepare($sql);
$productRows = $db->executeSQL($stmt);


//check if there is a query string field named id
if(isset($_GET["id"]))
{


//retreive products
$sql = "select ItemID ,ItemName,PhotoPath,Price,Sale,Description from items where ItemID = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET["id"]);
//execute SQL query
$productRows = $db->executeSQL($stmt);

include "header.php";
//display products
include "templates/displayProducts.html.php";

}
$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null;
?>




