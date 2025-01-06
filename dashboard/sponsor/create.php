<?php


include("../master/header.php");

include("../../public/fonts/fonts.php");

?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Create Sponsor</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                    <form action="store.php" method="post" enctype="multipart/form-data">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">Insert Sponsor</p>
                            <div class="col-md-12">
                                <picture class="d-block my-4">
                                    <img id="port_img" src="../../public/default/default.jpg" alt="portfolio create image" style="width: 100%; height: 150px; object-fit:contain;">
                                </picture>

                                <label for="file" class="form-label">Image</label>
                                <input onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])" type="file" name="upload_image" class="form-control mb-2 <?= (isset($_SESSION["image_error"])) ? "is-invalid" : ""; ?> icon_value" id="exampleInputEmail1" aria-describedby="emailHelp">

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
                                <button name="update_info" type="submit" class="btn mt-1 btn-primary">Update</button>
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


<script>
    let click = document.querySelector(".click");

    function myFun(e) {
        click.value = e.target.classList.value;

    }
</script>


<?php

include("../master/footer.php");

?>