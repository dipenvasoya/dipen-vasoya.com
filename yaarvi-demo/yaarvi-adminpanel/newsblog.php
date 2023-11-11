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

    
<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 12:14:33 GMT -->
<head>
        
        <meta charset="utf-8" />
        <?php
			$res=mysqli_query($link,"select * from company");
			while($row=mysqli_fetch_array($res)){
        ?>
        <title>News & Blog | <?php echo $row['company_name'];?></title>
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
                                    <h4 class="mb-sm-0 font-size-18">News & Blog</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">News & Blog</li>
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
                                        <h4 class="card-title">Add News & Blog</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Blog Title :</label>
                                                        <input name="b_title" type="text" class="form-control" placeholder="Enter blog title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Blog Image :</label>
                                                        <input name="blog_img" class="form-control" type="file" id="formFile" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Description :</label>
                                                        <script src="ckeditor/ckeditor.js"></script>
                                                        <textarea id="editor1" name="description" class="form-control" rows="3" required></textarea>
                                                        <script>
                                                            CKEDITOR.replace( 'editor1' );
                                                        </script>
                                                    </div>
                                                </div>
        
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button name="add_blog" type="submit" class="btn btn-primary waves-effect waves-light">Add News & Blog <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            include "conn.php";
                            if(isset($_POST["add_blog"])){
                                $b_title =$_POST["b_title"];
                                $description =$_POST["description"];
                    
                                $v1=rand(1,9999);

                                $fnm = $_FILES["blog_img"]["name"];
                                $dst = "../blog/" . $v1. " " . $fnm;
                                $dst1 =  $v1 ." ". $fnm;
                                move_uploaded_file($_FILES["blog_img"]["tmp_name"], $dst);

                                $query = "insert into blog (blog_id,blog_title,blog_image,blog_description) 
                                values ('','".$b_title."','".$dst1."','".$description."')";
                                mysqli_query($link,$query);
                                echo "<script>
                                    alert('Successfully Insert');
                                    window.location.href = 'newsblog.php'
                                </script>";
                            }
                        ?>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">News & Blog List</h4><br/>
                                        <table id="datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Blog Title</th>
                                                <th>Blog Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
				                                $query = "select * from blog";
				                                $res = mysqli_query($link, $query) or die ("not execute");
					                            while($row = mysqli_fetch_assoc($res)){
				                            ?>
                                            <tr>
                                                <td><?php echo $row['blog_id'];?></td>
                                                <td><?php echo $row['blog_title'];?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../blog/<?php echo $row['blog_image'];?>" class="img-fluid rounded mr-3" height="100px" width="100px">
                                                    </div>
                                                </td>
                                                <td><textarea id="editor1" name="" rows="3"><?php echo $row['blog_description'];?></textarea></td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <?php echo '<a href="newsblog.php?blog_id='.$row['blog_id'].'#upd" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>';?>
                                                        <?php echo '<a href="delete_blog.php?blog_id='.$row['blog_id'].'" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>';?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <?php 
                            include "conn.php";
                            $i =(isset($_GET["blog_id"]) ? $_GET["blog_id"] : '');
                            if($i==true){
                        ?>
                        <div class="row" id="upd">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update News & Blog</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <?php
                                                    include "conn.php";
		    		                                $query = "select * from blog where blog_id='$i'";
	    			                                $res = mysqli_query($link, $query) or die ("not execute");
    					                            while($row = mysqli_fetch_assoc($res)){
				                                ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Blog Title :</label>
                                                        <?php if(isset($row["blog_id"])){?>
								                            <input type="hidden" name="blog_id" value="<?php echo $row['blog_id']; ?>" />
									                    <?php }?>
                                                        <input name="b_title" type="text" value="<?php echo $row['blog_title']; ?>" class="form-control" placeholder="Enter blog title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Blog Image :</label>
                                                        <input name="blog_img" class="form-control" type="file" id="formFile" accept="image/*">
                                                        <img src="../blog/<?php echo $row["blog_image"]; ?>" height="100px" width="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Description :</label>
                                                        <script src="ckeditor/ckeditor.js"></script>
                                                        <textarea id="editor2" name="description" class="form-control" rows="3" required><?php echo $row['blog_description']; ?></textarea>
                                                        <script>
                                                            CKEDITOR.replace( 'editor2' );
                                                        </script>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button name="update_blog" type="submit" class="btn btn-primary waves-effect waves-light">Update News & Blog <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            include "conn.php";
                            if (isset($_POST["update_blog"])) {
                                
                                $b_title =$_POST["b_title"];
                                $description =$_POST["description"];
                                
                                $fnm = $_FILES["blog_img"]["name"];
                                if ($fnm != "") {
                                    $v1 = rand(1, 9999);
                                    
                                    $dst = "../blog/" . $v1. " " . $fnm;
                                    $dst1 = $v1. " " . $fnm;
                                    move_uploaded_file($_FILES["blog_img"]["tmp_name"], $dst);
                                
                                    $query="UPDATE blog set blog_title='".$b_title."',
                                    blog_image='".$dst1."',blog_description='".$description."' WHERE blog_id ='".$_POST['blog_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                                }
                                if ($fnm == "" )
                                {
                                    $query="UPDATE blog set blog_title='".$b_title."',
                                    blog_description='".$description."' WHERE blog_id ='".$_POST['blog_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                                }
                                echo "<script>
                                    alert('Successfully Updated');
                                    window.location.href = 'newsblog.php'
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


<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 12:15:13 GMT -->
</html>