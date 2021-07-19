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

<div id="header-top" >
  <div class="clearfix">
		


	<nav id="d-menubar" class="hide-on-phone">
	<ul id="topmenu" class="hide-on-phone">
  		<li><a href="index.php">Home</a></li>
  		<li><a href="aboutUs.php">About SW</a></li>
  		<li><a href="contactus.php">Contact Us</a></li>
  		<li ><a href="viewProducts.php">View Products</a></li>
	</ul>
	</nav>

  <div id="menubar-right">
	
		<div id="d-login"><a href="login.php"  class="hide-on-phone"><i class="fa fa-lock" style="font-size: 20px;padding-right: 5px;">
		</i> Login</a></div>
  		<div id="view-cart"><a href="shopping.php" ><i class="fa fa-shopping-cart" style="font-size: 20px;padding-right: 10px;"></i>view cart </a></div>
  		<div id="item">
  			0 items
  		</div>
  	</div>
  </div>

<div id="menu-container">
<div id="menu-toggle" >
		<i class="fa fa-bars" style="font-size: 22px;"></i> Menu</div>		
<nav id="m-menubar" class="show">
	<ul>
		<li><a href="login.php"><i class="fa fa-lock" style="padding-right:5px;"> </i> Login </a></li>
		<li><a href="index.php"><i class="fa fa-circle-thin" style="padding-right: 5px;"></i> Home </a></li>
		<li><a href="#"><i class="fa fa-circle-thin" style="padding-right: 5px;"></i>About SW </a></li>
		<li><a href="contactus.php"><i class="fa fa-circle-thin"  style="padding-right: 5px;"></i> Contact Us </a></li>
		<li><a href="viewProducts.php"><i class="fa fa-circle-thin"  style="padding-right: 5px;"> </i> View Products</a></li>
	</ul>
</nav>
</div>
</div>
</div>
<script type="text/javascript">
		
		// Remove the "no-js" class from the body element to show the JS is running :)
		document.body.classList.remove("no-js");

		
		
		/*// Find menu toggle and add click event
		document.getElementById("menu-toggle").addEventListener("click", function (event) {

			// Stop hyperlink navigation
			event.preventDefault();

			// Toggle (add/remove) CSS class on the menu
			document.getElementById("menu").classList.toggle("show");
		});*/


		/*
		 * Same same, but with error checking and newer JS.
		 * NOTE: Use Babel.js to make your brand new JS code work in old(er) browsers.
		 */

		// Wait for the document to load before running our JS code
		document.addEventListener("DOMContentLoaded", () => {

			// Get the toggle button and the menu
			let toggle = document.getElementById("menu-toggle");
			let menu = document.getElementById("m-menubar");

			// Make sure menu and toggle button exist
			if (toggle && menu) {

				// Remove the "show" class from the menu (now that JS is functional)
				menu.classList.remove("show");

				// Add click event listener to toggle button
				toggle.addEventListener("click", (event) => {

					// Stop hyperlink navigation
					event.preventDefault();

					// Toggle (add/remove) CSS class on the menu
					menu.classList.toggle("show");

				});

			}

		});

	</script>

</body>
</html>