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
                        <h2 class="fw-bold">Create Portfolios</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php" method="post">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">Portfolios</p>
                           
                            <div class="col-md-12">
                                <label for="old_inputPassword4" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control <?= (isset($_SESSION["title_error"])) ? "is-invalid" : ""; ?> " id="old_inputPassword4">

                                <!-- error start -->
                                <?php if (isset($_SESSION["title_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["title_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["title_error"]); ?>


                            </div>
                            <div class="col-md-12">
                                <label for="new_inputPassword4" class="form-label mt-1">Fatback Number</label>
                                <input class="form-control <?= (isset($_SESSION["description_error"])) ? "is-invalid" : ""; ?> " name="description" id="new_inputPassword4" rows="5" cols="30"></input>

                                <!-- error start -->
                                <?php if (isset($_SESSION["description_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["description_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["description_error"]); ?>

                            </div>
                            <div class="col-md-12">
                                <label for="confirm_inputPassword4" class="form-label">Icon</label>
                                <input name="icon" type="text" class="form-control click <?= (isset($_SESSION["icon_error"])) ? "is-invalid" : ""; ?> " id="confirm_inputPassword4">

                                 <!-- error start -->
                                 <?php if (isset($_SESSION["icon_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["icon_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["icon_error"]); ?>
                                 <!-- error end -->

                                <div class="card my-3">
                                    <div class="card-body" style="overflow-y: scroll; height: 220px;">
                                        <div class="fa-2x">
                                        <?php foreach ($fonts as $font) { ?>
                                            <span class="m-2"><i class="<?= $font; ?>" onclick="myFun(event)"></i></span>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- error start -->
                            <?php if (isset($_SESSION["services_insert"])) {
                            ?>
                                <span style="font-size: 14px;" id="emailHelp" class="form-text mt-2 m-b-md text-success"> <?php echo $_SESSION["services_insert"]; ?> *</span>
                            <?php }
                            unset($_SESSION["services_insert"]); ?>
                            <!-- error end -->


                            <!-- error start -->
                            <?php if (isset($_SESSION["services_error"])) {
                            ?>
                                <span style="font-size: 14px;" id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["services_error"]; ?> *</span>
                            <?php }
                            unset($_SESSION["services_error"]); ?>
                            <!-- error end -->

                            <div class="col-12">
                                <button name="create" type="submit" class="btn mt-3 btn-primary">Create</button>
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