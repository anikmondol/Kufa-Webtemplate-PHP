<?php

session_start();

include("../../config/database.php");

if (isset($_REQUEST['create'])) {


    $flag = false;

    $title = trim($_REQUEST['title']);
    $percentage = trim($_REQUEST['percentage']);
    $year = trim($_REQUEST['year']);



    if (!$title) {
        $_SESSION["title_error"] = "Title Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if (!$percentage) {
        $_SESSION["percentage_error"] = "Feedback  Number Field is Required!!!";
        $flag = true;
        header("location: create.php");
    } elseif (!(is_numeric($percentage))) {
        $_SESSION["percentage_error"] = "Give me Only Number Type!!!";
        $flag = true;
        header("location: create.php");
    }

    if (!$year) {
        $_SESSION["year_error"] = "year Field is Required!!!";
        $flag = true;
        header("location: create.php");
    } elseif (!(is_numeric($year))) {
        $_SESSION["percentage_error"] = "Give me Only Number Type!!!";
        $flag = true;
        header("location: create.php");
    }


    if ($flag) {
        echo "error";
    } else {

        if ($title && $percentage && $year) {
            $sql = "INSERT INTO `educations`(`title`, `year`, `percentage`) VALUES ('$title','$year','$percentage')";
            mysqli_query($conn, $sql);
            $_SESSION["education_insert"] = "Education Insert successfully!!!";
            header("location: education.php");
        } else {
            $_SESSION["education_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: education.php");
        }
    }
}





if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $sql = "DELETE FROM `educations` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["education_delete"] = "Education Delete successfully!!!";
    header("location: education.php");
}


if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM educations WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $education = mysqli_fetch_assoc($connect);

    if ($education['status'] == 'deactive') {
        $update_query = "UPDATE educations SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "Education status active successfully complete !!!";
        header("location: education.php");
    } else {

        $update_query = "UPDATE educations SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "Education status deactive successfully complete !!!";
        header("location: education.php");
    }
}


if (isset($_REQUEST['updata']) && isset($_REQUEST['edit_id'])) {


    $flag = false;

    $title = trim($_REQUEST['title']);
    $year = trim($_REQUEST['year']);
    $percentage = trim($_REQUEST['percentage']);
    $id = $_REQUEST['edit_id'];


    if (!$title) {
        $flag = true;
    }

    if (!$year) {
        $flag = true;
    } elseif (!(is_numeric($year))) {
        $flag = true;
    }


    if (!$percentage) {
        $flag = true;
    }



    if ($flag) {
        $_SESSION["education_error"] = "Your giver Data doesn't match with our records !!!";
        header("location: education.php");
    } else {

        if ($title && $year && $percentage) {
            $sql = "UPDATE `educations` SET `title`='$title',`year`='$year',`percentage`='$percentage' WHERE id = $id";
            mysqli_query($conn, $sql);
            $_SESSION["education_update"] = "Education Update successfully!!!";
            header("location: education.php");
        } else {
            $_SESSION["education_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: education.php");
        }
    }
}
