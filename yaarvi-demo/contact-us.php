<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevating Spaces with Elegance: Yaarvi's Exquisite Brass Door Handles</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <style>
    a{
        color: #616161;
    }
    </style>
</head>

    <?php require_once("include_header.php"); ?>

    <!-- Breadcrumb -->
    <div class="pq-breadcrumb" style="padding-top: 180px; padding-bottom: 60px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    <!-- Contact Us -->
    <section class="contact-us pb-xl-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="pq-section-title pq-style-1 pq-mb-30">
                        <span class="pq-section-sub-title">our contact</span>
                        <h5 class="pq-section-main-title">Get in touch with us</h5>
                    </div>
                    <?php
                        include "conn.php";
                        $query = "select * from contact";
                        $res = mysqli_query($link, $query) or die ("not execute");
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Visit A Office</h6>
                            <p class="mb-0"><?php echo $row['contact_address'];?></p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-telephone"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Contact-Us</h6>
                            <p class="mb-0">
                                <a href="tel:<?php echo $row['contact_number1'];?>">
                                    <?php echo $row['contact_number1'];?>
                                </a>
                                <br>
                                <a href="tel:<?php echo $row['contact_number2'];?>">
                                    <?php echo $row['contact_number2'];?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-email"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Email-Us</h6>
                            <p class="mb-0">
                                <a href="mailto:<?php echo $row['contact_email1'];?>">
                                    <?php echo $row['contact_email1'];?>
                                </a>
                                <br>
                                <a href="mailto:<?php echo $row['contact_email2'];?>">
                                    <?php echo $row['contact_email2'];?>
                                </a> 
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-6 mt-4 mt-lg-0 p-xl-0">
                    <div class="row align-items-center">
                        <div class="pq-section-title pq-style-1 pq-mb-30">
                                <h5 class="pq-section-main-title">How Can We Help You ?</h5>
                                <p class="pq-section-description">Please feel free to get in touch using the form below. We’d love to hear for you.</p>
                        </div>
                        <form action="#" class="pq-contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="your-name" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="your-gender" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone-number" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="project-scope" placeholder="Project Scope">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="your-message" cols="40" rows="10" placeholder="Write Your Message"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <a class="pq-button" href="#">
                                        <div class="pq-button-block">
                                            <span class="pq-button-text me-0">SEND NOW</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us -->

    <div class="container-fluid mt-3">
        <div class="col-lg-12">
            <div class="pq-map pq-me-330">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117977.32799767093!2d69.97601058753072!3d22.47446815276766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3957154934c04597%3A0xe8b7dd81a49b75ca!2sJamnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1691954222398!5m2!1sen!2sin" width="100%" height="50%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- Contact Us Form -->
    <section class="contact-form pt-0 pb-xl-0">
        <div class="container">
            
        </div>
    </section>
    <!-- Contact Us Form -->

    <?php require_once("include_footer.php"); ?>

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Isotope -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- Counter -->
    <script src="js/jquery.countTo.min.js"></script>
    <!-- Wow -->
    <script src="js/wow.min.js"></script>
    <!-- Magnefic Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Custom Scrollbar -->
    <script src="js/jquery.mCustomScrollbar.min.js"></script>
    <!-- Custom -->
    <script src="js/custom.js"></script>
</body>
</html>