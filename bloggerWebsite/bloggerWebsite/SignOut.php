<?php 
session_start();
?>
<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';
if (!isset($_SESSION["username"]) and !isset($_SESSION["user_id"])) 
  header("Location:blogger.php"); 

$_SESSION['user_id'] = null;
$_SESSION['Email'] = null;
$_SESSION["username"]= null;
session_unset(); 
header("Location: blogger.php");


?>