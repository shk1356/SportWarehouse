<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart</title>
</head>
<body>
<pre>
<?php
//testing cart item class
require_once "classes/CartItem.php";
$item1 = new CartItem("item1", 2, 2.50, 1);
$item2 = new CartItem("item2", 1, 3.50, 2);
$item3 = new CartItem("item3", 3, 6.50, 4);
echo "<p>". $item1->getQuantity() . "</p>";
//$item1->setQuantity(-3); //will generate an error
$item1->setQuantity(10); //will not generate an error
echo "<p>". $item1->getQuantity() . "</p>";
echo "<p>". $item3->getPrice() . "</p>";
echo "<p>". $item3->getItemId() . "</p>";
echo "<p>". $item3->getItemName() . "</p>";
//end of cart item test

//test shopping cart
require_once("classes/ShoppingCart.php");
$cart = new ShoppingCart();
$cart->addItem($item1);
$cart->addItem($item1);
$cart->addItem($item2);
$cart->addItem($item3);
$cart->addItem($item3);
$cart->displayArray();
echo "<p>remove</p>";
$cart->removeItem($item3);
$cart->displayArray();
echo "<p>Total</p>";
echo $cart->calculateTotal();
$cart->saveCart("1", "2", "3", "4", "5", "6", "7", "8", "9");
?>
</pre>
</body>
</html>
?>






