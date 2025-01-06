<?php

session_start();

require "../../config/database.php";


if (isset($_REQUEST['insert_data'])) {



    $flag = false;

    $title = trim($_REQUEST['title']);
    $subtitle = trim($_REQUEST['subtitle']);
    $live_link = trim($_REQUEST['live_link']);
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

    if (!$live_link) {
        $_SESSION["live_link_error"] = "Live Link Field is Required!!!";
        $flag = true;
        header("location: create.php");
    }


    if (!$description) {
        $_SESSION["description_error"] = "Description Field is Required!!!";
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
            $local_path = "../../public/projects/" . $custom_name_img;

            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "INSERT INTO `projects`(`title`, `subtitle`, `description`, `image`, `live`) VALUES ('$title','$subtitle','$description','$custom_name_img','$live_link')";
                mysqli_query($conn, $query);
                $_SESSION["update_info"] = "Projects insert successfully !!!";
                header("location: projects.php");
            } else {
                $_SESSION["insert_error"] = "Your Information Data doesn't match with our records !!!";
                header("location: projects.php");
            }
        }
    }
}




if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $select_port = "SELECT * FROM projects WHERE id=$id";
    $connectdb = mysqli_query($conn, $select_port);
    $port = mysqli_fetch_assoc($connectdb);



    if ($port['image']) {
        $old_img = $port['image'];
        $old_path = "../../public/projects/" . $old_img;
        if (file_exists($old_path)) {
            unlink($old_path);
        }
    }

    $sql = "DELETE FROM `projects` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["projects_delete"] = "Projects Delete successfully!!!";
    header("location: projects.php");
}




if (isset($_GET['status_id'])) {
    $status_id =  $_GET['status_id'];

    $select_query = "SELECT * FROM projects WHERE id='$status_id'";
    $connect = mysqli_query($conn, $select_query);
    $education = mysqli_fetch_assoc($connect);

    if ($education['status'] == 'deactive') {
        $update_query = "UPDATE projects SET status='active' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["active_status"] = "Projects status active successfully !!!";
        header("location: projects.php");
    } else {

        $update_query = "UPDATE projects SET status='deactive' WHERE id='$status_id'";
        mysqli_query($conn, $update_query);
        $_SESSION["deactive_status"] = "Projects status deactive successfully !!!";
        header("location: projects.php");
    }
}



if (isset($_REQUEST['edit_btn']) && isset($_REQUEST['edit_id']) && isset($_FILES['upload_image']['name'])) {


    $title = trim($_REQUEST['title']);
    $subtitle = trim($_REQUEST['subtitle']);
    $description = trim($_REQUEST['description']);
    $live_link = trim($_REQUEST['live_link']);


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



    if (!$live_link) {
        $flag = true;
    }




    if ($flag) {
        $_SESSION["projects_error"] = "Your Information Image doesn't match with our records !!!";
        header("location: projects.php");
    } else {



        if ($image) {
            $select_port = "SELECT * FROM projects WHERE id= $id";
            $connectdb = mysqli_query($conn, $select_port);
            $port = mysqli_fetch_assoc($connectdb);


            if ($port['image']) {
                $old_img = $port['image'];
                $old_path = "../../public/projects/" . $old_img;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }


            $custom_name_img = $_SESSION['auth_id'] . '-' . rand() . '&-' . date("d-m-Y") . "." . $extension;
            $local_path = "../../public/projects/" . $custom_name_img;




            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "UPDATE `projects` SET `title`='$title',`subtitle`='$subtitle',`description`='$description', `live` = '$live_link',`image`='$custom_name_img' WHERE id = $id";
                mysqli_query($conn, $query);
                $_SESSION["projects_update"] = "projects Successfully update!!!!!!";
                header("location: projects.php");
            } else {
                $_SESSION["projects_error"] = "Your Information Image doesn't match with our records";
                header("location: projects.php");
            }
        } else {

            if ($title && $subtitle && $description) {
                $query = "UPDATE `projects` SET `title`='$title',`subtitle`='$subtitle',`description`='$description', `live` = '$live_link' WHERE id = $id";
                mysqli_query($conn, $query);
                $_SESSION["projects_update"] = "Projects Successfully update!!!!!!";
                header("location: projects.php");
            } else {
                $_SESSION["projects_error"] = "Your Information Image doesn't match with our records";
                header("location: projects.php");
            }
        }
    }
}
