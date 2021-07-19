<?php
require_once "classes/authentication.php";
session_start();
authentication::logout();
?>