
<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
session_start();
$title = "Checkout";
$pageHeading = "Checkout";

//start buffer
ob_start();
//display checkout form
include "templates/checkoutForm.html.php";
include "templates/layout3.html.php";



?>
