<?php 
session_start();
?>

<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';

if (!isset($_SESSION["username"]) and !isset($_SESSION["user_id"])) 
  header("Location:blogger.php"); 


?>




<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
     
      <div class="col-4 pt-1">
        <a class="blog-header-logo text-dark" href="blogger.php"><img class="img-thumbnail center" src="image/5923b35e87485_thumb900.png" width="200px" height="200px"></a>
      </div>
      
<ul class="nav ">
  <li class="nav-item">
    <a class="nav-link text-body btnSignup" href="SignOut.php">Sign Out</a>
  </li>
  <li class="nav-item ">
  <?php 
  if (isset($_SESSION["username"])){
    $Username = $_SESSION["username"];
  ?>
  <a class="nav-link text-body btnSignup" href="#" ><i class="fas fa-user"></i><?php echo htmlentities($Username) ?></a>
  <?php  
  }
  ?>
  <?php 
  if (isset($_SESSION["user_id"])) {
    $var = $_SESSION["user_id"];
   
    $sql = "SELECT * FROM `user` WHERE user_id= $var LIMIT 1";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  ?>
  </li><a class="nav-link text-body btnSignup" href="#" ><i class="fas fa-user"></i><?php echo htmlentities($row["username"]) ?></a>
</ul>
<?php  
  }}}
  ?>
    </div>
  </header>
  
  



  <p>
  <a class="btn float-right  bg-light text-dark mr-2 cursor" onclick= "document.getElementById('Profile').style.display='block',document.getElementById('Addapost').style.display='none',document.getElementById('MyPost').style.display='none' ">
    Profile
  </a>
  <a class="btn float-right  bg-light text-dark mr-2 cursor" onclick= "document.getElementById('Profile').style.display='none',document.getElementById('Addapost').style.display='none' ,document.getElementById('MyPost').style.display='block' ">
    My posts
  </a>
  <a class="btn float-right  bg-light text-dark mr-2 cursor" onclick= "document.getElementById('Profile').style.display='none',document.getElementById('Addapost').style.display='block' ,document.getElementById('MyPost').style.display='none' ">
    Add a post
  </a>
</p>


<!--unknown-profile-1.jpg-->
<div id="Profile">
<div class="jumbotron bg-light" >
  <div class="container" >
    <div class="panel panel-default">
  <div class="panel-heading" >
  <?php 
 if (isset($_SESSION["username"])){
    $Username = $_SESSION["username"];
  ?>
    <h2 class="panel-title"><?php echo htmlentities($Username) ?></h2>
    <?php 
 }
  ?>

    <?php 
  if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
   
    $sql = "SELECT * FROM `user` WHERE user_id = $id Limit 1 ";
