<?php
include('./config/db.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$flag = false;

// validation check

if($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
    }else{
        $_SESSION['email error'] = 'Enter a valid email addres';
        header('location: ./login.php');
    }
}else{
    $_SESSION['email error'] = 'please fill up email filled';
    header('location: ./login.php');
}

if($password){
    $flag = true;
}else{
    $_SESSION['password error'] = 'please fill up password filled';
    header('location: ./login.php');
}

// database connect

if($flag == true){
    if($email && $password){

        $encript = sha1($password);

        $select_query = "SELECT COUNT(*) as result FROM users WHERE email='$email' AND password='$encript'";
        $connect = mysqli_query($db_connect,$select_query);
        if(mysqli_fetch_assoc($connect)['result'] == 1){
            header('location: ./home.php');
        }else{
            $_SESSION['db_connect error'] = "Emaild and Password did't match";
            header('location: ./login.php');
        }

    }else{
        $_SESSION['db_connect error'] = 'Filed cant be empty';
        header('location: ./login.php');
    }
}else{
    $_SESSION['db_connect error'] = 'something wroang';
    header('location: ./login.php');
}

?>