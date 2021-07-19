<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title> sports warehouse </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	
</head>
<body class="no-js">
<div id="wrapper">

<?php include "header.php" ?>



<div id= "content-wrapper" class="clearfix">
<div id="logo-box" >
<div id="logo">
	<img src="images/sports-warehouse-logo.png" id="logo-responsive" width="600" height="82" alt="sports-warehouse-logo"></div>
 <?php

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
</div>


<?php

require_once "classes/DBAccess.php";

$title = "Products by category";

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
include "templates/menu.html.php";
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



<?php

require_once "classes/DBAccess.php";

$title = "Products by category";

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
include "templates/m-middlebar.html.php";
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
include "templates/products-middlebar.html.php";

}
$output = ob_get_clean();

include "templates/layout.html.php";

$pdo = null;
?>








<div id="slideshow">
<ul class="bxslider" >

				<li>
					<div class="slide1">
						<img src="images/background-ball.gif" alt="sport warehouse" >
						
					</div>
					<div class="slide2"><img src="images/bluebg.png" alt="sport warehouse" >
					</div>
					<div class="overlay">

						
							<p class="textblue"> View our brand <br> new range of </p>
							<p id="textblue2"> Sports<br> balls</p>
							<p class="shop-now">Shop now</p>
						
					</div>
				</li>
				<li>
					<div class="slide1">
						<img src="images/image-2.png" alt="sport warehouse" >
						
					</div>
					<div class="slide2">
						<img src="images/bluebg.png" alt="sport warehouse" >
					</div>
					<div class="overlay">
						<p class="textblue"> Get protected with <br>the new range of </p>
							<p id="textblue2"> Protective <br>helmets</p>
							<p class="shop-now">Shop now</p>
					</div>
				</li>
				<li>
					<div class="slide1">
					<img src="images/image-3.gif" alt="sport warehouse" >
				</div>
				<div class="slide2">
						<img src="images/bluebg.png" alt="sport warehouse" >
					</div>
					<div class="overlay">
						<p class="textblue"> Get ready to race <br> with our professional</p>
							<p id="textblue2">Training<br>gear</p>
							<p class="shop-now">Shop now</p>
					</div>
				</li>
				
			</ul>
</div>


<div id="featured">
<p id="txorange">Feature products</p>
 </div>


<div class="gallery clearfix">
				

<?php
require_once "classes/DBAccess.php";
$title = "Featured products";
include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();
$sql= "select * from items where Featured=1 order by rand() limit 5";
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);
ob_start();
include "templates/featured.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null;
?>


</div>

<div id="ourbrand">
<p id="txorange2">Our brands and partnerships </p>

 </div>


<div id ="brand-content">
	<div id="brands">
		<p id="ourbrand-tx"> These are some of our top brands and partnerships.</p>
		<p id="ourbrand-tx2">The best of the best is here .</p>
	</div>
	<SECTION id="darkblue-bar">
		<ul id="darkblue">
		<li><a href="#"><img src="images/nike.png" alt="Nike"> </a></li>
		<li><a href="#"><img src="images/addidas.png" alt="Addidas"></a></li>
		<li><a href="#"><img src="images/logo_skins.png" alt="Skins"></a></li>
		<li><a href="#"><img src="images/logo_asics.png" alt="Asics"></a></li>
		<li><a href="#"><img src="images/logo_newbalance.png" alt="Newbalance"></a></li>
		<li><a href="#"><img src="images/logo_wilson.png" alt="Wilson"></a></li>
	    </ul>
	</SECTION></div>
	<div>
		<table  id="tbl-brands">
			<tr>
				<td><a href="#"><img src="images/nike.png" alt="Nike"> </a></td>
				<td><a href="#"><img src="images/addidas.png" alt="Addidas"></a></td>
				<tD><a href="#"><img src="images/logo_skins.png" alt="Skins"></a></tD>
			</tr>
			<tr>
				<td><a href="#"><img src="images/logo_asics.png" alt="Asics"></a></td>
				<td><a href="#"><img src="images/logo_newbalance.png" alt="Newbalance"></a></td>
				<td><a href="#"><img src="images/logo_wilson.png" alt="Wilson"></a></td>
			</tr>
		</table>

	</div>
	


</div>

<footer id="basefooter" class="clearfix">
		<div id="up-footer" class="clearfix">
		<nav id="footer1" >
			<p class=head-footer>site navigation</p>
			<ul id="navigation1">
				<li><a href="index.php"> Home</a></li>
				<li><a href="#"> About SW</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="viewProducts.php"> View Products</a></li>
				<li><a href="#"> Privacy Policy</a></li>
			</ul>
		</nav>
	

	

<?php
require_once "classes/DBAccess.php";
$title = "Products by category";
include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$sql = "select CategoryName, CategoryID from Category";

//execute SQL query
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);
ob_start();

include "templates/menu2.html.php";
$categoryName = "";
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
$rows = $db->executeSQL($stmt);

include "templates/products.html.php";
}

$output = ob_get_clean();

include "templates/layout.html.php";
$pdo = null;
?>





		<nav id="footer3">
			<p class="head-footer">Contact Sports Warehouse</p>
			
				
				<div id="warehouse-contact">
				<a href="#">
					<figure id="figure-facebook">
						
						<figcaption class="figure-cap">

							<p class="p-cap">Facebook</p>
						</figcaption>
					</figure></a>
				<a href="#">
					<figure id="figure-twitter">
						
						<figcaption class="figure-cap">

							<p class="p-cap">Twitter</p>
						</figcaption>
					</figure></a>
				<a href="#">
					<figure id="figure-other">
						
						<figcaption class="figure-cap">

							<p class="p-cap">Other</p>
						</figcaption>
					</figure></a>
				</div>
				<div id="contact-link">
					<ul>
						<li><a href="contactus.">Online form</a></li>
						<li><a href="#">Email</a></li>
						<li><a href="#">Phone</a></li>
						<li><a href="#">Address</a></li>
					</ul>
				</div>
		</nav>
	</div>
	<div id="copyright-warehouse">
	<p id="copyright">&#xa9;Copyright 2020 Sports Warehouse.All rights reserved.Warehouse made by Awesomesause Design</p>	
	</div>
  </footer>

 </div>

 	
	


	<!-- Include jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
	<!-- Include jQuery plugins AFTER including the jQuery library -->
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<!-- Initialisation code for jQuery plugins -->
	<script>

		// Using jQuery - wait until the page has finished loading before running the JS code
		$(document).ready(function(){

			// Activate and customise the bxSlider slideshow
			$('.bxslider').bxSlider({
				mode: 'horizontal',	// 'horizontal', 'vertical', 'fade'
				captions: true,
				pager: true,
				auto: true,
				pause: 3000, 		// how long each slide stays visible for = 3s
				speed: 500,			// transition speed = 500ms = 0.5s
				autoHover: true		// pause slideshow on mouse hover
			});
		});

	</script>



	


	
</body>
</html>









