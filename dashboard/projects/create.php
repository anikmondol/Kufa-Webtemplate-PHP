<?php

include("../master/header.php");

?>

<!-- content start -->

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Create Projects</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php" method="post" enctype="multipart/form-data">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">Insert Projects</p>
                            <div class="col-md-12">
                                <label for="input_name" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control <?= (isset($_SESSION["title_error"])) ? "is-invalid" : ""; ?> " id="input_name">

                                <!-- error start -->
                                <?php if (isset($_SESSION["title_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["title_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["title_error"]); ?>
                                <!-- error end -->

                            </div>
                            <div class="col-md-12">
                                <label for="input_subtitle" class="form-label">subtitle</label>
                                <input name="subtitle" type="text" class="form-control <?= (isset($_SESSION["subtitle_error"])) ? "is-invalid" : ""; ?> " id="input_subtitle">

                                <!-- error start -->
                                <?php if (isset($_SESSION["subtitle_error"])) {
                                ?>
                                    <div id="subtitleHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["subtitle_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["subtitle_error"]); ?>

                            </div>
                            <div class="col-md-12">
                                <label for="input_live_link" class="form-label">Live Link</label>
                                <input name="live_link" type="text" class="form-control <?= (isset($_SESSION["live_link_error"])) ? "is-invalid" : ""; ?> " id="input_live_link">

                                <!-- error start -->
                                <?php if (isset($_SESSION["live_link_error"])) {
                                ?>
                                    <div id="live_linkHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["live_link_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["live_link_error"]); ?>

                            </div>
                            <div class="col-md-12">
                                <label for="new_inputPassword4" class="form-label">Description</label>
                                <textarea class="form-control <?= (isset($_SESSION["description_error"])) ? "is-invalid" : ""; ?> " name="description" id="new_inputPassword4" rows="5" cols="30"></textarea>

                                <!-- error start -->
                                <?php if (isset($_SESSION["description_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["description_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["description_error"]); ?>

                            </div>
                            <div class="col-md-12">

                                <picture class="d-block my-4">
                                    <img id="port_img" src="../../public/default/default.jpg" alt="portfolio create image" style="width: 100%; height: 100px; object-fit:contain;">
                                </picture>

                                <label for="file" class="form-label">Image</label>
                                <input onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])" type="file" name="upload_image" class="form-control mb-2 <?= (isset($_SESSION["image_error"])) ? "is-invalid" : ""; ?> icon_value" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <!-- error start -->
                                <?php if (isset($_SESSION["image_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["image_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["image_error"]); ?>


                            </div>


                          

                            <div class="col-12">
                                <button name="insert_data" type="submit" class="btn mt-1 btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<?php

include("../master/footer.php");

?>