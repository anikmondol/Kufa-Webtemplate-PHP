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
                        <h2 class="fw-bold">Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">


                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <h4 class="fw-bold">Services List</h4>
                                <a href="create.php"><button type="button" class="btn btn-primary"><i class="material-icons">add</i>Create</button>   </a>
                            </div>
                            <table id="datatable3" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- <?php
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

                                        <?php foreach ($users as $user) :
                                                    if ($user['id'] == $id) {
                                                        continue;
                                                    }
                                        ?>
                                            <tr>
                                                <td><?= $number++; ?></td>
                                                <td class="name"><?= $user['name'] ?></td>
                                                <td class="email"><?= $user['email'] ?></td>

                                                <td><?= date("d-m-Y h:i:s A", strtotime($user["created_at"])); ?></td>
                                                <td><?= date("d-m-Y H:i:s A", strtotime($user['updated_at'])) ?></td>

                                                <td><span class="badge badge-success">Success</span></td>
                                            </tr>
                                    <?php endforeach;
                                            endif; ?>

 -->

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