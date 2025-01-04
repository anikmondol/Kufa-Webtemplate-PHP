<?php

session_start();

require "../config/database.php";


if (isset($_REQUEST['submit'])) {

    $flag = false;

    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);
    $confirm_password = trim($_REQUEST['confirm_password']);



    if (!$name) {
        $_SESSION["name_error"] = "Name Field is Required!!!";
        $flag = true;
        header("location: register.php");
    } else {
        $_SESSION["old_name"] = $name;
        header("location: register.php");
    }


    // email regex 
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!$email) {
        $_SESSION["email_error"] = "Email Field is Required!!!";
        $flag = true;
        header("location: register.php");
    } elseif (!preg_match($email_regex, $email)) {
        $_SESSION["email_error"] = "Invalid email provide!!!";
        $flag = true;
        header("location: register.php");
    } else {
        $_SESSION["old_email"] = $email;
        header("location: register.php");
    }


    if (!$password) {
        $_SESSION["password_error"] = "Password Field is Required!!!";
        $flag = true;
        header("location: register.php");
    }else {
        $_SESSION["old_password"] = $password;
        header("location: register.php");
    }


    if (!$confirm_password) {
        $_SESSION["confirm_password_error"] = "Confirm password Field is Required!!!";
        $flag = true;
        header("location: register.php");
    } elseif ($password != $confirm_password) {
        $_SESSION["confirm_password_error"] = "Confirm password credential doesn't match !!!";
        $flag = true;
        header("location: register.php");
    }



    $email_query = "SELECT COUNT(*) AS result FROM `users` WHERE email='$email'";
    $connect = mysqli_query($conn, $email_query);
    $result = mysqli_fetch_assoc($connect)['result'];


    if ($flag) {
        echo "error";
    } else {

        if ($result > 0) {
            $_SESSION['duplicate'] = "email is duplicate !!";
            header("location: register.php");
        } else {
            $encrypt_pass = sha1($password);
            $createQuery = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$encrypt_pass')";
            mysqli_query($conn, $createQuery);
            $_SESSION['register_success'] = "Registration Complete !!";
            $_SESSION['register_email'] = "$email";
            $_SESSION['register_password'] = "$password";
            header("location: ../../Kufa-Webtemplate-PHP/index.php");
        }
    }
}
