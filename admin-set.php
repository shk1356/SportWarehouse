<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	
	<?php $title = "SPORT WAREHOUSE"; ?>
	<link rel="stylesheet" type="text/css" href="css/style-display.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		
</head>
<body >	

<?php include "header.php" ; ?>
	


<div id="logo">
	<img src="images/sports-warehouse-logo.png" id="logo-responsive" width="600" height="82" alt="sports-warehouse-logo"></div>
<div id="admin-set">
<ul>
	<li class="admin-set-a"><a href="categoryManage.php" >category manage</a></li>
	<li class="admin-set-a"><a href="productManage.php"  >product manage</a></li>
	<li id=stylePage1><?php include "stylePage1.php"; ?></li>

</div>
</body>
</html>
<?php include "templates/layout.html.php"; ?>
<?php include "templates/layout2.html.php"; ?>