<?php

session_start();

require "../../config/database.php";


if (isset($_REQUEST['update_info'])) {

    $flag = false;

    $image = $_FILES['upload_image']['name'];
    $tmp_img = $_FILES['upload_image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $valid_extensions = array("png", "jpg", "jpeg");





    // image upload


    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        $flag = true;
        header("location: create.php");
    } else if (!(in_array($extension, $valid_extensions))) {
        $_SESSION['image_error'] = "Give me valid file extensions!!";
        $flag = true;
        header("location: sponsor.php");
    }


    if ($flag) {
        echo "error";
    } else {

        if ($image) {

            $custom_name_img = $_SESSION['auth_id'] . '-' . $_SESSION['auth_name'] . '-' . rand() . '-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/sponsor/" . $custom_name_img;

            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "INSERT INTO `sponsor`(`image`) VALUES ('$custom_name_img')";
                mysqli_query($conn, $query);
                $_SESSION["sponsor_inset"] = "Sponsor successfully Insert!!!";
                header("location: sponsor.php");
            } else {
                $_SESSION["sponsor_error"] = "Your Information Data doesn't match with our records !!!";
                header("location: sponsor.php");
            }
        }
    }
}





if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $select_port = "SELECT * FROM sponsor WHERE id=$id";
    $connectdb = mysqli_query($conn, $select_port);
    $port = mysqli_fetch_assoc($connectdb);



    if ($port['image']) {
        $old_img = $port['image'];
        $old_path = "../../public/sponsor/" . $old_img;
        if (file_exists($old_path)) {
            unlink($old_path);
        }
    }

    $sql = "DELETE FROM `sponsor` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["sponsor_delete"] = "sponsor Delete successfully!!!";
    header("location: sponsor.php");
}



if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM sponsor WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $sponsor = mysqli_fetch_assoc($connect);

    if ($sponsor['status'] == 'deactive') {
        $update_query = "UPDATE sponsor SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "sponsor status active successfully complete !!!";
        header("location: sponsor.php");
    } else {

        $update_query = "UPDATE sponsor SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "sponsor status deactive successfully complete !!!";
        header("location: sponsor.php");
    }
}



if (isset($_REQUEST['updata'])) {

    $flag = false;


    $image = $_FILES['upload_image']['name'];
    $tmp_img = $_FILES['upload_image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $valid_extensions = array("png", "jpg", "jpeg");
    $id = $_REQUEST['edit_id'];

    // image upload

    if (!(in_array($extension, $valid_extensions))) {
        $flag = true;
    }


    if ($flag) {
        $_SESSION["image_error"] = "Your Information Image doesn't match with our records !!!";
        header("location: sponsor.php");
    } else {

        if ($image) {


            $select_port = "SELECT * FROM sponsor WHERE id=$id";
            $connectdb = mysqli_query($conn, $select_port);
            $port = mysqli_fetch_assoc($connectdb);



            if ($port['image']) {
                $old_img = $port['image'];
                $old_path = "../../public/sponsor/" . $old_img;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }


            $custom_name_img = $_SESSION['auth_id'] . '-' . $_SESSION['auth_name'] . '-' . rand() . '-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/sponsor/" . $custom_name_img;



            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "UPDATE `sponsor` SET `image` = '$custom_name_img' WHERE id = $id";
                mysqli_query($conn, $query);
                $_SESSION["sponsor_update"] = "Update Info successfully update!!!";
                header("location: sponsor.php");
            } else {
                $_SESSION["sponsor_error"] = "Your Information Image doesn't match with our records !!!";
                header("location: sponsor.php");
            }
        }
    }
}
