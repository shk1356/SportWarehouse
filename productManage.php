
<?php 


	//read stylesheet theme from session
	if(isset($_SESSION["theme"]))
	{
		$theme = $_SESSION["theme"] . ".css";
	}
	else
	{
		$theme = "plain.css";
	}

	
	$title = "Theme";
	$pageHeading = "Style Page products";

	$message = "";

	
	//start buffer
	ob_start();
	include "header.php" ;

	//display page content
	include "templates/displayContent.html.php";
	include "templates/displayContent-p.html.php";

	$output = ob_get_clean();

	include "templates/layout.html.php";
	
?>
</body>
</html>