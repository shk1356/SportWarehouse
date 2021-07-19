<?php
include "header.php";

require_once "classes/DBAccess.php";
$title = "view Products";
include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);

$pdo = $db->connect();
$sql = "select  ItemID,ItemName,PhotoPath,Price,Sale,Description from items ";
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);
ob_start();

include "templates/allProducts.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null;
?>
