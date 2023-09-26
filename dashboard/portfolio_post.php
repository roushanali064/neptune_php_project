<?php
session_start();
include('../config/db.php');

if(isset($_POST['insert_portfolio'])){
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];
    // image related code
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = "portfolio".rand(1111,9999).date('d-m-Y').'.'.$extension;

    if($title && $sub_title && $description && $image){

        if(move_uploaded_file($tmp_name, '../images/portfolio/'.$new_name)){
            $insert_query = "INSERT INTO portfolio (title,sub_title,description,image) VALUES ('$title','$sub_title','$description','$new_name')";
            mysqli_query($db_connect,$insert_query);
            $_SESSION['insert_portfolio success'] = 'Data Insert Success Fully';
            header('location: ./portfolio_list.php');
        }else{
        $_SESSION['insert_portfolio error'] = 'something went wrong';
        header('location: ./portfolio_insert.php');
        }
        
    }
    else{
        $_SESSION['insert_portfolio error'] = 'filed is empty';
        header('location: ./portfolio_insert.php');
    }
}
// status toggle start
if(isset($_GET['status_change'])){
    $portfolio_id = $_GET['status_change'];
    $select_query = "SELECT status FROM portfolio WHERE id='$portfolio_id'";
    $connect = mysqli_query($db_connect,$select_query);
    $status = mysqli_fetch_assoc($connect)['status'];
    if($status == 'deactive'){
        $update_query = "UPDATE portfolio SET status='active' WHERE id='$portfolio_id'";
        $connect = mysqli_query($db_connect,$update_query);
        header('location: ./portfolio_list.php');
    }else{
        $update_query = "UPDATE portfolio SET status='deactive' WHERE id='$portfolio_id'";
        $connect = mysqli_query($db_connect,$update_query);
        header('location: ./portfolio_list.php');
    }
}

// update section

if(isset($_POST['update_portfolio'])){
    $portfolio_id = $_POST['portfolio_id'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];
    
    
    if($title && $sub_title && $description){
        $update_query = "UPDATE portfolio SET title='$title', sub_title='$sub_title', description='$description' WHERE id='$portfolio_id'";
        mysqli_query($db_connect,$update_query);
        header('location: ./portfolio_list.php');
    }
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = "portfolio".rand(1111,9999).date('d-m-Y').'.'.$extension;
    if($image && move_uploaded_file($tmp_name, '../images/portfolio/'.$new_name)){
        $select_query = "SELECT image FROM portfolio WHERE id='$portfolio_id'";
        $connect = mysqli_query($db_connect,$select_query);
        $existing_image = mysqli_fetch_assoc($connect)['image']; 

        $update_query = "UPDATE portfolio SET image='$new_name' WHERE id='$portfolio_id'";
        mysqli_query($db_connect,$update_query);

        unlink('../images/portfolio/'.$existing_image);

        header('location: ./portfolio_list.php');

    }
}

// delete code 
if(isset($_GET['delete_id'])){
    $portfolio_id = $_GET['delete_id'];
    $select_query = "SELECT image FROM portfolio WHERE id='$portfolio_id'";
    $connect = mysqli_query($db_connect,$select_query);
    $existing_image = mysqli_fetch_assoc($connect)['image']; 

    $delete_query = "DELETE FROM portfolio WHERE id='$portfolio_id'";
    mysqli_query($db_connect,$delete_query);
    unlink('../images/portfolio/'.$existing_image);
    header('location: ./portfolio_list.php');
}
?>