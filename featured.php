<?php

require_once "classes/DBAccess.php";

$title = "Featured products";

//get database settings
include "settings/db.php";
//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();


$sql= "select * from items where Featured=1 order by rand() limit 5";
//execute SQL query
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);

//start buffer
ob_start();

//display categories
include "templates/featured.html.php";


$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null;
?>