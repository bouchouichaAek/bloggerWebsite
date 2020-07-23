<?php 

$errors = array(); 

function login_check() {
	if (!isset($_SESSION['user_id'])) {
		header("Location: blogger.php");
	}}


function check_input($data)
{
    $data = str_replace("_"," ",$data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = ucfirst($data);
    return $data;
}
function check_input_admin($data)
{
    $data = str_replace("_"," ",$data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
function check_content($data)
{
    
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

function checkEmpty($data) {
    global $errors;
    
    $data = trim($data);
    
    if(isset($data) === true && $data === '') {
        
        $errors['empty'] ="empty field ! .";
        
    }
    
}

function checkEmptyPage($data) {
    global $errors;
    
    //	$data = trim($data);
    
    if(isset($data) === true && $data === '') {
        
        $errors['empty'] ="empty field ! .";
        
        
    }
    return $data;
}

function success_created_acount() {
    // echo "New record created successfully";
    
    $smsg= "	<div class='alert alert-success alert-dismissible'>      " ;
    $smsg .=   "		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>   " ;
    $smsg .=   "		<strong>Success!</strong> created acount successfully.  " ;
    $smsg .=   "		</div>    " ;
    
    return $smsg;
    
    
}

function check_length($data,$max,$min){
    global $errors;
    if (strlen($data) < $min)
    {
        
        $errors['too short'] ="Input is too short, minimum is 4 characters (12 max).";
    }
    elseif(strlen($data) > $max)
    {
        $errors['too long'] ="Input is too long, maximum is 12 characters.";
    }else {
        return $data;
    }
}


?>