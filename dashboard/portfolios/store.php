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
        $_SESSION["description_error"] = "Feedback  Number Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }elseif (!(is_numeric($description))){
        $_SESSION["description_error"] = "Give me Only Number Type!!!";
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
            $sql = "INSERT INTO `portfolios`(`title`, `feedback`, `icon`) VALUES ('$title','$description','$icon')";
            mysqli_query($conn, $sql);
            $_SESSION["portfolios_insert"] = "Portfolios Insert successfully!!!";
            header("location: portfolios.php");
        } else {
            $_SESSION["portfolios_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: portfolios.php");
        }
    }
}



if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $sql = "DELETE FROM `portfolios` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["portfolios_delete"] = "Portfolios Delete successfully!!!";
    header("location: portfolios.php");
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
    }elseif (!(is_numeric($description))){
        $flag = true;
    }


    if (!$icon) {
        $flag = true;
    }



    if ($flag) {
        $_SESSION["portfolios_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: portfolios.php");
    } else {

        if ($title && $description && $icon) {
            $sql = "UPDATE `portfolios` SET `title`='$title',`feedback`='$description',`icon`='$icon' WHERE id = {$_REQUEST['edit_id']}";
            mysqli_query($conn, $sql);
            $_SESSION["portfolios_update"] = "Portfolios Update successfully!!!";
            header("location: portfolios.php");
        } else {
            $_SESSION["portfolios_error"] = "Your giver Data doesn't match with our records !!!";
            header("location: portfolios.php");
        }
    }


}



if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM portfolios WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $portfolios = mysqli_fetch_assoc($connect);

    if ($portfolios['status'] == 'deactive') {
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "Portfolios status active successfully complete !!!";
        header("location: portfolios.php");
    } else {
       
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "Portfolios status deactive successfully complete !!!";
        header("location: portfolios.php");
    }

}




?>