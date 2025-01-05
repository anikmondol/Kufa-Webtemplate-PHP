<?php

session_start();

include("../../config/database.php");



if (isset($_REQUEST['deleteId'])) {

    $id = $_REQUEST['deleteId'];

    $sql = "DELETE FROM `emails` WHERE id = $id";

    mysqli_query($conn, $sql);
    $_SESSION["email_delete"] = "Email Delete successfully!!!";
    header("location: email.php");
}

?>