<?php
    include 'conn.php';
    session_start();
    if(!isset($_SESSION["user_admin"])){
    ?>
    <script type="text/javascript">
        window.location="auth-login.php";
    </script>    
<?php }?>

<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <?php
			$res=mysqli_query($link,"select * from company");
			while($row=mysqli_fetch_array($res)){
        ?>
        <title>Contact | <?php echo $row['company_name'];?></title>
        <?php }?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <?php
			$res=mysqli_query($link,"select * from favicon ");
			while($row=mysqli_fetch_array($res)){
        ?>
        <link rel="shortcut icon" href="../favicon/<?php echo $row['favicon_image'];?>">
        <?php }?>

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
       
        <?php include 'header.inc.php';?>
        <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php include 'menu.inc.php';?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Contact</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Contact</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Contact</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <?php
                                                    include "conn.php";
				                                    $query = "select * from contact";
				                                    $res = mysqli_query($link, $query) or die ("not execute");
					                                while($row = mysqli_fetch_assoc($res)){
				                                ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Whatsapp Number :</label>
                                                            <?php if(isset($row["contact_id"])){?>
								                            <input type="hidden" name="contact_id" value="<?php echo $row['contact_id'];?>" />
									                        <?php }?>
                                                        <input name="whatsapp" class="form-control" type="tel" value="<?php echo $row['contact_whatsapp'];?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Mobile Number 1 :</label>
                                                        <input name="mob_num1" class="form-control" type="tel" value="<?php echo $row['contact_number1'];?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Mobile Number 2 :</label>
                                                        <input name="mob_num2" class="form-control" type="tel" value="<?php echo $row['contact_number2'];?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Email 1 :</label>
                                                        <input name="email1" class="form-control" type="email" value="<?php echo $row['contact_email1'];?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Email 2 :</label>
                                                        <input name="email2" class="form-control" type="email" value="<?php echo $row['contact_email2'];?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Address :</label>
                                                        <script src="ckeditor/ckeditor.js"></script>
                                                        <textarea id="editor1" name="address" class="form-control" rows="3" required><?php echo $row['contact_address'];?></textarea>
                                                        <script>
                                                            CKEDITOR.replace( 'editor1' );
                                                        </script>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button name="update_contact" type="submit" class="btn btn-primary waves-effect waves-light">Update <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php
                                include "conn.php";
                                if (isset($_POST["update_contact"])) {
                
				                    $whatsapp=$_POST['whatsapp'];
				                    $mob1=$_POST['mob_num1'];
				                    $mob2=$_POST['mob_num2'];
				                    $email1=$_POST['email1'];
				                    $email2=$_POST['email2'];
				                    $address=$_POST['address'];
				
                                    $query="UPDATE contact set contact_whatsapp='".$whatsapp."',contact_number1='".$mob1."',
                                    contact_number2='".$mob2."',contact_email1='".$email1."',contact_email2='".$email2."',
                                    contact_address='".$address."' WHERE contact_id ='".$_POST['contact_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                
                                    echo "<script>
                                        alert('Successfully Updated');
                                        window.location.href = 'contact.php'
                                    </script>";
                                }
                            ?>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <?php include 'footer.inc.php';?>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

</html>