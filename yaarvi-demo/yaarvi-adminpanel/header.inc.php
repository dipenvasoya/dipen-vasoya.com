<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
        <?php
            include 'conn.php';
			$res=mysqli_query($link,"select * from logo,favicon");
			while($row=mysqli_fetch_array($res)){
        ?>
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../work/favicon/<?php echo $row['favicon_image'];?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../logo/<?php echo $row['logo_image'];?>" alt="" height="35">
                    </span>
                </a>
            </div>
            <?php }?>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            
            <div class="dropdown d-inline-block">
            <?php
                include 'conn.php';
                $s=$_SESSION['user_admin'];
				$res=mysqli_query($link,"select * from admin where admin_email='$s'");
				while($row=mysqli_fetch_array($res))
				{
            ?>
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1"><b><?php echo $row["admin_email"];?></b></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <?php }?>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="auth-login.php">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout">Logout</span></a>
                </div>
            </div>
            
        </div>
    </div>
</header>