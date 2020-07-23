<?php 
session_start();
?>

<?php 
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';
$ID = $_SESSION['user_id'];
if (isset($_POST["add_a_post"])) {
    $Blogge_title =  mysqli_real_escape_string($con,$_POST["Blogge-title"]);
    $Blogge_content =  mysqli_real_escape_string($con,$_POST["Blogge-content"]);
    $Blogge_file = mysqli_real_escape_string($con,file_get_contents($_FILES["Blogge-picture"]["tmp_name"]));

    $query = "INSERT INTO `bloggs`(`bloge_title`, `bloge_content`, `image_bloge`, `user_id`) VALUES ('$Blogge_title','$Blogge_content','$Blogge_file','$ID')";
   
    if (mysqli_query($con, $query)&& mysqli_affected_rows($con)>0) {
        
        
        header("Location: blogger.php");
        
    } else {
        
        header("Location: acount.php");      
    }
}






?>