<?php
session_start();

include "header.php";
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
$title = "Insert";
$pageHeading = "Products";
//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();

$message = "";
$error = false;


//get categories to poulate drop down list
$sql = "select CategoryId, CategoryName from Category";
$stmt = $pdo->prepare($sql);
//execute SQL query
$categoryRows = $db->executeSQL($stmt);

//insert product when the button is clicked
if(isset($_POST["submit"]))
{
//check if checkbox for discontinued is ticked
	if (isset($_POST["featured"]))
	{
	$featured = 1;
	}
	else
	{
	$featured = 0;
	}


	//check a product name was supplied
		if(!empty($_POST["itemName"]))
		{
		//save the file
		//specify directory where image will be saved
		$targetDirectory = "images/";
		//get the filename
		$photoPath = basename($_FILES["photoPath"]["name"]);
		//set the entire path
		$targetFile = $targetDirectory . $photoPath;
		//only allow image files
		$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" )
			{
				$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$error = true;
			}
		//check the file size php.ini has an upload_max_filesize, default set to 2M
		//if the file size exceeds the limit the error code is 1
			if ($_FILES["photoPath"]["error"] == 1)
			{
			$message = "Sorry, your file is too large. Max of 2M is allowed.";
			$error = true;
			}
			if($error == false)
			{
				if (move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile))
				{
					$message = "The file $photoPath has been uploaded.";
				}
				else
				{
				$message = "Sorry, there was an error uploading your file. Error Code:" . $_FILES["photoPath"]["error"];
				$photoPath = "";
				}
			}
			else
			{
			$photoPath = "";
			}

		//set up query to execute
		//insert product
		$sql = "insert into items(ItemName,PhotoPath,Price,Sale,Description,Featured, CategoryID)
		values(:itemName,:PhotoPath,:price,:sale,:description,:featured,:CategoryID)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":itemName" , $_POST["itemName"], PDO::PARAM_STR);
		$stmt->bindValue(":PhotoPath" , $photoPath, PDO::PARAM_STR);
		$stmt->bindValue(":price" , $_POST["Price"], PDO::PARAM_INT);
		$stmt->bindValue(":sale" , $_POST["sale"], PDO::PARAM_STR);
		$stmt->bindValue(":description" , $_POST["description"], PDO::PARAM_STR);
		$stmt->bindValue(":featured" , $_POST["featured"], PDO::PARAM_BOOL);
		$stmt->bindValue(":CategoryID" , $_POST["category"], PDO::PARAM_INT);


		//execute SQL query
		$id = $db->executeNonQuery($stmt, true);
		$message = "The product was added, id: " . $id;
		}
}
//start buffer


ob_start();
include "templates/layout2.html.php";
//display page content
include "templates/displayContent.html.php";
//display form
include "templates/productForm.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";



?>