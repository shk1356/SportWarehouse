<?php
require_once("classes/formValidation.php");
$title = "request form";
//create FormValidation object so that it can be used
$form = new formValidation();
//start buffer
ob_start();
//check if the submit button was clicked
if(isset($_POST["submitButton"]))
{
//validate name was supplied
$nameMessage = $form->checkEmpty("name");
//validate name is in the correct format
$nameMessage = $nameMessage . " " . $form->checkName("name");


//validate lastname was supplied
$lastnameMessage = $form->checkEmpty("lastname");
//validate name is in the correct format
$lastnameMessage = $lastnameMessage . " " . $form->checkLastName("lastname");



//validate contact number was supplied

$numberMessage = $form->checkEmpty("contactnumber");
//validate number is in the correct format
$numberMessage =$numberMessage . " " . $form->checkNumber("contactnumber");




//validate valid email address
$emailMessage = $form->checkEmail("email");
//validate address
// $addressMessage = $form->checkEmpty("address");
// //validate gender was selected
// $genderMessage = $form->checkEmpty("gender");
//if any checks did not pass valid will be set to false
//if all checks passed valid will be true
if($form->valid == true)
{
//redirect to the thanks page
header("Location:thanks.php");
}
else
{
//display form with errors listed
include "templates/requestForm.html.php";
}
}
else //submit button was not clicked the form is displayed for the first time
{
//display form without errors
$form->valid = true;
$nameMessage = "";
$lastnameMessage="";
$numberMessage="";
$emailMessage = "";

include "templates/requestForm.html.php";
}
$output = ob_get_clean();
include "templates/layout-contact.html.php";
?>