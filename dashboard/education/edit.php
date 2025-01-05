<?php


include("../master/header.php");

include("../../public/fonts/fonts.php");


include("../../config/database.php");


if (isset($_REQUEST["editId"])) {
    
    $id = $_REQUEST['editId'];

    $education_query = "SELECT * FROM educations where id = $id";
    $education = mysqli_query($conn, $education_query);
    $result = mysqli_fetch_assoc($education);

    
}

?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Create Education</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php?edit_id=<?= $result['id'] ?>" method="post">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">User Education</p>

                            <div class="col-md-12">
                                <label for="old_inputPassword4" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control <?= (isset($_SESSION["title_error"])) ? "is-invalid" : ""; ?> " id="old_inputPassword4" value="<?=  $result['title']?>">

                                <!-- name error start -->
                                <?php if (isset($_SESSION["title_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["title_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["title_error"]); ?>


                            </div>
                            <div class="col-md-12">
                                <label for="passing_year" class="form-label mt-1">Passing Year</label>
                                <input value="<?=  $result['year']?>" class="form-control <?= (isset($_SESSION["year_error"])) ? "is-invalid" : ""; ?> " name="year" id="passing_year" rows="5" cols="30"></input>

                                <!-- name error start -->
                                <?php if (isset($_SESSION["year_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["year_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["year_error"]); ?>

                            </div>
                            <div class="col-md-12">
                                <label for="new_inputPassword4" class="form-label mt-1">Confidence level</label>
                                <input value="<?=  $result['percentage']?>" class="form-control <?= (isset($_SESSION["percentage_error"])) ? "is-invalid" : ""; ?> " name="percentage" id="new_inputPassword4" rows="5" cols="30"></input>

                                <!-- name error start -->
                                <?php if (isset($_SESSION["percentage_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["percentage_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["percentage_error"]); ?>
                            </div>
                            <!--  -->

                            <div class="col-12">
                                <button name="updata" type="submit" class="btn mt-3 btn-primary">Create</button>
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