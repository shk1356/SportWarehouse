<?php
require_once "classes/DBAccess.php";
$title = "Update";
$pageHeading = "Products";
include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

//get categories to poulate drop down list
$sql = "select CategoryID, CategoryName from Category";
$stmt = $pdo->prepare($sql);
//execute SQL query
$categoryRows = $db->executeSQL($stmt);
$message = "";
$error = false;


//update product when the button is clicked
if(isset($_POST["submit"]))
{

	//check if checkbox for featured is ticked
    if (isset($_POST["featured"])) {
        $featured = 1;
    } else {
        $featured = 0;
    }
    //save the file
    //specify directory where image will be saved
    $targetDirectory = "images/";
    //get the filename
    $photoPath = basename($_FILES["photoPath"]["name"]);
    //set the entire path
    $targetFile = $targetDirectory . $photoPath;
    //only allow image files
    $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);


    if($photoPath != '' && $imageFileType != "jpg" && $imageFileType != "png" &&
            $imageFileType != "jpeg" && $imageFileType != "gif" )
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
        if (move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile) || $photoPath == '')
        {
            if(!empty($_POST["oldPhoto"]))
            {
                $file = "images/" . $_POST["oldPhoto"];
                //delete the file using unlink
                unlink($file);
            }
					//check a product was supplied
            if(!empty($_POST["productName"]) && !empty($_POST["productID"]))
            {	
            //set up query to execute
                //update product
                $sql = "update items set 
                    ItemName=:productName,
                    PhotoPath= :photopath,
                    Price=:price,
                    Sale=:sale,
                    Description=:description,
                    Featured=:featured,
                    CategoryID=:categoryID 
                    WHERE ItemID = :productID";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(":productName" , $_POST["productName"], PDO::PARAM_STR);
                $stmt->bindParam(":photopath" ,$photoPath, PDO::PARAM_STR);
                $stmt->bindParam(":price" , $_POST["unitPrice"], PDO::PARAM_INT);
                $stmt->bindParam(":sale" , $_POST["Sale"], PDO::PARAM_INT);
                $stmt->bindParam(":description" , $_POST["description"], PDO::PARAM_STR);
                $stmt->bindParam(":featured" ,$_POST["featured"] , PDO::PARAM_BOOL);
                $stmt->bindParam(":categoryID" ,$_POST["category"], PDO::PARAM_INT);
                $stmt->bindParam(":productID" , $_POST["productID"], PDO::PARAM_INT);
                //execute SQL query
               
                $id = $db->executeNonQuery($stmt, false);
                $message = "The product was updated, id: " . $id;
            } else{
                $message = "Sorry, there was an error uploading your file. Error Code:" . $_FILES["photoPath"]["error"];
                $photoPath = "";
            }
        }
    }
}

		//display the product to be updated
//get the product id from the query string or from the posted data if the submit button was pressed
if(isset($_GET["id"]))
{
$prodId = $_GET["id"];
}
elseif (isset($_POST["productID"]))
{
$prodId = $_POST["productID"];
}
else
{
$prodId = 0;
}

$sql = "select * from items where ItemID = :ProductId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ProductId" , $prodId, PDO::PARAM_INT);
$rows = $db->executeSQL($stmt);


//select all products to display in a table
$sql = "select  ItemID,ItemName, PhotoPath,Price,Sale,Description,Featured,Category.CategoryName  from items,category where Category.CategoryID = items.CategoryID ";
$stmt = $pdo->prepare($sql);
$productRows= $db->executeSQL($stmt);


//start buffer
ob_start();
include "header.php" ;
//display products
include "templates/displayProductsUpdate.html.php";
//display product form
include "templates/productFormUpdate.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
?>