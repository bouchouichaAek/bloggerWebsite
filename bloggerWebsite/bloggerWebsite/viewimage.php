
<?php 
include '/include/DatabasesConnect/DBconection.php';
?>

<?php 
 $user_image = "SELECT user_image FROM user WHERE user_id=56";
 $result_user_image = mysqli_query($con, $user_image);
 if($result_user_image){
   while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
     echo "<img src='data:images/jpg;base64,".base64_encode($row['user_image'])."'>";
   }
 }


?>