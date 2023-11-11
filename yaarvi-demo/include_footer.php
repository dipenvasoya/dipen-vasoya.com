<!-- Footer -->
    <footer id="pq-footer">
        <div class="pq-footer-style-1">
            <div class="pq-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">About Us</h4>
                                <div class="pq-footer-logo mt-3 mb-3">
                                    <img src="images/footer-logo.png" class="pq-footer-logo" alt="marblex-footer-logo">
                                </div>
                                <p style="text-align: justify;">
                                    <?php
                                        include "conn.php";
                                        $query = "select * from about";
                                        $res = mysqli_query($link, $query) or die ("not execute");
                                        while($row = mysqli_fetch_assoc($res)){ echo $row['about_us2']; }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6"></div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">our navigate</h4>
                                <div class="menu-navigate-menu-container">
                                    <ul id="menu-navigate-menu" class="menu">
                                        <li class="menu-item">
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="company-profile.php">Company Profile</a>
                                        </li>
                                        <!-- <li class="menu-item">
                                            <a href="company-history.php">History</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="core-values.php">Core Values</a>
                                        </li> -->
                                        <li class="menu-item">
                                            <a href="infrastructure.php">Infrastructure</a>
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
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-port-1">
                                <h4 class="footer-title">Get in Touch</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-contact">
                                        <?php
                                            include "conn.php";
                                            $query = "select * from contact";
                                            $res = mysqli_query($link, $query) or die ("not execute");
                                            while($row = mysqli_fetch_assoc($res)){
                                        ?>
                                            <li>
                                                <?php echo $row['contact_address'];?>
                                            </li>
                                            <li>
                                                <a href="tel:<?php echo $row['contact_number1'];?>">
                                                    <?php echo $row['contact_number1'];?>
                                                </a>
                                                <br>
                                                <a href="tel:<?php echo $row['contact_number2'];?>">
                                                    <?php echo $row['contact_number2'];?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:<?php echo $row['contact_email1'];?>">
                                                    <?php echo $row['contact_email1'];?>
                                                </a>
                                                <br>
                                                <a href="mailto:<?php echo $row['contact_email2'];?>">
                                                    <?php echo $row['contact_email2'];?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pq-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <span class="pq-copyright">&#169; <?php echo date('Y'); ?> Yaarvi. All Rights Reserved.</span>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <span class="pq-copyright">Developed &amp; Managed By - <a href="https://dipen-vasoya.com" target="_blank"> Dipen Vasoya </a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <!-- Back To Top -->
    <div id="back-to-top" class="active">
        <a class="top" id="top" href="#top">
            <i class="ion-ios-arrow-up"></i>
        </a>
    </div>
    <!-- Back To Top -->