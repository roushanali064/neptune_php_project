<?php
include('../config/db.php');
session_start();



if(isset($_POST['name_update'])){
    $name = $_POST['name'];
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
}

// password update

if(isset($_POST['password_update'])){
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confiram_password = $_POST['confiram_password'];
    $user_id = $_SESSION['user_id'];
    if($current_password && $new_password && $confiram_password){
        $encript_password = sha1($current_password);
        $password_match_query = "SELECT COUNT(*) AS password_match FROM users WHERE password='$encript_password' AND id='$user_id'";
        $password_match_connect = mysqli_query($db_connect,$password_match_query);
        if(mysqli_fetch_assoc($password_match_connect)['password_match'] == 1){
            if($current_password != $new_password && $current_password != $confiram_password){
                if($new_password == $confiram_password){
                    $encript_update_password = sha1($new_password);
                    $password_update_query = "UPDATE users SET password='$encript_update_password' WHERE id='$user_id'";
                    mysqli_query($db_connect,$password_update_query);
                    $_SESSION['password succes'] = 'password upate success fully';
                    header('location: ./profile.php');
                }else{
                    $_SESSION['password_update error'] = 'new password and confiram password not match';
                    header('location: ./profile.php');
                }
            }else{
                $_SESSION['password_update error'] = 'current password and new password is same';
                header('location: ./profile.php');
            }
        }else{
            $_SESSION['password_update error'] = 'current password did not match';
            header('location: ./profile.php');
        }
    }else{
        $_SESSION['password_update error'] = 'filed is empaty';
        header('location: ./profile.php');
    }
}

?>