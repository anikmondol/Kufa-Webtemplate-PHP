<?php

include("../master/header.php");



$emails_query = "SELECT * FROM emails";
$emails = mysqli_query($conn, $emails_query);
$result = mysqli_fetch_assoc($emails);

?>

<!-- content start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Emails</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['email_delete'])) :  ?>
                        <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">delete_outline</i></div>
                            <div class="alert-content">
                                <span class="alert-title text-danger"><span class="m-1"><?php echo $_SESSION['email_delete']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['email_delete']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <h4 class="fw-bold">Emails List</h4>
                            </div>
                            <table id="datatable3" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
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
                                            <th colspan="5" class="text-center text-danger">
                                                No data found!!
                                            </th>
                                        </tr>
                                    <?php
                                    else:
                                        $id = $_SESSION['auth_id'];
                                    ?>

                                        <?php foreach ($emails as $item) :

                                            $modalId = "centeredModal" . $item['id'];

                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $number++; ?></td>
                                                <td class="text-center"><i class="fa-3x <?= $item['name'] ?>"></i></td>
                                                <td class="text-center"><?= $item['email'] ?></td>
                                                <td class="text-center">
                                                <?= $item['body'] ?>
                                                </td>
                                                <td class="text-center"><?= date("d-m-Y h:i:s A", strtotime($item["created_at"])); ?></td>
                                                <td class="text-center"><?= date("d-m-Y h:i:s A", strtotime($item["updated_at"])); ?></td>
                                                <td class="text-center"><span class="material-icons-two-tone" data-bs-toggle="modal" data-bs-target="#<?= $modalId; ?>"> more_vert </span></td>

                                                <!-- Vertically centered modal with dynamic modal ID -->
                                                <div class="modal fade" id="<?= $modalId; ?>" tabindex="-1" aria-labelledby="<?= $modalId; ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="<?= $modalId; ?>Label">Delete</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <a onclick="return confirm('Are you sure?');" href="store.php?deleteId=<?= $item["id"] ?>"><button type="button" class="btn btn-danger btn-sm"><i class="material-icons">delete_outline</i>Delete</button></a>
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