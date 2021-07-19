<?php
 session_start();
require_once "classes/DBAccess.php";
$title = "Admin set";
$pageHeading = "Changing password";
include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);
//connect to database
$pdo = $db->connect();
$message = "";

$loginName  =$_SESSION ["username"] ;


if (isset ($_POST["submit"]))
{
    if(!empty($_POST["oldpw"]) && !empty($_POST["newpw1"]) && 
            !empty($_POST["newpw2"]) && ($_POST["newpw1"] == $_POST["newpw2"] ))
    {
        $newPassword = password_hash($_POST["newpw1"], PASSWORD_DEFAULT);
        //$newpass1 = password_hash($_POST['newpw1'], PASSWORD_DEFAULT);
        $oldpassword = $_POST['oldpw'];

        $sql = "select password from user where username=:username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $loginName, PDO::PARAM_STR);
        $oldpassworddb = $db->executeSQLReturnOneValue($stmt);

        if (password_verify($oldpassword,$oldpassworddb))
        {    
            $sql =  "update user set Password=:newPassword  where username='$loginName'";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":newPassword" , $newPassword , PDO::PARAM_STR);
            //execute SQL query        
            $db->executeNonQuery($stmt, false);
            $message = "The password was updated";
            echo "Password updated";
        }
        else {
            echo "The password did not update";
        }
    }
}

//start buffer
ob_start();
//display categories
include "header.php";
include "templates/passForm.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
$pdo = null; 
?>
