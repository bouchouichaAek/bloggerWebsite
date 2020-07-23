<?php 
session_start();
?>
<?php 
 include '/include/header.php';
 include '/include/DatabasesConnect/DBconection.php';
 
?>



    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
     
      <div class="col-4 pt-1">
        <a class="blog-header-logo text-dark" href="blogger.php"><img class="img-thumbnail center" src="image/5923b35e87485_thumb900.png" width="200px" height="200px"></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn-sm  btnSignup" href="#" onclick="document.getElementById('id02').style.display='block'">Create Account</a>
        <?php 
 if (isset($_SESSION["username"])){
    $Username = $_SESSION["username"];
  ?>
    <a class="btn-sm  btnSignup" href="acount.php"><?php echo htmlentities($Username) ?></a>

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
      <a class="btn-sm  btnSignup" href="acount.php"><?php echo htmlentities($row["username"]) ?></a>
 <?php 
 
 }}}
 
  ?>     
        <a class="btn btn-sm btn-outline-secondary with" href="#" onclick="document.getElementById('id01').style.display='block'">Sign up</a>
      </div>
    </div>
  </header>

  
  <div  id="id01" class="modal z_index_up">
  <form class="modal-content" method="Post" action="LoginIn.php">
  <div class="form-row ">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="Email">
    </div>
     <div class="form-group col-md-12">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="pwd">
    </div>
  </div>
    <div class="form-group" >
     <button  type="submit" onclick="document.getElementById('id01').style.display='none'" class="btn btn-primary button1 ">Cancel</button> 
      <span class="button">Forgot <a href="#" style='color: #000' >password?</a></span>
    </div>
   <div class="form-group">
  </div>
 <button class="btn btn-primary" name="Sign-in">Login in</button>
</form>
</div>

<div  id="id02" class="modal z_index_up">
  <form class="modal-content" action="add_new_acount.php"  method='post'>
  <div class="form-row ">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="Email">
    </div>
     <div class="form-group col-md-12">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="Pwd">
    </div>
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username" >
  </div>
 <div class="form-group" >
     <a  href="#" onclick="document.getElementById('id02').style.display='none'" class="btn btn-primary button1 ">Cancel</a> 
    </div>
    
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary" name="create_acount" >Sign in</button>
</form>
</div>

<div class="row mb-4 ">
<?php 
$user_image = "SELECT * FROM bloggs ORDER BY Bloger_id DESC LIMIT 1";
$result_user_image = mysqli_query($con, $user_image);
if($result_user_image){
  while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
    $date=date_create($row['bloge_date']);  
    $us_id = $row['user_id'] ;
        $user_name = "SELECT * FROM user WHERE user_id=$us_id ";
        $result_user = mysqli_query($con, $user_name);
        if($result_user){
            while($row1 = mysqli_fetch_array($result_user, MYSQLI_ASSOC)){
     
        
?>
    <div class="col-md-12 ">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static ">
          <h3 class="mb-0"><?php echo htmlentities($row['bloge_title']) ?></h3>
          <div class="mb-1 text-muted"><?php echo date_format($date,"M d"); ?>  by  <a ><?php echo htmlentities($row1['username']) ?></a></div>
          <p class="card-text mb-auto"><?php echo htmlentities(substr($row['bloge_content'],0,350));echo "..."; ?></p>
          <a href="bloggPost.php?id=<?php echo $row['Bloger_id']?>"  target="_blank" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <?php
         echo '<img src="data:images/jpg;base64,'.base64_encode($row['image_bloge']).'"  width="800" height="400" focusable="false">';
       ?>
       </div>
      </div>
    </div>
  </div>

<?php }}}}?>
  

  
  
<?php 

$user_image = "SELECT * FROM bloggs ORDER BY Bloger_id";
$result_user_image = mysqli_query($con, $user_image);
if($result_user_image){
  while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
    $date=date_create($row['bloge_date']); 
    $us_id = $row['user_id'] ;
    $user_name = "SELECT * FROM user WHERE user_id=$us_id ";
    $result_user = mysqli_query($con, $user_name);
    if($result_user){
        while($row1 = mysqli_fetch_array($result_user, MYSQLI_ASSOC)){
 
?>
<div class="row mb-3">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0"><?php echo htmlentities($row['bloge_title']) ?></h3>
          <div class="mb-1 text-muted"><?php echo date_format($date,"M d"); ?>  by  <a ><?php echo htmlentities($row1['username']) ?></a> </div>
          <p class="card-text mb-auto"><?php echo htmlentities(substr($row['bloge_content'],0,100));echo "..."; ?></p>
          <a href="bloggPost.php?id=<?php echo $row['Bloger_id']?>"  target="_blank" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <?php
         echo '<img src="data:images/jpg;base64,'.base64_encode($row['image_bloge']).'"  width="300" height="300" focusable="false">';
       ?>
       </div>
      </div>
    </div>




  </div>
  
<?php }}}}?>







<?php 
 include '/include/footer.php';
?>