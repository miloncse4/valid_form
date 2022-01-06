<?php
    session_start();
    require"db.php";
    
    //print_r($_POST);
    $email    = $_POST['email'];
    $password = md5($_POST['password']);
    if($email==NULL || $password==NULL){
        $_SESSION['log_err'] = "All field must be first";
        header('location: login.php');
    }
    else{
        $cheking_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$email' AND password='$password'";
        $result_form = mysqli_query($db_conect,$cheking_query);
        $after_assoc = mysqli_fetch_assoc($result_form);
        if($after_assoc['total_user']==1){
            $_SESSION['email'] = $email;
            $_SESSION['user_status'] = "yes";
           header('location: admin/dashboard.php');
        }
        else{
            $_SESSION['log_err'] = "You Go Register..";
            header('location: login.php');
        }
    }
?>