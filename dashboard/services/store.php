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

    if (!$icon) {
        $_SESSION["icon_error"] = "icon Field is Required!!!";
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
            header("location: services.php");
        } else {
            $_SESSION["services_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: services.php");
        }
    }
}



if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $sql = "DELETE FROM `services` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["services_delete"] = "Services Delete successfully!!!";
    header("location: services.php");
}


if (isset($_REQUEST['updata']) && isset($_REQUEST['edit_id'])) {


    $flag = false;

    $title = trim($_REQUEST['title']);
    $description = trim($_REQUEST['description']);
    $icon = trim($_REQUEST['icon']);


    if (!$title) {
        $flag = true;
    }


    if (!$description) {
        $flag = true;
    }

    if (!$icon) {
        $flag = true;
    }



    if ($flag) {
        $_SESSION["services_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: services.php");
    } else {

        if ($title && $description && $icon) {
            $sql = "UPDATE `services` SET `title`='$title',`description`='$description',`icon`='$icon' WHERE id = {$_REQUEST['edit_id']}";
            mysqli_query($conn, $sql);
            $_SESSION["services_update"] = "Services Update successfully!!!";
            header("location: services.php");
        } else {
            $_SESSION["services_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: services.php");
        }
    }


}



if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM services WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $services = mysqli_fetch_assoc($connect);

    if ($services['status'] == 'deactive') {
        $update_query = "UPDATE services SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "services status active successfully complete !!!";
        header("location: services.php");
    } else {
       
        $update_query = "UPDATE services SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "services status deactive successfully complete !!!";
        header("location: services.php");
    }

}




?>