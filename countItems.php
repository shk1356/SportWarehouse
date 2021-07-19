<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";

$title = "Shop";
$pageHeading = "Products";
//create a category object
$product = new Product();
$message = "";
//retrieve all products so they can be listed
$productRows = $product->getProducts();
//add item to shopping cart

//check product id and qty are not empty
if(!empty($_POST["productId"]) && !empty($_POST["qty"]))
{
$productId = $_POST["productId"];
$qty = $_POST["qty"];

//get the product details
$product->getProduct($productId);
//create a new cart item so it can be added to the shopping cart
$item = new CartItem($product->getProductName(), $qty, $product->getPrice(), $productId);
//check if shopping cart exists

//add item to shopping cart
$cart->addItem($item);
//save shopping cart back into session
$_SESSION["cart"] = $cart;
}


//remove item from shopping cart
if(isset($_POST["remove"]))
{
	//check product id was supplied and cart exists in session
if(!empty($_POST["productId"]) && isset($_SESSION["cart"]))
{
$productId = $_POST["productId"];
//create a new cart item so it can be removed from the shopping cart
//the only value that is important is the product Id
$item = new CartItem("", 0, 0, $productId);
//read shopping cart from session
$cart = $_SESSION["cart"];
//remove item from shopping cart
$cart->removeItem($item);
//save shopping cart back into session
$_SESSION["cart"] = $cart;
}
}
//start buffer
ob_start();
//display products
//include "templates/displayProducts.html.php";
//display shopping cart
include "templates/displayCountItems.html.php" ;
$output = ob_get_clean();
include "templates/layout.html.php";
?>