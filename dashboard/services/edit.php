<?php


include("../master/header.php");

include("../../public/fonts/fonts.php");


include("../../config/database.php");


if (isset($_REQUEST["editId"])) {
    
    $id = $_REQUEST['editId'];

    $services_query = "SELECT * FROM services where id = $id";
    $services = mysqli_query($conn, $services_query);
    $result = mysqli_fetch_assoc($services);
    
}

?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Edit Services</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php?edit_id=<?= $result['id'] ?>" method="post">
                            <p class="fw-bold" style="border-bottom: 0.5px solid gray; padding-bottom: 8px;">SERVICES</p>
                            <div class="col-md-12">
                                <label for="old_inputPassword4" class="form-label">Title</label>
                                <input value="<?= $result['title'] ?>" name="title" type="text" class="form-control " id="old_inputPassword4">



                            </div>
                            <div class="col-md-12">
                                <label for="new_inputPassword4" class="form-label">Description</label>
                                <textarea class="form-control " name="description" id="new_inputPassword4" rows="5" cols="30"><?= $result['description'] ?></textarea>

                            </div>
                            <div class="col-md-12">
                                <label for="confirm_inputPassword4" class="form-label">Icon</label>
                                <input value="<?= $result['icon'] ?>" name="icon" type="text" class="form-control click " id="confirm_inputPassword4">

                                 <!-- error start -->
                                 <!-- <?php if (isset($_SESSION["icon_error"])) {
                                ?>
                                    <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION["icon_error"]; ?> *</div>
                                <?php }
                                unset($_SESSION["icon_error"]); ?> -->
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


<script>

let click = document.querySelector(".click");

    function myFun(e) {
       click.value = e.target.classList.value;

    }
</script>


<?php

include("../master/footer.php");

?>