<?php
include "header.php";
session_start();


//read stylesheet theme from session
	if(isset($_SESSION["theme"]))
	{
		$theme = $_SESSION["theme"] . ".css";
	}
	else
	{
		$theme = "plain.css";
	}
	$message = "";

require_once "classes/DBAccess.php";
$title = "Delete";
$pageHeading = "products";
//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();
$message = "";
//get category id to delete
if(!empty($_GET["id"])&& !empty($_GET["photo"]))
{
	//set up query to execute
	$sql = "delete from items where ItemID=:itemID";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":itemID" , $_GET["id"], PDO::PARAM_INT);
	//execute SQL query
	$affectedRows= $db->executeNonQuery($stmt, false);
	if($affectedRows === -1)
	{
	$message = "The product cannot be deleted .";
	}
	else
	{
	$message = "The product was deleted";
	}


	//delete the file if the photo is not set to none
	if($_GET["photo"] != "none")
	{
	$file = "images/" . $_GET["photo"];
		if (!unlink($file))
		{
		$message = "Error deleting $file";
		}
		else
		{
			$message = "The product and photo was deleted";
		}
	}
}
//select all products to display in a table
$sql = "select ItemID,ItemName,PhotoPath,Price,Sale,Description,Featured from items";
$stmt = $pdo->prepare($sql);
$ProductRows = $db->executeSQL($stmt);

//start buffer
ob_start();
//display categories
include "templates/displayProductsDelete.html.php";
include "templates/layout2.html.php";

$output = ob_get_clean();
include "templates/layout.html.php";
?>