<?php

include("../master/header.php");


$users_query = "select * FROM users";
$users = mysqli_query($conn, $users_query);
$result = mysqli_fetch_assoc($users);


$users_query = "SELECT * FROM users";
$users = mysqli_query($conn, $users_query);

$total_users = mysqli_num_rows($users);


$emails_query = "SELECT * FROM emails";
$emails = mysqli_query($conn, $emails_query);

$total_emails = mysqli_num_rows($emails);


$projects_query = "SELECT * FROM projects";
$projects = mysqli_query($conn, $projects_query);

$total_projects = mysqli_num_rows($projects);



?>

<!-- content start -->



<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h2 class="fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['temp_name'])) :  ?>
                        <div class="alert alert-custom" role="alert">
                            <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
                            <div class="alert-content">
                                <span class="alert-title">Welcome Chief Mr. <span class="m-1"><?php echo $_SESSION['temp_name']; ?></span> </span>
                                <span class="alert-text">Email is <span class="m-1"><?php echo $_SESSION['auth_email']; ?></span> </span>
                            </div>
                        </div>
                    <?php endif;
                    unset($_SESSION['temp_name']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">person</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Active Users</span>
                                    <span class="widget-stats-amount"> <?=  $total_users; ?> </span>
                                    <span class="widget-stats-info">790 unique this month</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 12%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">mail</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Today's Mail</span>
                                    <span class="widget-stats-amount"><?= $total_emails ?></span>
                                    <span class="widget-stats-info">471 Total Mail</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">keyboard_arrow_down</i> 4%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">file_download</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">View Projects</span>
                                    <span class="widget-stats-amount">87</span>
                                    <span class="widget-stats-info"><?= $total_projects ?> Projects downloaded</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 7%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">


                    <div class="card">
                        <div class="card-body">
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

                                        <?php foreach ($users as $user) :
                                            if ($user['id'] == $id) {
                                                continue;
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $number++; ?></td>
                                                <td class="text-center" class="name"><?= $user['name'] ?></td>
                                                <td class="text-center" class="email"><?= $user['email'] ?></td>

                                                <td class="text-center"><?= date("d-m-Y h:i:s A", strtotime($user["created_at"])); ?></td>
                                                <td class="text-center"><?= date("d-m-Y H:i:s A", strtotime($user['updated_at'])) ?></td>

                                                <td class="text-center"><span class="badge badge-success">Success</span></td>
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