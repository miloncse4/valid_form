<?php
    session_start();
    require_once'../db.php';

    $email = $_POST['email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if($new_pass == $confirm_pass){
        if($old_pass == $new_pass){
            $_SESSION['change_didnot'] = "old password can't be new password";
            header('location: password.php');
        }
        else{
            $enc_old_pass = md5($old_pass);
            $cheking_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$email' AND password = '$enc_old_pass'";
            $form_db = mysqli_query($db_conect,$cheking_query);
            $after_assoc = mysqli_fetch_assoc($form_db);

        if($after_assoc['total_user'] == 1){
            $enc_new_pass = md5($new_pass);
            $update_pass_quer = "UPDATE users SET password='$enc_new_pass' WHERE email ='$email'";
            mysqli_query($db_conect,$update_pass_quer);
            $_SESSION['change_done'] = "change Done";
            header('location: password.php');
        }
        else{
            echo"old pass did not match";
        }
        }
    }
    else{
        echo"change kora jaba na";
    }
?>