<?php

include("../master/header.php");


$links_query = "select * FROM links where user_id = $id";
$links = mysqli_query($conn, $links_query);
$links = mysqli_fetch_assoc($links);

?>

<!-- content start -->

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Add Links</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="example-content">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">Social Media</p>
                            <form class="row g-3" action="links_manage.php">
                                <div class="col-md-6">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input value="<?= $links['facebook'] ?>" name="facebook" type="text" class="form-control <?= (isset($_SESSION["facebook_error"])) ? "is-invalid" : ""; ?> " id="facebook">

                                    <!-- name error start -->
                                    <?php if (isset($_SESSION["facebook_error"])) {
                                    ?>
                                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["facebook_error"]; ?> *</div>
                                    <?php }
                                    unset($_SESSION["facebook_error"]); ?>
                                    <!-- name error end -->

                                </div>
                                <div class="col-md-6">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input value="<?= $links['twitter'] ?>" name="twitter" type="text" class="form-control <?= (isset($_SESSION["twitter_error"])) ? "is-invalid" : ""; ?> " id="twitter">

                                    <!-- name error start -->
                                    <?php if (isset($_SESSION["twitter_error"])) {
                                    ?>
                                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["twitter_error"]; ?> *</div>
                                    <?php }
                                    unset($_SESSION["twitter_error"]); ?>
                                    <!-- name error end -->

                                </div>
                                <div class="col-md-6">
                                    <label for="linkedin" class="form-label">Linkedin</label>
                                    <input value="<?= $links['linkedin'] ?>" name="linkedin" type="text" class="form-control <?= (isset($_SESSION["linkedin_error"])) ? "is-invalid" : ""; ?> " id="linkedin">

                                    <!-- name error start -->
                                    <?php if (isset($_SESSION["linkedin_error"])) {
                                    ?>
                                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["linkedin_error"]; ?> *</div>
                                    <?php }
                                    unset($_SESSION["linkedin_error"]); ?>
                                    <!-- name error end -->

                                </div>
                                <div class="col-md-6">
                                    <label for="github" class="form-label">Github</label>
                                    <input value="<?= $links['github'] ?>" name="github" type="text" class="form-control <?= (isset($_SESSION["github_error"])) ? "is-invalid" : ""; ?> " id="github">

                                    <!-- name error start -->
                                    <?php if (isset($_SESSION["github_error"])) {
                                    ?>
                                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["github_error"]; ?> *</div>
                                    <?php }
                                    unset($_SESSION["github_error"]); ?>
                                    <!-- name error end -->

                                </div>


                                <!-- register_success start -->
                                <?php if (isset($_SESSION["Insert_success"])) {
                                ?>
                                    <div class="alert alert-custom d-flex justify-content-center align-items-center alert-light" role="alert">
                                        <div class="custom-alert-icon icon-Insert_success "><i class="material-icons-outlined text-success">done</i></div>
                                        <div class="alert-content ">
                                            <span class="alert-title text-success"> <?php echo $_SESSION["Insert_success"]; ?> </span>
                                        </div>
                                    </div>
                                <?php unset($_SESSION["Insert_success"]);
                                } ?>
                                <!-- register_success end -->


                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
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