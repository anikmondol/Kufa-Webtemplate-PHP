<?php

session_start();

require "../config/database.php";


if (isset($_REQUEST['submit'])) {

    $flag = false;


    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);
  



    // email regex 
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!$email) {
        $_SESSION["email_error"] = "Email Field is Required!!!";
        $flag = true;
        header("location: login.php");
    } elseif (!preg_match($email_regex, $email)) {
        $_SESSION["email_error"] = "Invalid email provide!!!";
        $flag = true;
        header("location: login.php");
    } 


    if (!$password) {
        $_SESSION["password_error"] = "Password Field is Required!!!";
        $flag = true;
        header("location: login.php");
    }


   

  

    if ($flag) {
       echo "error";
    } else {


        $encrypt = sha1($password);
        $count_query = "SELECT COUNT(*) AS 'count_result' FROM `users` WHERE email='$email' AND password='$encrypt' and id = 1";
        $connect = mysqli_query($conn, $count_query);

       

        if (mysqli_fetch_assoc($connect)['count_result'] == 1) {
           
            $get_data_query = "SELECT * FROM `users` WHERE email = '$email'";
            $connect = mysqli_query($conn, $get_data_query);
            $user = mysqli_fetch_assoc($connect);


            $_SESSION['auth_id'] = $user['id'];
            $_SESSION['auth_name'] = $user['name'];
            $_SESSION['temp_name'] = $user['name'];
            $_SESSION['auth_email'] = $user['email'];


            header("location: ../dashboard/home/home.php");

        }else{
            $_SESSION['login_failed'] = "credential  does't  match";
            header("location: login.php");
        }
      
    }
}
