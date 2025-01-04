<?php

session_start();

require "../../config/database.php";


if (isset($_REQUEST['submit'])) {

    $flag = false;

    $twitter = trim($_REQUEST['twitter']);
    $facebook = trim($_REQUEST['facebook']);
    $github = trim($_REQUEST['github']);
    $linkedin = trim($_REQUEST['linkedin']);



    if (!$twitter) {
        $_SESSION["twitter_error"] = "Twitter Link Field is Required!!!";
        $flag = true;
        header("location: links.php");
    }


    if (!$facebook) {
        $_SESSION["facebook_error"] = "Facebook Link Field is Required!!!";
        $flag = true;
        header("location: links.php");
    } 


    if (!$github) {
        $_SESSION["github_error"] = "Github Link Field is Required!!!";
        $flag = true;
        header("location: links.php");
    }


    if (!$linkedin) {
        $_SESSION["linkedin_error"] = "Linkedin Link Field is Required!!!";
        $flag = true;
        header("location: links.php");
    } 



   


    if ($flag) {
        echo "error";
    } else {

        $user_id = $_SESSION['auth_id'];

        $createQuery = "INSERT INTO `links`(`user_id`, `facebook`, `twitter`, `linkedin`, `github`) VALUES ($user_id,'$facebook','$twitter','$linkedin','$github')";
        mysqli_query($conn, $createQuery);
        $_SESSION['Insert_success'] = "Links Insert Complete!!";
        header("location: links.php");

        
       
    }
}
