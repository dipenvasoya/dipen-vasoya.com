<body>

    <!-- Loading -->
    <div id="pq-loading">
        <div id="pq-loading-center">
            <img src="images/logo_yaarvi.png" alt="Loading">
        </div>
    </div>
    <!-- Loading -->

    <!-- Header -->
    <!-- <div class="pq-background-overlay"></div> -->

    <header id="pq-header" class="pq-header-style-1  pq-has-sticky">
        <div class="pq-header-diff-block">
            <div class="row g-0">
                <div class="col-lg-12">
                    <div class="pq-top-header  top-style-1">
                        <div class="container-fluid p-0">
                            <div class="row flex-row-reverse">
                                <div class="col-md-6 text-right">
                                    <div class="pq-top-right text-right ">
                                        <div class="pq-header-social">
                                            <ul>
                                                <?php
                                                    include "conn.php";
		    		                                $query = "select * from social";
	    			                                $res = mysqli_query($link, $query) or die ("not execute");
    					                            while($row = mysqli_fetch_assoc($res)){
				                                ?>
                                                <li><a href="<?php echo $row['social_twitter'];?>"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="<?php echo $row['social_instagram'];?>"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="<?php echo $row['social_linkedin'];?>"><i class="fab fa-linkedin"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6   ">
                                    <div class="pq-header-contact ">
                                        <ul>
                                            <li>
                                                <a href="tel:+1800001658"><i class="fas fa-phone"></i>
                                                    <span> +1800-001-658</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:Info@yaarvi.Com"><i
                                                        class="fas fa-envelope"></i><span>Info@yaarvi.Com</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pq-bottom-header">
                        <div class="row no-gutters">
                            <div class="col-lg-12">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <a class="navbar-brand" href="index.html">
                                        <img class="img-fluid logo"
                                            src="images/logo_yaarvi.png"
                                            alt="marblex">
                                    </a>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div id="pq-menu-contain" class="pq-menu-contain">
                                            <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                                <li class="menu-item">
                                                    <a href="index.php">Home</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="about-us.php">About Us</a><i class="fa fa-chevron-down pq-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="company-profile.php">Company Profile</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="company-history.php">History</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="core-values.php">Core Values</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="infrastructure.php">Infrastructure</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="group-of-companies.php">Group Of Companies</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="products.php">Products</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="network.php">Network</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="contact-us.php">Contact Us</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->