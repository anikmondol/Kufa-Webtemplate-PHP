<?php


include("../master/header.php");

include("../../public/fonts/fonts.php");


include("../../config/database.php");


if (isset($_REQUEST["editId"])) {
    
    $id = $_REQUEST['editId'];

    $sponsor_query = "SELECT * FROM sponsor where id = $id";
    $sponsor = mysqli_query($conn, $sponsor_query);
    $result = mysqli_fetch_assoc($sponsor);
    
}

?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Edit Sponsor</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php?edit_id=<?= $result['id'] ?>" method="post" enctype="multipart/form-data">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">Sponsor</p>
                            <div class="col-md-12">
                                <picture class="d-block my-4">
                                    <img id="port_img" src="../../public/sponsor/<?= $result['image'] ?>" alt="portfolio create image" style="width: 100%; height: 150px; object-fit:contain;">
                                </picture>

                                <label for="file" class="form-label">Image</label>
                                <input onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])" type="file" name="upload_image" class="form-control mb-2 <?= (isset($_SESSION["image_error"])) ? "is-invalid" : ""; ?> icon_value" id="exampleInputEmail1" aria-describedby="emailHelp" value="../../public/sponsor/<?= $result['image'] ?>">

                                <!-- name error start -->
                                <?php if (isset($_SESSION["image_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["image_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["image_error"]); ?>

                            </div>


                            <!-- name error start -->
                            <?php if (isset($_SESSION["update_info_error"])) {
                            ?>
                                <span style="font-size: 14px;" id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["update_info_error"]; ?> *</span>
                            <?php }
                            unset($_SESSION["update_info_error"]); ?>
                            <!-- name error end -->

                            <div class="col-12">
                                <button name="updata" type="submit" class="btn mt-3 btn-primary">Updata</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>



<?php

include("../master/footer.php");

?>