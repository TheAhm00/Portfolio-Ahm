<?php

$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <title>Ahm Portfolio</title>
    <!-- ====== Google Fonts ====== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <?php
    $result = $conn->query("SELECT * FROM homephotos LIMIT 1"); // Assuming you only want one cover image to be used as the favicon
    $row = $result->fetch_assoc();
    if ($row) {
        echo '<link rel="shortcut icon" href="img/' . $row["home_img"] . '" type="image/png">';
    }
    ?>

    <!-- ====== ALL CSS ====== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>




<body data-spy="scroll" data-target=".navbar-nav">

    <!-- Preloader -->

    <!-- // Preloader -->


    <!-- ====== Header ====== -->
    <header id="header" class="header">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand logo" href="adminlogin/login.php">
                    <?php
                    $result = $conn->query("SELECT * FROM homephotos");
                    while ($row = $result->fetch_assoc()) {
                        echo '<img style="border-radius: 0.3rem;" src="img/' . $row["home_img"] . '" alt="Image">';
                    }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-expanded="false"><span><i
                            class="fa fa-bars"></i></span></button>

                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="#home">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#service">SERVICE</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">PORTFOLIO</a></li>
                        <li class="nav-item"><a class="nav-link pr0" href="#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- ====== // Header ====== -->

    <!-- ====== Hero Area ====== -->
    <div class="hero-aria" id="home">
        <div class="container">
            <div class="hero-content h-100">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="text-uppercase">Let's Begin</h2>
                                <h3 class="text-uppercase"><span class="typed"></span></h3>
                                <p>A portfolio personally created by <?php
                                $result = $conn->query("SELECT * FROM displaycontent");
                                while ($row = $result->fetch_assoc()) {
                                    echo '' . $row["display_name"] . '';
                                }
                                ?></p>
                                <a href="#about" class="button smooth-scroll">Learn More</a>
                            </div>
                            <!--
                            <div class="col-md-6 order-md-2 text-center text-md-right">
                                <img src="assets/images/hero-area/img-1.jpg" alt="Your Image" class="img-fluid bordered-image">
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-area-slids owl-carousel">
            <div class="single-slider">
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/img-1.jpg)"></div>
            </div>
            <div class="single-slider">
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/img-2.jpg)"></div>
            </div>
        </div>
    </div>

    <!-- ====== //Hero Area ====== -->

    <!-- ====== Featured Area ====== -->
    <section id="featured" class="section-padding pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#"><?php
                        $result = $conn->query("SELECT * FROM displaycontent");
                        while ($row = $result->fetch_assoc()) {
                            echo $row["display_skill_1"];
                        }
                        ?></a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-edit"></i>
                            </div>
                            <p>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#"><?php
                        $result = $conn->query("SELECT * FROM displaycontent");
                        while ($row = $result->fetch_assoc()) {
                            echo $row["display_skill_2"];
                        }
                        ?></a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-code"></i>
                            </div>
                            <p>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#"><?php
                        $result = $conn->query("SELECT * FROM displaycontent");
                        while ($row = $result->fetch_assoc()) {
                            echo $row["display_skill_3"];
                        }
                        ?></a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <p>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== //Featured Area ====== -->
    <style>
        .skillbar-title span {
            display: block;
            padding: 0 20px;
            height: 35px;
            line-height: 35px;
        }

        .skillname {
            position: absolute;
            top: 0;
            left: 0;
            width: 110px;
            font-size: 14px;
            color: #ffffff;
            background: #000;
        }

        .skillper {
            position: absolute;
            right: 10px;
            top: 0;
            font-size: 14px;
            height: 35px;
            line-height: 35px;
        }

        .skillbar {
            position: relative;
            display: block;
            margin-bottom: 15px;
            width: 100%;
            background: #eee;
            height: 35px;
            -webkit-transition-property: width, background-color;
            transition-property: width, background-color;
        }

        .about-bg {
            height: 100%;
            min-height: 400px;
            position: relative;
            background-size: cover;
            background-position: center;
            background-color: orange;
        }
    </style>
    <!-- ====== About Area ====== -->
    <section id="about" class="section-padding about-area bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>About Me</h2>
                        <p>tungkol sakin</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-bg">
                        <?php
                        // Fetch and display the images from the database
                        $result = $conn->query("SELECT * FROM homephotos");
                        while ($row = $result->fetch_assoc()) {
                            echo '<img src="img/' . $row["cover_img"] . '" alt="Photo">';
                        }
                        ?>
                        <div class="social-aria">
                            <?php
                            $query = "SELECT * FROM socialmedia ORDER BY id ASC";
                            $readQuery = mysqli_query($conn, $query);
                            if ($readQuery->num_rows > 0) {

                                while ($rd = mysqli_fetch_assoc($readQuery)) {

                                    $socialmedialink = $rd['socialmedialink'];
                                    $socialmedialogo = $rd['socialmedialogo'];

                                    ?>
                                    <?php
                                    // Looping col-md-6
                                    for ($i = 0; $i < 1; $i++) {
                                        ?>
                                        <a target="_blank" href="<?php echo "$socialmedialink" ?>"><i
                                                class="<?php echo "$socialmedialogo" ?>"></i></a>

                                    <?php } // End of col-md-6 loop ?>
                                    <?php
                                }
                            } else {
                                echo "No data to show";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Hello, I am <span> <?php
                        $result = $conn->query("SELECT * FROM displaycontent");
                        while ($row = $result->fetch_assoc()) {
                            echo '' . $row["display_name"] . '';
                        }
                        ?></span></h2>
                        <h4><?php
                        $result = $conn->query("SELECT * FROM aboutdes");
                        while ($row = $result->fetch_assoc()) {
                            echo '<p>' . $row["des"] . '</p>';
                        }

                        ?></h4>
                        <p>.</p>

                        <h5>My Skills</h5>

                        <!-- Skill Area -->
                        <div id="skills" class="skill-area">
                            <?php
                            $query = "SELECT * FROM about ORDER BY id DESC";
                            $readQuery = mysqli_query($conn, $query);
                            $count = 0; // initialize counter
                            if ($readQuery->num_rows > 0) {
                                while ($rd = mysqli_fetch_assoc($readQuery)) {
                                    $stdid = $rd['id'];
                                    $skillname = $rd['skillname'];
                                    $skillper = $rd['skillper'];
                                    $count++; // increment counter
                                    // output HTML for skill in first col-md-6
                                    if ($count % 5 != 0) {
                                        ?>
                                        <div class="single-skill">
                                            <div class="skillbar" data-percent="100%">
                                                <div class="skillbar-title"><span><?php echo $skillname ?></span></div>
                                                <div class="skill-bar-percent"><?php echo $skillper ?>%</div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            } else {
                                echo "No data to show";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding pb-70 bg-img fact-counter" id="counter"
        style="background-image: url(assets/images/fan-fact-bg.jpg)">
        <div class="container">
            <div class="row">



                <?php
                $query = "SELECT * FROM education ORDER BY endyear DESC";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                    while ($rd = mysqli_fetch_assoc($readQuery)) {

                        $stdid = $rd['id'];
                        $education = $rd['edu'];
                        $school = $rd['school'];
                        $course = $rd['course'];
                        $startyear = $rd['startyear'];
                        $endyear = $rd['endyear'];
                        ?>
                        <?php
                        // Looping col-md-6
                        for ($i = 0; $i < 1; $i++) {
                            ?>

                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="single-fun-fact">
                                    <h2><?php echo $school ?></h2>
                                    <h3><?php echo $education ?></h3>
                                    <p><?php echo $startyear . ' to ' . $endyear ?></p>
                                    <p><?php echo $course ?></p>
                                </div>
                            </div>




                        <?php } // End of col-md-6 loop ?>
                        <?php
                    }
                } else {
                    echo "No data to show";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- ====== //Fact Counter Section ====== -->

    <!-- ====== Service Section ====== -->
    <section id="service" class="section-padding pb-70 service-area bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Service</h2>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <div class="row">
                <!-- Single Service -->

                <?php
                $query = "SELECT * FROM service ORDER BY id ASC";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                    while ($rd = mysqli_fetch_assoc($readQuery)) {

                        $servicelogo = $rd['logo'];
                        $servicename = $rd['name'];
                        $servicedes = $rd['des'];
                        ?>
                        <?php
                        // Looping col-md-6
                        for ($i = 0; $i < 1; $i++) {
                            ?>


                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <i class="<?php echo $servicelogo ?>"></i>
                                    </div>
                                    <h2><?php echo $servicename ?>
                                    </h2>
                                    <p><?php echo $servicedes ?></p>
                                </div>
                            </div>

                        <?php } // End of col-md-6 loop ?>
                        <?php
                    }
                } else {
                    echo "No data to show";
                }
                ?>



            </div>
        </div>
    </section>
    <!-- ====== //Service Section ====== -->
    <style>
        .iimg {
            border: 1px solid black;

        }

        .why-me-right .why-me-icon,
        .why-me-left .why-me-icon {
            color: #fff;
            position: absolute;
            font-size: 40px;
            width: 100px;
            height: 100%;
            text-align: center;
            line-height: 1;
            right: 0;
            bottom: 0;
            border: 1px solid rgba(0, 0, 0, 0);
            display: inline-block;
            background-color: white;
            -webkit-transition: .3s;
            transition: .3s;
        }
    </style>
    <!-- ====== Why choose Me Section ====== -->
    <section id="" class="section-padding why-choose-us pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Recent Works</h2>
                        <p>kamakailang trabaho</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $query = "SELECT * FROM portfolio ORDER BY id ASC";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                    while ($rd = mysqli_fetch_assoc($readQuery)) {

                        $project_category = $rd['project_category'];
                        $project_img = $rd['project_img'];
                        $project_name = $rd['project_name'];
                        ?>
                        <?php
                        // Looping col-md-6
                        for ($i = 0; $i < 1; $i++) {
                            ?>

                            <div class="col-lg-4">
                                <div class="box">
                                    <a href="<?php echo "./cms/portfolio/" . "$project_img" ?>"><img src="<?php echo "./cms/portfolio/" . "$project_img" ?>" alt="Image Description"></a>
                                    <h3><?php echo "$project_name" ?></h3>
                                    <p><?php echo "$project_category" ?></p>
                                </div>
                            </div>


                        <?php } // End of col-md-6 loop ?>
                        <?php
                    }
                } else {
                    echo "No data to show";
                }
                ?>


            </div>



            <!-- // Single Why choose me -->


            <!-- // Single Why choose me -->
        </div>
        </div>
    </section>
    <!-- ====== //Why choose Me Section ====== -->

    <!-- ====== Portfolio Section ====== -->
    <section id="portfolio" class="section-padding pb-85 portfolio-area bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Experience</h2>
                        <p>Karanasan</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM experience ORDER BY end_year DESC";
                        $readQuery = mysqli_query($conn, $query);
                        if ($readQuery->num_rows > 0) {

                            while ($rd = mysqli_fetch_assoc($readQuery)) {

                                $companyname = $rd['company_name'];
                                $companyaddr = $rd['company_address'];
                                $jobtitle = $rd['job_title'];
                                $jobdes = $rd['job_description'];
                                $startyear = $rd['start_year'];
                                $endyear = $rd['end_year'];
                                $startyearmonth = $rd['start_year_month'];
                                $endyearmonth = $rd['end_year_month'];
                                ?>
                                <?php
                                // Looping col-md-6
                                for ($i = 0; $i < 1; $i++) {
                                    ?>

                                    <div class="col-md-6">
                                        <div class="exp-col" style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                                            <span><?php echo $startyearmonth . '-' . $startyear . ' to ' . $endyearmonth . '-' . $endyear ?></span>
                                            <h3><?php echo $companyname ?></h3>
                                            <h4><?php echo $companyaddr ?></h4>
                                            <h5><?php echo $jobtitle ?></h5>
                                            <p><?php echo $jobdes ?></p>
                                        </div>
                                    </div>

                                <?php } // End of col-md-6 loop ?>
                                <?php
                            }
                        } else {
                            echo "No data to show";
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="row portfolio">
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix wp graphic">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-1.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-1.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix logo web graphic other wp">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-2.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-2.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix wp other">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-3.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-3.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix logo other graphic wp web">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-4.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-4.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix logo other wp graphic web">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-5.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-5.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix wp logo graphic web">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-6.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-6.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover other">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix web wp">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-7.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-7.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix logo graphic wp web">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-8.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-8.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
                <!-- Single Portfolio -->
                <div class="col-lg-4 col-md-6 mix other logo web">
                    <div class="single-portfolio" style="background-image: url(assets/images/portfolio/img-9.jpg)">
                        <div class="portfolio-icon text-center">
                            <a data-lightbox='lightbox' href="assets/images/portfolio/img-9.jpg"><i
                                    class="fas fa-expand-arrows-alt"></i></a>
                        </div>
                        <div class="portfolio-hover">
                            <h4>Project <span>Name</span></h4>
                        </div>
                    </div>
                </div>
                <!-- // Single Portfolio -->
            </div>
        </div>
    </section>
    <!-- ====== // Portfolio Section ====== -->



    <!-- ====== Call to Action Area ====== -->
    <section style="background: orange;" class="section-padding call-to-action-aria ">
        <div style="background: orange;" class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2>WANT TO HIRE ME?</h2>
                    <p>i would like for you to reach out to me if i would be of help to you or your team.</p>
                </div>
                <div class="col-lg-3">
                    <div class="cta-button">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <a href="#" class="button">Hire me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("hireButton").addEventListener("click", function () {
            alert("You're hired!");
        });
    </script>
    <!-- ====== // Call to Action Area ====== -->



    <!-- ====== Contact Area ====== -->
    <section id="contact" class="section-padding contact-section bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Contact Me</h2>
                        <p>you could contact me through the section below.</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="social-links">
                        <?php
                        $query = "SELECT * FROM socialmedia ORDER BY id ASC";
                        $readQuery = mysqli_query($conn, $query);
                        if ($readQuery->num_rows > 0) {

                            while ($rd = mysqli_fetch_assoc($readQuery)) {

                                $socialmedialink = $rd['socialmedialink'];
                                $socialmedialogo = $rd['socialmedialogo'];

                                ?>
                                <?php
                                for ($i = 0; $i < 1; $i++) {
                                    ?>
                                    <style>
                                        .social-link {
                                            color: black;
                                            width: 30px;
                                            height: 30px;
                                            display: inline-block;
                                            border: 1px solid;
                                            text-align: center;
                                            line-height: 30px;
                                            margin: 0 5px;
                                            -webkit-transition: .3s;
                                            transition: .3s;
                                            margin-bottom: 20px;
                                        }
                                    </style>
                                    <a class="social-link" href="<?php echo $socialmedialink ?>"><i
                                            class="<?php echo $socialmedialogo ?>"></i></a>

                                <?php } // End of col-md-6 loop ?>
                                <?php
                            }
                        } else {
                            echo "No data to show";
                        }
                        ?>
                    </div>
                    <?php
                    $query = "SELECT * FROM contact ORDER BY id ASC";
                    $readQuery = mysqli_query($conn, $query);
                    if ($readQuery->num_rows > 0) {

                        while ($rd = mysqli_fetch_assoc($readQuery)) {

                            $email = $rd['email'];
                            $mobilenum = $rd['mobile_num'];
                            $address = $rd['address'];
                            ?>
                            <?php
                            // Looping col-md-6
                            for ($i = 0; $i < 1; $i++) {
                                ?>
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <p><i class="fa fa-envelope"></i><?php echo "$email" ?></p>
                                    </div>
                                    <div class="contact-item">
                                        <p><i class="fa fa-phone"></i><?php echo "$mobilenum" ?></p>
                                    </div>
                                    <div class="contact-item">
                                        <p><i class="fa fa-map-marker"></i><?php echo "$address" ?></p>
                                    </div>
                                </div>


                            <?php } // End of col-md-6 loop ?>
                            <?php
                        }
                    } else {
                        echo "No data to show";
                    }
                    ?>
                </div>
                <!-- // Contact Form -->
            </div>
    </section>
    <!-- ====== // Contact Area ====== -->


    <!-- ====== Footer Area ====== -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p class="text-white">&copy;AHM</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== // Footer Area ====== -->






    <!-- ====== ALL JS ====== -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.mixitup.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/typed.js"></script>
    <script src="assets/js/skill.bar.js"></script>
    <script src="assets/js/fact.counter.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>