<?php 
session_start();
?>
<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';

$ID = $_SESSION['user_id'];

if(isset($_POST['edit-acount'])) {
   
    $uname =  mysqli_real_escape_string($con,$_POST["username"]);
    $pwd =  mysqli_real_escape_string($con,$_POST["Pwd"]);
    $email =  mysqli_real_escape_string($con,$_POST["Email"]);
    $Gender = mysqli_real_escape_string($con,$_POST["optionsRadios"]);
    $file = mysqli_real_escape_string($con,file_get_contents($_FILES["profile-picture"]["tmp_name"]));
    
    $pwd1 = password_hash($pwd ,PASSWORD_BCRYPT);
 
    $query = "UPDATE `user` SET  `username`='$uname',`password`='$pwd1',`Email`='$email',`Gender`='$Gender',`user_image`='$file'  WHERE `user_id`='$ID'";

    if (mysqli_query($con, $query)&& mysqli_affected_rows($con)>0) {
        
        header("Location: acount.php");
        
    } else {
        
        header("Location: acount.php");

        
    }

}





?>



