<?php	


	//read theme from session
	if(isset($_SESSION["theme"]))
	{
		$theme = $_SESSION["theme"] . ".css";
	}
	//read theme from cookie 
	elseif(isset($_COOKIE["theme"]))
	{
		$theme = $_COOKIE["theme"] . ".css";
	}
	else
	{
		$theme = "css/plain.css";
	}

	$title = "Theme";
	$pageHeading = "Style Page";

	$message = "";

	if(isset($_POST["submit"]))
	{
		//get the selected colour theme
		$_SESSION["theme"] = $_POST["theme"];
		$theme = $_SESSION["theme"] . ".css";

		//set the theme cookie
		//setcookie("theme", $_POST["theme"], time()+ 60 * 60 * 24 * 365);
	}

	//start buffer
	ob_start();
			
	//display page content
	include "templates/themeForm.html.php";

	$output = ob_get_clean();

	include "templates/layout2.html.php";

?>