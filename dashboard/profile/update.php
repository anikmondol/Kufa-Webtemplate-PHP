<?php

session_start();

require "../../config/database.php";


if (isset($_REQUEST['update_info'])) {

    $flag = false;

    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);


    $image = $_FILES['upload_image']['name'];
    $tmp_img = $_FILES['upload_image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $valid_extensions = array("png", "jpg", "jpeg");




    if (!$name) {
        $_SESSION["name_error"] = "Name Field is Required!!!";
        $flag = true;
        header("location: profile.php");
    }


    // email regex 
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!$email) {
        $_SESSION["email_error"] = "Email Field is Required!!!";
        $flag = true;
        header("location: profile.php");
    } elseif (!preg_match($email_regex, $email)) {
        $_SESSION["email_error"] = "Invalid email provide!!!";
        $flag = true;
        header("location: profile.php");
    }


    // image upload


    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        $flag = true;
        header("location: profile.php");
    } else if (!(in_array($extension, $valid_extensions))) {
        $_SESSION['image_error'] = "Give me valid file extensions!!";
        $flag = true;
        header("location: profile.php");
    }


    if ($flag) {
        echo "error";
    } else {

        if ($image) {


            $select_port = "SELECT * FROM users WHERE id={$_SESSION['auth_id']}";
            $connectdb = mysqli_query($conn, $select_port);
            $port = mysqli_fetch_assoc($connectdb);


            if ($port['image']) {
                $old_img = $port['image'];
                $old_path = "../../public/profile/" . $old_img;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }


            $custom_name_img = $_SESSION['auth_id'] . '-' . $_SESSION['auth_name'] . '-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/profile/" . $custom_name_img;
            $datetime = (new DateTime())->format("Y-m-d H:i:s.u");



            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "UPDATE `users` SET 
                    `name` = '$name',
                    `email` = '$email',
                    `image` = '$custom_name_img',
                    `updated_at` = '$datetime' 
                WHERE id = {$_SESSION['auth_id']}";
                mysqli_query($conn, $query);
                $_SESSION["update_info"] = "Update Info successfully update!!!";
                $_SESSION['auth_name'] = $name;
                $_SESSION['auth_email'] = $email;
                header("location: profile.php");
            } else {
                $_SESSION["update_info_error"] = "Your Information Image doesn't match with our records !!!";
                header("location: profile.php");
            }
        }
    }
}


if (isset($_REQUEST['update_password'])) {

    $flag = false;

    $password = trim($_REQUEST['password']);
    $new_password = trim($_REQUEST['new_password']);
    $confirm_password = trim($_REQUEST['confirm_password']);


    if (!$password) {
        $_SESSION["password_error"] = "Password Field is Required!!!";
        $flag = true;
        header("location: profile.php");
    }


    if (!$new_password) {
        $_SESSION["new_password_error"] = "New Password Field is Required!!!";
        $flag = true;
        header("location: profile.php");
    }

    if (!$confirm_password) {
        $_SESSION["confirm_password_error"] = "Confirm password Field is Required!!!";
        $flag = true;
        header("location: profile.php");
    } elseif ($new_password != $confirm_password) {
        $_SESSION["confirm_password_error"] = "Confirm password credential doesn't match !!!";
        $flag = true;
        header("location: profile.php");
    }


    if ($flag) {
        echo "error";
    } else {

        
        $encrypt_pass = sha1($password);

        $users_query = "select * FROM users WHERE id = {$_SESSION['auth_id']} and password = '$encrypt_pass'";
        $users = mysqli_query($conn, $users_query);
        $result = mysqli_fetch_assoc($users);

    



        if ($result['password'] === $encrypt_pass) {

            $new_encrypt_pass = sha1($new_password);

            $sql = "UPDATE `users` SET `password`='$new_encrypt_pass' WHERE id = {$_SESSION['auth_id']}";
            mysqli_query($conn, $sql);
            $_SESSION["update_password"] = "Password successfully update!!!";
            header("location: profile.php");
        } else {
            $_SESSION["update_password_error"] = "Your giver Password doesn't match with our records !!!";
            header("location: profile.php");
        }
    }
}
