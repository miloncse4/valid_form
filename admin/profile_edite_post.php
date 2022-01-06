<?php
    session_start();
    require'../db.php';

    $name = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];   
    
    if($_POST["name"] == NULL || $_POST['mobile'] == NULL){
        $_SESSION['profile_err'] = "All field fillup";
           header('location: ../admin/profile_edit.php');
    }
    else{
        if(strlen($mobile)==11){
            $update_qupery = "UPDATE users SET name='$name', mobile='$mobile' WHERE email='$email'";
            mysqli_query($db_conect,$update_qupery);
            $_SESSION['profile_success'] = "Conguratulation Profile edit Successfully..!";
            header('location: profile.php');
        }
        else{
            $_SESSION['profile_err'] = "invalid number";
            header('location: ../admin/profile_edit.php');
        }
    }
?>