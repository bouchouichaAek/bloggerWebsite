<?php 
session_start();
?>

<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

?>


<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
     
      <div class="col-4 pt-1">
        <a class="blog-header-logo text-dark" href="#"><img class="img-thumbnail center" src="image/5923b35e87485_thumb900.png" width="200px" height="200px"></a>
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
    $user_id = $_SESSION["user_id"];
   
    $sql = "SELECT * FROM `user` WHERE user_id = $user_id Limit 1 ";
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
  <br>
  <br>
   <?php 
     $user_image = "SELECT * FROM bloggs WHERE Bloger_id=$id ";
    // $user = "SELECT * FROM user WHERE user_id=$id ";

     $result_user_image = mysqli_query($con, $user_image);
     if($result_user_image){
       while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
        $date=date_create($row['bloge_date']);  
   
   ?>
  <main role="main" class="container">
      <?php 
  echo '<img src="data:images/jpg;base64,'.base64_encode($row['image_bloge']).'" class="image-media-respocive"  width="1095" height="350px"   >';
  ?>
  <br>
<br>
  <div class="row">
    <div class="col-md-8 blog-main">
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo htmlentities($row['bloge_title']) ?></h2>
        <?php
        $us_id = $row['user_id'] ;
        $user_name = "SELECT * FROM user WHERE user_id=$us_id ";
        $result_user = mysqli_query($con, $user_name);
        if($result_user){
            while($row1 = mysqli_fetch_array($result_user, MYSQLI_ASSOC)){
     
        ?>
        <p class="blog-post-meta"><?php echo date_format($date,"M d Y"); ?>  by  <a ><?php echo htmlentities($row1['username']) ?></a></p>

        <p  class="lead"><?php echo htmlentities($row['bloge_content']) ?></p>
     
        <?php
            }}
        ?>
    </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->


 
  
    <aside class="col-md-4 blog-sidebar">
   <?php 

$user_image = "SELECT * FROM bloggs ORDER BY Bloger_id";
$result_user_image = mysqli_query($con, $user_image);
if($result_user_image){
  while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
?>
<div class="row mb-10">
    <div class="col-md-13">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0"><?php echo htmlentities($row['bloge_title']) ?></h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto"><?php echo htmlentities(substr($row['bloge_content'],0,50));echo "..."; ?></p>
          <a href="bloggPost.php?id=<?php echo $row['Bloger_id']?>"  target="_blank" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <?php
         echo '<img src="data:images/jpg;base64,'.base64_encode($row['image_bloge']).'"  width="200" height="260"focusable="false">';
       ?>
       </div>
      </div>
    </div>




  </div>
  
<?php }}?>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->
</div>
<?php 
 }}}
?>
      <?php 
 include '/include/footer.php';
?>

