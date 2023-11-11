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
        <title>Product | <?php echo $row['company_name'];?></title>
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
                                    <h4 class="mb-sm-0 font-size-18">Product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Product</li>
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
                                        <h4 class="card-title">Add Product</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Category Name :</label>
                                                        <select name="cat_name" class="form-select" required>
                                                            <option>Category</option>
                                                                <?php
                                                                    include "conn.php";  // Using database connection file here
                                                                    $query="select * From category";
                                                                    $res = mysqli_query($link, $query);  // Use select query here 

                                                                    while($row = mysqli_fetch_array($res))
                                                                    {
                                                                        echo "<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";  // displaying data in option menu
                                                                    }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Product Name :</label>
                                                        <input name="pro_name" type="text" class="form-control" placeholder="Enter product name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Product Image :</label>
                                                        <input name="product_img" class="form-control" type="file" id="formFile" accept="image/*" required="">
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
                                                <button name="product_add" type="submit" class="btn btn-primary waves-effect waves-light">Add Product <i class="fas fa-paper-plane bx-spin"></i></button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset <i class="fas fa-plus bx-spin"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            include "conn.php";
                            if (isset($_POST["product_add"])) {
                                $cat_name=$_POST['cat_name'];
                                $pro_name=$_POST['pro_name'];
                                $description=$_POST['description'];

                                if(isset($_FILES['product_img']))
                                {
	                                $max_size = 600; //max image size in Pixels
	                                $destination_folder = '../product/';
	                                $watermark_png_file = 'watermark.png'; //watermark png file
	                                // $username = $_SESSION['login_npi_user_admin'];
	
                                	$rand = rand(1,99999);
	                                $image_name = $_FILES['product_img']['name']; //file name
	                                $img1 = 'product/'.$rand.'-'.$image_name ;
	                                $img = $rand.'-'.$image_name ;
	
	                                $image_size = $_FILES['product_img']['size']; //file size
	                                $image_temp = $_FILES['product_img']['tmp_name']; //file temp
	                                $image_type = $_FILES['product_img']['type']; //file type

	                                switch(strtolower($image_type))
                                    { //determine uploaded image type 
			                            //Create new image from file
			                            case 'image/png': 
				                            $image_resource =  imagecreatefrompng($image_temp);
				                            break;
			                            case 'image/gif':
				                            $image_resource =  imagecreatefromgif($image_temp);
				                            break;          
			                            case 'image/jpeg': 
				                            $image_resource = imagecreatefromjpeg($image_temp);
				                            break;
                                        case 'image/pjpeg':
                                            $image_resource = imagecreatefrompjpeg($image_temp);
				                            break;
			                            default:
				                            $image_resource = false;
		                            }
	
	                                if($image_resource){
		                                //Copy and resize part of an image with resampling
		                                list($img_width, $img_height) = getimagesize($image_temp);
                                        
	                                    //Construct a proportional size of new image
		                                $image_scale = min($max_size / $img_width, $max_size / $img_height); 
		                                $new_image_width = ceil($image_scale * $img_width);
		                                $new_image_height = ceil($image_scale * $img_height);
		                                $new_canvas = imagecreatetruecolor($new_image_width , $new_image_height);

		                                if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		                                {
			
			                                if(!is_dir($destination_folder)){ 
				                                mkdir($destination_folder);//create dir if it doesn't exist
			                                }
			
			                                $watermark_left = ($new_image_width/2)-(1067/2); //watermark left
			                                $watermark_bottom = ($new_image_height/2)-(800/2); //watermark bottom

			                                $watermark = imagecreatefrompng($watermark_png_file); //watermark image
			                                imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 1067, 800);
			
			                                //Or Save image to the folder
			                                imagejpeg($new_canvas, $destination_folder.'/'.$img , 100);
			
			                                move_uploaded_file($_FILES["product_img"]["tmp_name"], $img1);
                                            $query = "insert into product (product_id,category_name,product_name,product_image,product_description) 
                                            values ('','".$cat_name."','".$pro_name."','".$img."','".$description."')";
                                            mysqli_query($link, $query) or die(mysqli_error($link));
			                            }
		 
                        ?>
                        <script type="text/javascript">
                            alert("Product Inserted Successfully");
                        </script>
                        <?php
                                    }
		                        }
		                    }
                        ?>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Product List</h4><br/>
                                        <table id="datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Product Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
				                                $query = "select * from product p, category c where p.category_name=c.category_id";
				                                $res = mysqli_query($link, $query) or die ("not execute");
					                            while($row = mysqli_fetch_assoc($res)){
				                            ?>
                                            <tr>
                                                <td><?php echo $row["product_id"];?></td>
                                                <td><?php echo $row["product_name"];?></td>
                                                <td><?php echo $row["category_name"];?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../product/<?php echo $row['product_image'];?>" class="img-fluid rounded mr-3" height="100px" width="100px">
                                                    </div>
                                                </td>
                                                <td><textarea id="editor1" name="" rows="3"><?php echo $row['product_description'];?></textarea></td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <?php echo '<a href="product.php?product_id='.$row['product_id'].'#upd" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>';?>
                                                        <?php echo '<a href="delete_product.php?product_id='.$row['product_id'].'" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>';?>
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

                        <!-- UPDATE RECORD -->
                        <?php 
                            include "conn.php";
                            $i =(isset($_GET["product_id"]) ? $_GET["product_id"] : '');
                            if($i==true){
                        ?>
                        <div class="row" id="upd">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Product</h4><br/>
                                        <form method="post" enctype="multipart/form-data" action="">
                                            <div class="row">
                                            <?php
                                                include "conn.php";
		    		                            $query = "select * from product p,category c where p.product_id='$i'";
	    			                            $res = mysqli_query($link, $query) or die ("not execute");
    					                        while($row = mysqli_fetch_assoc($res)){
				                            ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Category Name :</label>
                                                        <?php if(isset($row["product_id"])){
								                        ?>
								                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
									                <?php }
                                                        $query1 = "select * from product p,category c where p.category_name=c.category_id and p.product_id='$i'";
	    			                                    $res1 = mysqli_query($link, $query1) or die ("not execute");
    					                                while($rac = mysqli_fetch_assoc($res1)){?>
                                                        <select name="cat_name" class="form-select">
                                                            <option value="<?php echo $rac['category_id'];?>" selected><?php echo $rac['category_name'];?></option>
                                                            <?php
                                                                }
                                                                include "conn.php";  // Using database connection file here
                                                                $query="select * From category ";
                                                                $res = mysqli_query($link, $query);  // Use select query here 

                                                                while($row1 = mysqli_fetch_array($res))
                                                                {
                                                                    echo "<option value='". $row1['category_id'] ."'>" .$row1['category_name'] ."</option>";  // displaying data in option menu
                                                                }	
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Product Name :</label>
                                                        <input name="pro_name" type="text" value="<?php echo $row['product_name'];?>" class="form-control" placeholder="Enter product name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                        <label for="formFile">Product Image :</label>
                                                        <input name="product_img" class="form-control" type="file" id="formFile" accept="image/*">
                                                        <img src="../product/<?php echo $row["product_image"]; ?>" height="100px" width="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label>Description :</label>
                                                        <script src="ckeditor/ckeditor.js"></script>
                                                        <textarea id="editor2" name="description" class="form-control" rows="3" required><?php echo $row['product_description'];?></textarea>
                                                        <script>
                                                            CKEDITOR.replace( 'editor2' );
                                                        </script>
                                                    </div>
                                                </div>
                                            <?php }?>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button name="product_update" type="submit" class="btn btn-primary waves-effect waves-light">Update Product <i class="fas fa-paper-plane bx-spin"></i></button>
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
                            if (isset($_POST["product_update"])) {
                                $cat_name=$_POST['cat_name'];
                                $pro_name=$_POST['pro_name'];
                                $description=$_POST['description'];

                                if(isset($_FILES['product_img']))
                                {
	                                $max_size = 600; //max image size in Pixels
	                                $destination_folder = '../product/';
	                                $watermark_png_file = 'watermark.png'; //watermark png file
	                                // $username = $_SESSION['login_npi_user_admin'];
	
                                	$rand = rand(1,99999);
	                                $image_name = $_FILES['product_img']['name']; //file name
	                                $img1 = 'product/'.$rand.'-'.$image_name ;
	                                $img = $rand.'-'.$image_name ;
	
	                                $image_size = $_FILES['product_img']['size']; //file size
	                                $image_temp = $_FILES['product_img']['tmp_name']; //file temp
	                                $image_type = $_FILES['product_img']['type']; //file type

	                                switch(strtolower($image_type))
                                    { //determine uploaded image type 
			                            //Create new image from file
			                            case 'image/png': 
				                            $image_resource =  imagecreatefrompng($image_temp);
				                            break;
			                            case 'image/gif':
				                            $image_resource =  imagecreatefromgif($image_temp);
				                            break;          
			                            case 'image/jpeg': 
				                            $image_resource = imagecreatefromjpeg($image_temp);
				                            break;
                                        case 'image/pjpeg':
                                            $image_resource = imagecreatefrompjpeg($image_temp);
				                            break;
			                            default:
				                            $image_resource = false;
		                            }
	
	                                if($image_resource){
		                                //Copy and resize part of an image with resampling
		                                list($img_width, $img_height) = getimagesize($image_temp);
                                        
	                                    //Construct a proportional size of new image
		                                $image_scale = min($max_size / $img_width, $max_size / $img_height); 
		                                $new_image_width = ceil($image_scale * $img_width);
		                                $new_image_height = ceil($image_scale * $img_height);
		                                $new_canvas = imagecreatetruecolor($new_image_width , $new_image_height);

		                                if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		                                {
			
			                                if(!is_dir($destination_folder)){ 
				                                mkdir($destination_folder);//create dir if it doesn't exist
			                                }
			
                                            $watermark_left = ($new_image_width/2)-(1067/2); //watermark left
			                                $watermark_bottom = ($new_image_height/2)-(800/2); //watermark bottom

			                                $watermark = imagecreatefrompng($watermark_png_file); //watermark image
			                                imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 1067, 800);
			
			                                //Or Save image to the folder
			                                imagejpeg($new_canvas, $destination_folder.'/'.$img , 100);
                                            
			                                move_uploaded_file($_FILES["product_img"]["tmp_name"], $img1);
                                            $query="UPDATE product set category_name='".$cat_name."',product_name='".$pro_name."',
                                            product_image='".$img."',product_description='".$description."' WHERE product_id ='".$_POST['product_id']."'";
                                            mysqli_query($link, $query) or die(mysqli_error($link));
			                            }
                                    }
		                        }
                                if ($fnm == "" )
                                {
                                    $query="UPDATE product set category_name='".$cat_name."',product_name='".$pro_name."',
                                    product_description='".$description."' WHERE product_id ='".$_POST['product_id']."'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));
                                }
                                echo "<script>
                                    alert('Product Updated Successfully');
                                    window.location.href = 'product.php'
                                </script>";
		                    }
                        ?>
                        <!-- UPDATE RECORED END -->
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