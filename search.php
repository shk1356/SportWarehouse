 <?php
include "header.php";

require_once "classes/DBAccess.php";
//start buffer
ob_start();
//display the search form

include "templates/search.html.php";

//check if the search button has been pressed
if (isset($_GET["submitButton"]) && isset($_GET["search"]))
{
$search = $_GET["search"];

include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();

//set up query to execute
$sql = "select ItemID,ItemName,PhotoPath,Price,Sale,Description from items where ItemName like :ItemName ";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":ItemName", "%$search%");
//execute SQL query
$rows = $db->executeSQL($stmt);
//display products

include "templates/searchproduct.html.php";
}
$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null;
?>


   
