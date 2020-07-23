<?php 
$conn = mysqli_connect("localhost", "root", "123456", "imagetest");
if($conn) {
//if connection has been established display connected.
echo "connected";
}
//if button with the name uploadfilesub has been clicked
if(isset($_POST["Uploadfile"])) {
  $files=$_FILES["picture"]["tmp_name"];
  echo $files;
  $file = mysqli_real_escape_string($conn,file_get_contents($_FILES["picture"]["tmp_name"]));

  $query =  "INSERT INTO ` images` (`Image`)  VALUES ($file)";

    if (mysqli_query($conn, $query)&& mysqli_affected_rows($conn)>0) {   
      echo "image uploaded";

    } else { 
      echo "image not uploaded";

    }
  }
?>
<!DOCTYPE html>
<html>
<body>
<form action="test.php" method="Post" > 
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" name = "picture" value="file">
    <input type="submit" name="Uploadfile" value="Upload">
  </div>
</form>
</body>
</html>