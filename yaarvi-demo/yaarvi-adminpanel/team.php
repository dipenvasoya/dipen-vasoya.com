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
        <title>Team | <?php echo $row['company_name'];?></title>
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
                                    <h4 class="mb-sm-0 font-size-18">Team</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Team</li>
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
                                        <h4 class="card-title">Add Team Member</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Member Name :</label>
                                                        <input name="t_name" type="text" class="form-control" placeholder="Enter member name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Designation :</label>
                                                        <input name="t_designation" type="text" class="form-control" placeholder="Enter designation">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Image :</label>
                                                        <input class="form-control" name="team_img" type="file" id="formFile" accept="image/*">
                                                    </div>
                                                </div>
                                                
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" name="add_team" class="btn btn-primary waves-effect waves-light">Add Member <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            include "conn.php";
                            if(isset($_POST["add_team"])){
                                $t_name =$_POST["t_name"];
                                $designation =$_POST["t_designation"];
                    
                                $v1=rand(1,9999);
                                
                                $fnm = $_FILES["team_img"]["name"];
                                $dst = "../team/" . $v1. " " . $fnm;
                                $dst1 =  $v1 ." ". $fnm;
                                move_uploaded_file($_FILES["team_img"]["tmp_name"], $dst);

                                $query = "insert into team (team_id,team_name,team_designation,team_image) 
                                values ('','".$t_name."','".$designation."','".$dst1."')";
                                mysqli_query($link,$query);
                                echo "<script>
                                    alert('Successfully Insert');
                                    window.location.href = 'team.php'
                                </script>";
                            }
                        ?>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Team List</h4><br/>
                                        <table id="datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
				                                $query = "select * from team";
				                                $res = mysqli_query($link, $query) or die ("not execute");
					                            while($row = mysqli_fetch_assoc($res)){
				                            ?>
                                            <tr>
                                                <td><?php echo $row['team_id'];?></td>
                                                <td><?php echo $row['team_name'];?></td>
                                                <td><?php echo $row['team_designation'];?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../team/<?php echo $row['team_image'];?>" class="img-fluid rounded mr-3" height="100px" width="100px">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <?php echo '<a href="team.php?team_id='.$row['team_id'].'#upd" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>';?>
                                                        <?php echo '<a href="delete_team.php?team_id='.$row['team_id'].'" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>';?>
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
                        <!-- end row -->
                        <?php 
                            include "conn.php";
                            $i =(isset($_GET["team_id"]) ? $_GET["team_id"] : '');
                            if($i==true){
                        ?>
                        <div class="row" id="upd">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Team Member</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <?php
                                                    include "conn.php";
		    		                                $query = "select * from team where team_id='$i'";
	    			                                $res = mysqli_query($link, $query) or die ("not execute");
    					                            while($row = mysqli_fetch_assoc($res)){
				                                ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Member Name :</label>
                                                        <?php if(isset($row["team_id"])){?>
								                        <input type="hidden" name="team_id" value="<?php echo $row['team_id'];?>" />
									                    <?php }?>
                                                        <input name="t_name" type="text" value="<?php echo $row["team_name"]; ?>" class="form-control" placeholder="Enter member name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Designation :</label>
                                                        <input name="t_designation" type="text" value="<?php echo $row["team_designation"]; ?>" class="form-control" placeholder="Enter designation">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Image :</label>
                                                        <input class="form-control" name="team_img" type="file" id="formFile" accept="image/*">
                                                        <img src="../team/<?php echo $row["team_image"]; ?>" height="100px" width="100px">
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" name="update_team" class="btn btn-primary waves-effect waves-light">Update Member <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                            include "conn.php";
                            if (isset($_POST["update_team"])) {
                               
                                $t_name =$_POST["t_name"];
                                $designation =$_POST["t_designation"];
                                
                                $fnm = $_FILES["team_img"]["name"];
                                if ($fnm != "") {
                                    $v1 = rand(1, 9999);
                                    
                                    $dst = "../team/" . $v1. " " . $fnm;
                                    $dst1 = $v1. " " . $fnm;
                                    move_uploaded_file($_FILES["team_img"]["tmp_name"], $dst);
                                
                                    $query="UPDATE team set team_name='".$t_name."',team_designation='".$designation."',
                                    team_image='".$dst1."' WHERE team_id ='".$_POST['team_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                                }
                                if ($fnm == "" )
                                {
                                    $query="UPDATE team set team_name='".$t_name."',team_designation='".$designation."'
                                    WHERE team_id ='".$_POST['team_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                                }
                                echo "<script>
                                    alert('Successfully Updated');
                                    window.location.href = 'team.php'
                                </script>";
                            }
                        ?>
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