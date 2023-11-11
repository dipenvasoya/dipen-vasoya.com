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
</head>

    <?php require_once("include_header.php"); ?>

    <!-- Breadcrumb -->
    <div class="pq-breadcrumb" style="padding-top: 180px; padding-bottom: 60px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>Company Profile</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="about-us.php">About Us</a>
                                </li>
                                <li class="breadcrumb-item active">Company Profile</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    <!-- Portfolio Sinlge -->
    <section class="single-portfolio mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <!-- <h2 class="text-center">Elevate Your Space with Exquisite Door Handles from Yaarvi</h2>
                    <p class="mt-3" style="text-align: justify;">In the world of exquisite home decor, Yaarvi emerges as a distinguished manufacturer, exporter, and supplier of top-tier door handles &amp; door handle accessories. Renowned for their elegance, intricate design, and undeniable beauty, these designer door handles and hardware items have swiftly risen to prominence in both the Indian and international markets.</p>
                    <h3 class="text-center"> Unveiling a World of Elegance: Brass Door Handles and More </h3>
                    <p class="mt-3" style="text-align: justify;"> Yaarvi stands at the forefront of innovation in its product lines, particularly in the domain of handles. But have you ever paused to ponder why so much effort goes into the creation of something seemingly simple, like a handle? We pose the same question to you. Why not invest the same level of dedication to crafting that crucial first impression? After all, it's about that tactile connection that immediately puts you at ease, whether you're entering a room, a walk-in closet, or any other space. Yaarvi's range of Brass door handles is a testament to unparalleled craftsmanship and attention to detail. Each handle is not just a functional element but also a work of art that seamlessly blends form and function. These handles don't just open doors; they open up possibilities and create an inviting ambiance.</p> -->
                    <?php
                        include "conn.php";
                        $query = "select * from about";
                        $res = mysqli_query($link, $query) or die ("not execute");
                        while($row = mysqli_fetch_assoc($res)){ echo $row['about_us']; }
                    ?>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services pq-bg-img-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 wow animated fadeInRight">
                    <div class="pq-section-title pq-style-1">
                        <!-- <span class="pq-section-sub-title">what we offer</span> -->
                        <h3 class="pq-section-main-title">Why US?</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="divider pq-right-border pq-18"></div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 wow animated fadeInUp">
                    <div class="pq-fancy-box pq-style-1">
                        <div class="pq-fancy-box-info">
                            <h4 class="pq-fancy-box-title">Reliability</h4>
                            <p class="pq-fancy-box-description" style="text-align: justify;">Our rapid success owes much to our internal conduct and external partnerships. Core values of dependability, integrity, expertise, and empathy have propelled us since our inception. Our unwavering commitment to fulfilling promises has earned us an impeccable track record.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 wow animated fadeInUp">
                    <div class="pq-fancy-box pq-style-1">
                        <div class="pq-fancy-box-info">
                            <h4 class="pq-fancy-box-title">Sustainibility</h4>
                            <p class="pq-fancy-box-description" style="text-align: justify;">At Yaarvi, the principle of sustainability is woven into our core ethos. We hold profound reverence for nature and its resources, conscientiously manage scarcity, contribute to our community, and strive to leave a positive legacy for generations to come. These aspirations drive our practices and define Yaarvi's purpose.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 wow animated fadeInUp">
                    <div class="pq-fancy-box pq-style-1">
                        <div class="pq-fancy-box-info">
                            <h4 class="pq-fancy-box-title">Integrety</h4>
                            <p class="pq-fancy-box-description" style="text-align: justify;">Our unwavering honesty fuels our drive, sustained by the trust our customers bestow upon us. At the heart of our integrity lie our fervent dedication to innovation and the art of creation. Over the course of our 12+ year journey, we've remained steadfast in our commitment to delivering unwavering customer satisfaction.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 wow animated fadeInUp">
                    <div class="pq-fancy-box pq-style-1">
                        <div class="pq-fancy-box-info">
                            <h4 class="pq-fancy-box-title">Quality & Testing</h4>
                            <p class="pq-fancy-box-description" style="text-align: justify;">Our profound grasp of the pivotal role that top-tier product quality plays in market triumph has propelled us to invest in the industry's most rigorous quality and testing benchmarks.  From sourcing raw materials, through design, manufacturing, assembly, warehousing, and ultimately product shipping.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->

    <?php require_once("include_footer.php"); ?>

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Scrollbar -->
    <script src="js/jquery.mCustomScrollbar.min.js"></script>
    <!-- Custom -->
    <script src="js/custom.js"></script>
</body>
</html>