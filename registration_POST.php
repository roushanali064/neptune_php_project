<?php
include('./config/db.php');
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confiram_password = $_POST['confiram_password'];
$flag = false;

if ($name) {
    if (!preg_match("/^[a-zA-Z-' .]*$/", $name)) {
        $_SESSION['name error'] = 'Only letters and white space allowed';
        header('location: ./registration.php');
        $flag = false;
    } else {
        $flag = true;
    }
} else {
    $_SESSION['name error'] = 'please fill up name filled';
    header('location: ./registration.php');
}

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
    } else {
        $flag = false;
        $_SESSION['email error'] = 'provide valid email address';
        header('location: ./registration.php');
    }
} else {
    $_SESSION['email error'] = 'please fill up email filled';
    header('location: ./registration.php');
}

// password preg_match

if ($password) {
    if (preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
        $flag = true;
    } else {
        $_SESSION['password error'] = 'Password must contain at least one letter, one digit, and be 8-12 characters long.';
        $flag = false;
        header('location: ./registration.php');
    }
} else {
    $_SESSION['password error'] = 'please provide your password';
    header('location: ./registration.php');
}

if ($confiram_password) {
    if ($password == $confiram_password) {
        $flag = true;
    } else {
        $_SESSION['confiram_password error'] = 'confiram_password and password did not match';
        $flag = false;
        header('location: ./registration.php');
    }
} else {
    $_SESSION['confiram_password error'] = 'please provide your confiram_password';
    header('location: ./registration.php');
}

// dbms code start

if ($flag == true) {
    if ($name && $email && $password) {

        $select_query = "SELECT COUNT(*) AS email_check FROM users WHERE email='$email'";
        $connect = mysqli_query($db_connect,$select_query);
        
        if(mysqli_fetch_assoc($connect)['email_check'] < 1){
            
            $encript = sha1($password);
    
            $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encript')";
            mysqli_query($db_connect,$insert_query);
    
            $_SESSION['db_user_name'] = $name;
            $_SESSION['db_user_email'] = $email;
            $_SESSION['db_user_password'] = $password;
    
            $_SESSION['db_succes'] = 'registration succesfuly';
            header('location: ./login.php');
        }else{
            $_SESSION['db_connect error'] = 'User alredy exits';
            header('location: ./registration.php');
        }
    } else {
        $_SESSION['db_connect error'] = 'filed Cant be empty';
        header('location: ./registration.php');
    }
} else {
    $_SESSION['db_connect error'] = 'something wrong';
    header('location: ./registration.php');
}
?>