<?php
include '/include/header.php';
include '/include/DatabasesConnect/DBconection.php';
include '/include/Function.php';



   
    

     $query = "UPDATE `user` SET username = 'dqicpojpjqci' WHERE user_id= 46";
    if (mysqli_query($con, $query)&& mysqli_affected_rows($con)>0) {
        
        echo 'sucssfuly';
        
    } else {
        
        echo 'faild'.Mysqli_error($con);

        
    }

