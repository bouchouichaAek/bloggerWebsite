<?php 
session_start();
?>
<?php 
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';

if (isset($_POST['create_acount'])) {
    
    
    $uname =  mysqli_real_escape_string($con,($_POST["username"]));
    $pwd =  mysqli_real_escape_string($con,$_POST["Pwd"]);
    $email =  mysqli_real_escape_string($con,$_POST["Email"]);
    
    $pwd1 = password_hash($pwd ,PASSWORD_BCRYPT);
    
   
    
   

    $query = "INSERT INTO `user`(`username`, `password`, `Email`) VALUES ('$uname','$pwd1','$email')";
    
    if (mysqli_query($con, $query)&& mysqli_affected_rows($con)>0) {
        
        header("Location: acount.php");
        $_SESSION["username"] = $uname;
    } else {
        
        header("Location: blogger.php");
        
    }
  
    
}else{
	header("Location: blogger.php");
}



?>

