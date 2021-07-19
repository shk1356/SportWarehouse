<?php	
session_start();

	//read stylesheet theme from session
	if(isset($_SESSION["theme"]))
	{
		$theme = $_SESSION["theme"] . ".css";
	}
	else
	{
		$theme = "plain.css";
	}

	
	//$title = "Theme";
	//$pageHeading = "Style Page 2";

	$message = "";

	if(isset($_POST["submit"]))
	{
		//get the selected colour theme
		$_SESSION["theme"] = $_POST["theme"];
		$theme = $_SESSION["theme"] . ".css";
	}

	//start buffer
	ob_start();
			
	//display page content
	include "templates/displayContent.html.php";

	$output = ob_get_clean();

	include "templates/layout2.html.php";

?>