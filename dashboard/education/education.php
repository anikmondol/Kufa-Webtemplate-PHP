<?php

include("../master/header.php");


$educations_query = "SELECT * FROM educations";
$educations = mysqli_query($conn, $educations_query);
$result = mysqli_fetch_assoc($educations);


?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Education</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['education_insert'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">add_box</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-success"><span class="m-1"><?php echo $_SESSION['education_insert']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['education_insert']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['education_error'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">warning</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-danger"><span class="m-1"><?php echo $_SESSION['education_error']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['education_error']); ?>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['education_delete'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">delete_outline</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-danger"><span class="m-1"><?php echo $_SESSION['education_delete']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['education_delete']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['education_update'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">update</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-success"><span class="m-1"><?php echo $_SESSION['education_update']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['education_update']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['deactive_status'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">warning</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-danger"><span class="m-1"><?php echo $_SESSION['deactive_status']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['deactive_status']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['active_status'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-success"><span class="m-1"><?php echo $_SESSION['active_status']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['active_status']); ?>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <h4 class="fw-bold">Education List</h4>
                                <a href="create.php"><button type="button" class="btn btn-primary"><i class="material-icons">add</i>Create</button> </a>
                            </div>
                            <table id="datatable3" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Title</th>
                                        <th>Year</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Update</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $number = 1;
                                    if (empty($result)):
                                    ?>
                                        <tr>
                                            <th colspan="6" class="text-center text-danger">
                                                No data found!!
                                            </th>
                                        </tr>
                                    <?php
                                    else:
                                        $id = $_SESSION['auth_id'];
                                    ?>

                                        <?php foreach ($educations as $item) :

                                            $modalId = "centeredModal" . $item['id'];

                                        ?>
                                            <tr>
                                                <td><?= $number++; ?></td>
                                                <td class="text-center"><?= $item['title'] ?></td>
                                                <td class="text-center"><?= $item['year'] ?></td>
                                                <td class="text-center"><?= $item['percentage'] ?> %</td>
                                                <td class="text-center">
                                                <?php
                                                if (($item['status'] == 'deactive')) {  ?>
                                                    <button class=" btn btn-warning btn-sm ">
                                                        <i class="material-icons">notifications_off</i> Deactive</button>
                                                <?php } else { ?>
                                                    <button class=" btn btn-success btn-sm">
                                                        <i class="material-icons">notifications</i> Active</button>
                                                <?php } ?>
                                                </td>
                                                <td><?= date("d-m-Y h:i:s A", strtotime($item["created_at"])); ?></td>
                                                <td><?= date("d-m-Y h:i:s A", strtotime($item["updated_at"])); ?></td>
                                                <td><span class="material-icons-two-tone" data-bs-toggle="modal" data-bs-target="#<?= $modalId; ?>"> more_vert </span></td>

                                                <!-- Vertically centered modal with dynamic modal ID -->
                                                <div class="modal fade" id="<?= $modalId; ?>" tabindex="-1" aria-labelledby="<?= $modalId; ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="<?= $modalId; ?>Label">Edit / Delete</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <a href="edit.php?editId=<?= $item["id"] ?>"><button type="button" class="btn btn-info btn-sm"><i class="material-icons">edit</i> Edit</button></a>
                                                                <a onclick="return confirm('Are you sure?');" href="store.php?deleteId=<?= $item["id"] ?>"><button type="button" class="btn btn-danger btn-sm"><i class="material-icons">delete_outline</i> Delete</button></a>
                                                                <?php
                                                                if (($item['status'] == 'deactive')) {  ?>
                                                                   <a href="store.php?status_id=<?= $item['id'] ?>">
                                                                        <button class=" btn btn-success btn-sm">
                                                                            <i class="material-icons">notifications</i> Active</button>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="store.php?status_id=<?= $item['id'] ?>"> <button class=" btn btn-warning btn-sm ">
                                                                            <i class="material-icons">notifications_off</i> Deactive</button>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </tbody>
                            </table>
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