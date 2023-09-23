<?php
session_start();
include('../config/db.php');

if(isset($_POST['insert_btn'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    if($title && $description && $icon){
        $insert_query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($db_connect,$insert_query);
        header('location: ./services_list.php');
    }else{
        $_SESSION['insert_service error'] = "filed is empty";
        header('location: ./services_insert.php');
    }
}

// service delete start
if(isset($_GET['delete_id'])){
    $user_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM services WHERE id='$user_id'";
    mysqli_query($db_connect,$delete_query);
    header('location: services_list.php');
}

//
// edit start

if(isset($_POST['update_btn'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    if($title && $description && $icon){
        $update_query = "UPDATE services SET title='$title', description='$description', icon='$icon'";
        mysqli_query($db_connect,$update_query);
        header('location: ./services_list.php');
    }else{
        $_SESSION['insert_service error'] = "filed is empty";
        header('location: ./services_insert.php');
    }
}

// status toggle start

if(isset($_GET['status_change'])){
    $service_id = $_GET['status_change'];
    $delete_query = "SELECT * FROM services WHERE id='$service_id'";
    $connect = mysqli_query($db_connect,$delete_query);
    $status = mysqli_fetch_assoc($connect);
    if($status['status'] == 'active'){
        $update_status = "UPDATE services SET status='deactive' WHERE id='$service_id'";
        mysqli_query($db_connect,$update_status);
        header('location: services_list.php');
    }else{
        $update_status = "UPDATE services SET status='active' WHERE id='$service_id'";
        mysqli_query($db_connect,$update_status);
        header('location: services_list.php');
    }
}

?>