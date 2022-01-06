<?php
   session_start();
	require"db.php";

       $name     = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
       $email    = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
       $mobile   = $_POST["mobile"];
       $password = $_POST["password"];
       $after_email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
   

       $all_caps = preg_match('@[A-Z]@', $password);
       $all_small = preg_match('@[a-z]@', $password);
       $all_number = preg_match('@[0-9]@', $password);
       $pattern='/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
       $all_char=preg_match($pattern, $password);
     

       if($_POST["name"] ==NULL || $_POST["email"]==NULL || $_POST["mobile"]==NULL || $_POST["password"]==NULL){
       	   $_SESSION['reg_err'] = "All field fillup";
           header('location: fontint.php');
       }
       else{
            if(strlen($mobile)==11){
                $checking_puery = "SELECT COUNT(*) AS total_user FROM users WHERE email='$email'";
                $result_form = mysqli_query($db_conect,$checking_puery);
                $after_assoc = mysqli_fetch_assoc($result_form);
                
                if($after_assoc['total_user'] == 0){

                    if ($after_email) {
                        if (strlen($password)>=6 && $all_caps==1 && $all_small==1 && $all_number==1 && $all_char==1) {
                            $encrypt_pass = md5($password);
                            $insert_query = "INSERT INTO users(name,email,mobile,password) VALUES ('$name','$email','$mobile','$encrypt_pass')";  
                            mysqli_query($db_conect,$insert_query);
                            $_SESSION['reg_success'] = "Conguratulation ! Register Successfully..!";
                           header('location: fontint.php');   
                          }
                          else{
                            $_SESSION['reg_err'] = "field must be 6char 1cap 1small 1special";
                            header('location: fontint.php'); 
                          }
                      }
                      else{
                        $_SESSION['reg_err'] = "invalid email proived";
                        header('location: fontint.php'); 
                      }
                }
                else{
                    $_SESSION['reg_err'] = "Already Register";
                    header('location: fontint.php');                       
                }
            }
            else{
                $_SESSION['reg_err'] = "invalid number";
                header('location: fontint.php'); 
            }
           }
       
    
        
?>