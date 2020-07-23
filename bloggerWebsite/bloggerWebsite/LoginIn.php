<?php 
session_start();
?>
<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';

if (!isset($_SESSION["username"]) and !isset($_SESSION["user_id"])) 
  header("Location:blogger.php"); 


if (isset($_POST["Sign-in"])) {
    
    $Email =  $_POST["Email"] ;
	$pass =   $_POST["pwd"]  ;
 
	$Email1 =  mysqli_real_escape_string($con , $Email) ;
	$pass1 =  mysqli_real_escape_string($con , $pass) ;
    
    $sql = "SELECT  user_id, username,password,Email FROM `user` WHERE Email= '$Email'  LIMIT 1";
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

    if ($result && mysqli_affected_rows($con)>0) {
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['Email'] = $row['Email'];
	
	if (password_verify($pass1, $row['password'])) {
			

		header("Location: acount.php");
	}else {
       header("Location:blogger.php"); 
     } 
     
}
}
//$2y$10$oCs5FrISRBTmcWFwFOwtSu3.oP43j6aOC6eHuJt8Miu.wT4YjV1p6
?>