$result = mysqli_query($con, $sql);
if ($result){
    while($row = mysqli_fetch_assoc($result)) {
  ?>
    <h2 class="panel-title"><?php echo htmlentities($row["username"]) ?></h2>

 <?php 
 
 }}}
  ?>

 

 <form role="form" action="Edit_Acount.php" method="post" enctype="multipart/form-data" class="md-form float-right with-form ">
 <div class="file-field">
   <div class= "mb-4">
   <?php 
 if (isset($_SESSION["username"])){
    $Username = $_SESSION["username"];
    $user_image = "SELECT user_image FROM user WHERE username=$Username";
    $result_user_image = mysqli_query($con, $user_image);
    if($result_user_image){
      while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
     if ($row["user_image"]==null) {
     
     echo '<img src="image/unknown-profile-1.jpg" class="with-img but image-media" 
      class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">';
     
     }else {
       //<img src='data:images/jpg;base64,".base64_encode($row['user_image'])."' width=250px>
      
       echo "<img src='data:images/jpg;base64,".base64_encode($row['user_image'])."' class='with-img but image-media' 
       class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'>";
      
     }}}
    }
    ?>
    <?php
    if (isset($_SESSION['user_id'])){
      $id = $_SESSION['user_id'];
      $user_image = "SELECT user_image FROM user WHERE user_id=$id LIMIT 1";
      $result_user_image = mysqli_query($con, $user_image);
      if($result_user_image){
        while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
       if ($row["user_image"]==null) {
       
       echo '<img src="image/unknown-profile-1.jpg" class="with-img but image-media" 
        class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">';
  
       }else {
         //<img src='data:images/jpg;base64,".base64_encode($row['user_image'])."' width=250px>
        
         echo "<img src='data:images/jpg;base64,".base64_encode($row["user_image"])."' class='with-img but image-media' 
         class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar'>";
        
       }}}
      }
      ?>
  </div>
   <div class="d-flex justify-content-center but">
  <div class="btn btn-mdb-color btn-rounded float-left">
     <h4 class="p-3 mb-2 bgj-primary text-white rounded" >Add photo</h4>
     <input type="file" name = "profile-picture" value="file" class="bg-white text-primary" >
   </div>
  </div>
 </div>
  </div>

  <div class="panel-body">
  <?php
  if (isset($_SESSION["username"])){
    $Username = $_SESSION["username"];
    $user_image = "SELECT * FROM user WHERE username=$Username";
      $result_user_image = mysqli_query($con, $user_image);
      if($result_user_image){
        while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
          ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" name ="username" class="form-control with-form" id="exampleInputEmail1" placeholder="Username" value="<?php echo htmlentities($row["username"]) ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">New Password</label>
      <input type="password" name ="Pwd" class="form-control with-form" id="exampleInputPassword1" placeholder="New Password">
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name ="Email" class="form-control with-form" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($row["Email"]) ?>">
    </div>
  
         <div class="radio">
         <label><input type="radio" name="optionsRadios" id="optionsRadios1" value="Male" checked>  Male</label>
         </div>

         <div class="radio">
         <label><input type="radio" name="optionsRadios" id="optionsRadios2" value="Female"> Female</label>
         </div>
         </div>
        <?php }}}
     
        if (isset($_SESSION['user_id'])){
      $id = $_SESSION['user_id'];
      $user_image = "SELECT * FROM user WHERE user_id=$id LIMIT 1";
      $result_user_image = mysqli_query($con, $user_image);
      if($result_user_image){
        while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
          ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" name ="username" class="form-control with-form" id="exampleInputEmail1" placeholder="Username" value="<?php echo htmlentities($row["username"]) ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">New Password</label>
      <input type="password" name ="Pwd" class="form-control with-form" id="exampleInputPassword1" placeholder="New Password">
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name ="Email" class="form-control with-form" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($row["Email"]) ?>">
    </div>
  
         <?php 
         if ($row["Gender"]=="Male") {
          
         echo '<div class="radio">';
         echo '<label><input type="radio" name="optionsRadios" id="optionsRadios1" value="Male" checked>  Male</label>';
         echo '</div>';

         echo '<div class="radio">';
         echo '<label><input type="radio" name="optionsRadios" id="optionsRadios2" value="Female"> Female</label>';
         echo '</div>';
         echo '</div>';
         }else{
          echo '<div class="radio">';
          echo '<label><input type="radio" name="optionsRadios" id="optionsRadios1" value="Male" >  Male</label>';
          echo '</div>';
 
          echo '<div class="radio">';
          echo '<label><input type="radio" name="optionsRadios" id="optionsRadios2" value="Female" checked> Female</label>';
          echo '</div>';
          echo '</div>';
         }
         ?>
        
    
    
<?php 
}}}
?>
</div>
<button type="submit" class="btn btn-primary" name="edit-acount">Submit</button>
</form>
  </div>
</div>
  </div>








<!--------------------------------------------------------------------------------->

<div id="Addapost" class="display-none"  >
<form class="md-form" role="form" action="add_a_post.php" method="post" enctype="multipart/form-data">
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="form-group">
     <label class="">Blogge image</label><br>
     <input type="file" name = "Blogge-picture" value="file" class="bg-white text-primary" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Blogge title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Blogge title" name="Blogge-title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Blogge content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Blogge content" rows="9" name="Blogge-content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="add_a_post">Add a post</button>
</form>

</div>



<!--------------------------------------------------------------------------------->

<div id="MyPost" class="display-none">
  <br>
  <br>
  <br>
  <br>
  <br>

  
  <div class="row mb-3">
<?php 
$id = $_SESSION['user_id'];
$user_image = "SELECT * FROM bloggs WHERE user_id=$id";
$result_user_image = mysqli_query($con, $user_image);
if($result_user_image){
  while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
?>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0"><?php echo htmlentities($row['bloge_title']) ?></h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto"><?php echo htmlentities(substr($row['bloge_content'],0,100));echo "..."; ?></p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <?php
         echo '<img src="data:images/jpg;base64,'.base64_encode($row['image_bloge']).'"  width="300" height="300" focusable="false">';
       ?>
       </div>
      </div>
    </div>
  </div>

<?php }}?>



</div>

</div>





</div>
<?php
  $_SESSION["id"] = $row['user_id'];
?>


<?php 
 include '/include/footer.php';
?>

