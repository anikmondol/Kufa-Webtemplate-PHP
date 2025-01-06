<?php

session_start();

require "../../config/database.php";


if (isset($_REQUEST['insert_data'])) {

    $flag = false;

    $title = trim($_REQUEST['title']);
    $subtitle = trim($_REQUEST['subtitle']);
    $description = trim($_REQUEST['description']);


    $image = $_FILES['upload_image']['name'];
    $tmp_img = $_FILES['upload_image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $valid_extensions = array("png", "jpg", "jpeg", "webp");




    if (!$title) {
        $_SESSION["title_error"] = "Name Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if (!$subtitle) {
        $_SESSION["subtitle_error"] = "Email Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if (!$description) {
        $_SESSION["description_error"] = "Email Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    // image upload


    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        $flag = true;
        header("location: create.php");
    } else if (!(in_array($extension, $valid_extensions))) {
        $_SESSION['image_error'] = "Give me valid file extensions!!";
        $flag = true;
        header("location: create.php");
    }


    if ($flag) {
        $_SESSION["insert_error"] = "Your Information Data doesn't match with our records !!!";
        header("location: create.php");
    } else {
        if ($image) {
            $custom_name_img = $_SESSION['auth_id'] . '-' . rand() . '&-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/testimonials/" . $custom_name_img;

            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "INSERT INTO `testimonials`(`title`, `subtitle`, `description`, `image`) VALUES ('$title','$subtitle','$description','$custom_name_img')";
                mysqli_query($conn, $query);
                $_SESSION["update_info"] = "Testimonials insert successfully !!!";
                header("location: testimonials.php");
            } else {
                $_SESSION["insert_error"] = "Your Information Data doesn't match with our records !!!";
                header("location: testimonials.php");
            }
        }
    }
}



if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $select_port = "SELECT * FROM testimonials WHERE id=$id";
    $connectdb = mysqli_query($conn, $select_port);
    $port = mysqli_fetch_assoc($connectdb);



    if ($port['image']) {
        $old_img = $port['image'];
        $old_path = "../../public/testimonials/" . $old_img;
        if (file_exists($old_path)) {
            unlink($old_path);
        }
    }

    $sql = "DELETE FROM `testimonials` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["testimonials_delete"] = "Testimonials Delete successfully!!!";
    header("location: testimonials.php");
}


if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM testimonials WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $education = mysqli_fetch_assoc($connect);

    if ($education['status'] == 'deactive') {
        $update_query = "UPDATE testimonials SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "Testimonials status active successfully complete !!!";
        header("location: testimonials.php");
    } else {

        $update_query = "UPDATE testimonials SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "Testimonials status deactive successfully complete !!!";
        header("location: testimonials.php");
    }
}



if (isset($_REQUEST['edit_btn']) && isset($_REQUEST['edit_id']) && isset($_FILES['upload_image']['name'])) {


    $title = trim($_REQUEST['title']);
    $subtitle = trim($_REQUEST['subtitle']);
    $description = trim($_REQUEST['description']);
    $id = $_REQUEST['edit_id'];

    $flag = false;

    $image = $_FILES['upload_image']['name'];
    $tmp_img = $_FILES['upload_image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $valid_extensions = array("png", "jpg", "jpeg", "webp");




    if (!$title) {
        $flag = true;
    }


    if (!$subtitle) {
        $flag = true;
    }


    if (!$description) {
        $flag = true;
    }




    if ($flag) {
        $_SESSION["testimonials_error"] = "Your Information Image doesn't match with our records !!!";
        header("location: testimonials.php");
    } else {



        if ($image) {
            $select_port = "SELECT * FROM testimonials WHERE id= $id";
            $connectdb = mysqli_query($conn, $select_port);
            $port = mysqli_fetch_assoc($connectdb);


            if ($port['image']) {
                $old_img = $port['image'];
                $old_path = "../../public/testimonials/" . $old_img;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }


            $custom_name_img = $_SESSION['auth_id'] . '-' . rand() . '&-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/testimonials/" . $custom_name_img;




            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "UPDATE `testimonials` SET `title`='$title',`subtitle`='$subtitle',`description`='$description',`image`='$custom_name_img' WHERE id = $id";
                mysqli_query($conn, $query);
                $_SESSION["testimonials_update"] = "Testimonials Successfully update!!!!!!";
                header("location: testimonials.php");
            } else {
                $_SESSION["testimonials_error"] = "Your Information Image doesn't match with our records";
                header("location: testimonials.php");
            }
        } else {

            if ($title && $subtitle && $description) {
                $query = "UPDATE `testimonials` SET `title`='$title',`subtitle`='$subtitle',`description`='$description' WHERE id = $id";
                mysqli_query($conn, $query);
                $_SESSION["testimonials_update"] = "Testimonials Successfully update!!!!!!";
                header("location: testimonials.php");
            } else {
                $_SESSION["testimonials_error"] = "Your Information Image doesn't match with our records";
                header("location: testimonials.php");
            }
        }
    }
}
