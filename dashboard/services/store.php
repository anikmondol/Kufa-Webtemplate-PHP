<?php

session_start();

include("../../config/database.php");

if (isset($_REQUEST['create'])) {


    $flag = false;

    $title = trim($_REQUEST['title']);
    $description = trim($_REQUEST['description']);
    $icon = trim($_REQUEST['icon']);


    if (!$title) {
        $_SESSION["title_error"] = "Title Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if (!$description) {
        $_SESSION["description_error"] = "Description Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }

    if (!$description) {
        $_SESSION["icon_error"] = "Icon Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if ($flag) {
        echo "error";
    } else {

        if ($title && $description && $icon) {
            $sql = "INSERT INTO `services`(`title`, `description`, `icon`) VALUES ('$title','$description','$icon')";
            mysqli_query($conn, $sql);
            $_SESSION["services_insert"] = "Services Insert successfully!!!";
            header("location: create.php");
        } else {
            $_SESSION["services_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: create.php");
        }
    }
}



?>