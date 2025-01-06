<?php

session_start();

include("../../config/database.php");


if (!isset($_SESSION['auth_id'])) {
    header("location: ../../index.php");
}


$explode = explode('/', $_SERVER['PHP_SELF']);
$link = end($explode);

$id = 1;

$users_query = "select * FROM users where  id = $id";
$users = mysqli_query($conn, $users_query);
$result = mysqli_fetch_assoc($users);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/css/custom.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/highlight/styles/github-gist.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/plugins/datatables/datatables.min.css" rel="stylesheet">






    <!-- Theme Styles -->
    <link href="../../dashboard_assets/assets/css/main.min.css" rel="stylesheet">
    <link href="../../dashboard_assets/assets/css/custom.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="icon" type="image/png" sizes="32x32" href="../../dashboard_assets/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../dashboard_assets/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="../profile/profile.php">

                        <?php
                        if ($result['image'] == 'default.png') {
                            echo '<img style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;" src="../../public/default/default-profile.jpg">';
                        } else {
                            echo '<img style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;" src="../../public/profile/' . $result["image"] . '">';
                        }
                        ?>

                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?= isset($_SESSION['auth_name']) ? $_SESSION['auth_name']  : "admin"; ?><br><span class="user-state-info">On a call</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Setting
                    </li>
                    <li>
                        <a target="_blank" href="../../index.php" class="active"><i class="material-icons-two-tone">preview</i>Site View</a>
                    </li>
                    <li class="<?= ($link == 'home.php') ? 'active-page' : '' ?>">
                        <a href="../home/home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= ($link == 'profile.php') ? 'active-page' : '' ?>">
                        <a href="../profile/profile.php" class="active"><i class="material-icons-two-tone">manage_accounts</i>Profile</a>
                    </li>
                    <li class="<?= ($link == 'links.php') ? 'active-page' : '' ?>">
                        <a href="../links/links.php" class="active"><i class="material-icons-two-tone">share</i>Links</a>
                    </li>
                    <li class="<?= ($link == 'services.php') ? 'active-page' : '' ?>">
                        <a href="../services/services.php" class="active"><i class="material-icons-two-tone">design_services</i>Services</a>
                    </li>
                    <li class="<?= ($link == 'portfolios.php') ? 'active-page' : '' ?>">
                        <a href="../portfolios/portfolios.php" class="active"><i class="material-icons-two-tone">emoji_events</i>Portfolios</a>
                    </li>
                    <li class="<?= ($link == 'sponsor.php') ? 'active-page' : '' ?>">
                        <a href="../sponsor/sponsor.php" class="active"><i class="material-icons-two-tone">volunteer_activism</i>sponsor</a>
                    </li>
                    <li class="<?= ($link == 'education.php') ? 'active-page' : '' ?>">
                        <a href="../education/education.php" class="active"><i class="material-icons-two-tone">school</i>Education</a>
                    </li>
                    <li class="<?= ($link == 'email.php') ? 'active-page' : '' ?>">
                        <a href="../email/email.php" class="active"><i class="material-icons-two-tone">mark_email_unread</i>Email</a>
                    </li>
                    <li class="<?= ($link == 'testimonials.php') ? 'active-page' : '' ?>">
                        <a href="../testimonials/testimonials.php" class="active"><i class="material-icons-two-tone">contact_mail</i>Testimonials</a>
                    </li>
                    <li class="<?= ($link == 'Projects.php') ? 'active-page' : '' ?>">
                        <a href="../Projects/Projects.php" class="active"><i class="material-icons-two-tone">engineering</i>Projects</a>
                    </li>
                    <li class="<?= ($link == 'logout.php') ? 'active-page' : '' ?>">
                        <a href="../logout/logout.php" class="active"><i class="material-icons-two-tone">logout</i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link active" href="#">Applications</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Reports</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="../../dashboard_assets/assets/images/flags/us.png" alt=""></a>
                                    <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                        <li><a class="dropdown-item" href="#"><img src="../../dashboard_assets/assets/images/flags/germany.png" alt="">German</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../../dashboard_assets/assets/images/flags/italy.png" alt="">Italian</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../../dashboard_assets/assets/images/flags/china.png" alt="">Chinese</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                                        <small>19:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                                        <small>18:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../dashboard_assets/assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent sodales lobortis velit ac pellentesque</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../dashboard_assets/assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>