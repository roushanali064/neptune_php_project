<?php
include('../config/db.php');
session_start();

$name = $_POST['name'];
$name_update = $_POST['name_update'];

if(isset($name_update)){
    if($name){
        $user_id = $_SESSION['user_id'];
        $name_update_query = "UPDATE users SET name='$name' WHERE id='$user_id'";
        mysqli_query($db_connect,$name_update_query);
        $_SESSION['user_name'] = $name;
        header('location: ./profile.php');

    }else{
        $_SESSION['name_update error'] = 'name filed is requried';
        header('location: ./profile.php');
    }
}else{
    $_SESSION['name_update error'] = 'something went wroang';
    header('location: ./profile.php');
}

?>