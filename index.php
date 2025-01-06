<?php

include("./config/database.php");

session_start();

$id = 1;

$users_query = "select * FROM users WHERE id = $id";
$users = mysqli_query($conn, $users_query);
$result = mysqli_fetch_assoc($users);



$links_query = "select * FROM links where user_id = $id";
$links = mysqli_query($conn, $links_query);
$link = mysqli_fetch_assoc($links);


$services_query = "SELECT * FROM services";
$services = mysqli_query($conn, $services_query);
$result1 = mysqli_fetch_assoc($services);

$portfolios_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($conn, $portfolios_query);
$result2 = mysqli_fetch_assoc($portfolios);



$sponsor_query = "SELECT * FROM sponsor";
$sponsor = mysqli_query($conn, $sponsor_query);
$result3 = mysqli_fetch_assoc($sponsor);

$educations_query = "SELECT * FROM educations";
$educations = mysqli_query($conn, $educations_query);
$result4 = mysqli_fetch_assoc($educations);


$testimonials_query = "SELECT * FROM testimonials";
$testimonials = mysqli_query($conn, $testimonials_query);
$result5 = mysqli_fetch_assoc($testimonials);

$projects_query = "SELECT * FROM projects";
$projects = mysqli_query($conn, $projects_query);
$result6 = mysqli_fetch_assoc($projects);


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="./front_assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="./front_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./front_assets/css/animate.min.css">
    <link rel="stylesheet" href="./front_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./front_assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./front_assets/css/flaticon.css">
    <link rel="stylesheet" href="./front_assets/css/slick.css">
    <link rel="stylesheet" href="./front_assets/css/aos.css">
    <link rel="stylesheet" href="./front_assets/css/default.css">
    <link rel="stylesheet" href="./front_assets/css/style.css">
    <link rel="stylesheet" href="./front_assets/css/responsive.css">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img src="./front_assets/img/logo/logo.png" alt="Logo"></a>
                                <a href="index.php" class="navbar-brand s-logo-none"><img src="./front_assets/img/logo/s_logo.png" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        <li class="nav-item"><a class="nav-link" href="./authentication/register.php">Register</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index.php">
                    <img src="./front_assets/img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>Nawabganj, Dhaka, Bangladesh</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+880 193-165-4590</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>anikmondol558363@gmail.com</p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <a href="<?= $link['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                <a href="<?= $link['twitter'] ?>"><i class="fab fa-twitter"></i></a>
                <a href="<?= $link['linkedin'] ?>"><i class="fab fa-linkedin"></i></a>
                <a href="<?= $link['github'] ?>"><i class="fab fa-github"></i></a>

            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $result['name'] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?= $result['name'] ?>, professional web developer with long time experience in this field​.</p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <li><a href="<?= $link['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= $link['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?= $link['linkedin'] ?>"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="<?= $link['github'] ?>"><i class="fab fa-github"></i></a></li>
                                </ul>
                            </div>
                            <a href="./front_assets/anik(cv).pdf" download="myfile.pdf" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img src="./front_assets/img/banner/banner_img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="./front_assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="./front_assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p>I am Anik Mondol, a Jr. PHP & Laravel Developer with nearly two years of hands-on experience in the field. Proficient in PHP and skilled in the Laravel framework, I specialize in crafting efficient and scalable web solutions. My passion for coding drives me to stay updated with the latest industry trends and technologies.</p>
                            <h3>Education:</h3>
                        </div>

                        <?php

                        if (empty($result2)):
                        ?>
                            <tr>
                                <th colspan="5" class="text-center text-danger">
                                    No data found!!
                                </th>
                            </tr>
                        <?php
                        else:
                        ?>
                            <?php foreach ($educations as $item) :

                            ?>
                                <!-- Education Item -->
                                <div class="education">
                                    <div class="year"><?= $item['year'] ?></div>
                                    <div class="line"></div>
                                    <div class="location">
                                        <span><?= $item['title'] ?></span>
                                        <div class="progressWrapper">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $item['percentage'] ?>%;" aria-valuenow="<?= $item['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Education Item -->
                        <?php endforeach;
                        endif; ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php

                    if (empty($result1)):
                    ?>
                        <tr>
                            <th colspan="5" class="text-center text-danger">
                                No data found!!
                            </th>
                        </tr>
                    <?php
                    else:
                    ?>
                        <?php foreach ($services as $service) :

                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?= $service['icon'] ?>"></i>
                                    <h3><?= $service['title'] ?></h3>
                                    <p>
                                        <?= $service['description'] ?>
                                    </p>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <?php

                    if (empty($result2)):
                    ?>
                        <tr>
                            <th colspan="5" class="text-center text-danger">
                                No data found!!
                            </th>
                        </tr>
                    <?php
                    else:
                    ?>
                        <?php foreach ($projects as $item) :

                        ?>
                            <div class="col-lg-4 col-md-6 pitem">
                                <div class="speaker-box">
                                    <div class="speaker-thumb">
                                        <img style="height: 500px; object-fit: cover;" class="img-fluid" src="./public/projects/<?= $item['image']; ?>" alt="img">
                                    </div>
                                    <div class="speaker-overlay">
                                        <span><?= $item['subtitle'] ?></span>
                                        <h4><a href="portfolio-single.html">
                                                <?= $item['title'] ?>
                                            </a></h4>
                                           
                                        <a href="./dashboard/projects/portfolio-single.php?id=<?= $item['id'] ?>" class="arrow-btn">More information <span></span></a>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>

                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">

                        <?php

                        if (empty($result2)):
                        ?>
                            <tr>
                                <th colspan="5" class="text-center text-danger">
                                    No data found!!
                                </th>
                            </tr>
                        <?php
                        else:
                        ?>
                            <?php foreach ($portfolios as $portfolio) :

                            ?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?= $portfolio['icon'] ?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?= $portfolio['feedback'] ?></span></h2>
                                            <span><?= $portfolio['title'] ?></span>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>


                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php
                            if (empty($result5)):
                            ?>
                                <tr>
                                    <th colspan="5" class="text-center text-danger">
                                        No data found!!
                                    </th>
                                </tr>
                            <?php
                            else:
                            ?>
                                <?php foreach ($testimonials as $item) :

                                ?>
                                    <div class="single-testimonial text-center">
                                        <div class="testi-avatar">
                                            <img style="height: 100px; width: 100px; border-radius: 50%; object-fit: cover;" src="./public//testimonials/<?= $item['image'] ?>" alt="img">
                                        </div>
                                        <div class="testi-content">
                                            <h4><span>“</span> <?= $item['description'] ?> <span>”</span></h4>
                                            <div class="testi-avatar-info">
                                                <h5><?= $item['title'] ?></h5>
                                                <span><?= $item['subtitle'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>




                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">

                    <?php

                    if (empty($result3)):
                    ?>
                        <tr>
                            <th colspan="5" class="text-center text-danger">
                                No data found!!
                            </th>
                        </tr>
                    <?php
                    else:
                    ?>
                        <?php foreach ($sponsor as $port) :

                        ?>

                            <div class="col-xl-2">
                                <div class="single-brand">
                                    <img src="./public/sponsor/<?= $port['image'] ?>" alt="img">
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>


                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <h5>OFFICE IN <span>Bangladesh</span></h5>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span>Nawabganj, Dhaka, Bangladesh</li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span>+880 193-165-4590</li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>anikmondol558363@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="./dashboard/email/action.php" method="post">
                                <input name="name" type="text" placeholder="your name *">
                                <input name="email" type="email" placeholder="your email *">
                                <textarea name="body" id="message" placeholder="your message *"></textarea>
                                <button type="submit" class="btn" name="email_sender">SEND</button>
                            </form>
                        </div>
                        <?php if (isset($_SESSION['insert_done'])) :  ?>
                            <div class="alert alert-custom d-flex align-items-center justify-content-center" role="alert">
                                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">add_box</i></div>
                                <div class="alert-content">
                                    <span class="alert-title text-success"><span class="m-1"><?php echo $_SESSION['insert_done']; ?></span> </span>
                                </div>
                            </div>
                        <?php endif;
                        unset($_SESSION['insert_done']); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Anik Mondol</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->





    <!-- JS here -->
    <script src="./front_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./front_assets/js/popper.min.js"></script>
    <script src="./front_assets/js/bootstrap.min.js"></script>
    <script src="./front_assets/js/isotope.pkgd.min.js"></script>
    <script src="./front_assets/js/one-page-nav-min.js"></script>
    <script src="./front_assets/js/slick.min.js"></script>
    <script src="./front_assets/js/ajax-form.js"></script>
    <script src="./front_assets/js/wow.min.js"></script>
    <script src="./front_assets/js/aos.js"></script>
    <script src="./front_assets/js/jquery.waypoints.min.js"></script>
    <script src="./front_assets/js/jquery.counterup.min.js"></script>
    <script src="./front_assets/js/jquery.scrollUp.min.js"></script>
    <script src="./front_assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="./front_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./front_assets/js/plugins.js"></script>
    <script src="./front_assets/js/main.js"></script>
</body>

</html>