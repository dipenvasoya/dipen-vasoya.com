<div class="container-fluid">
    <div class="row">
        <?php
			$res=mysqli_query($link,"select * from company");
			while($row=mysqli_fetch_array($res)){
        ?>
        <div class="col-sm-6">
            <script>
                document.write(new Date().getFullYear())
            </script> © <?php echo $row['company_name'];?>.
        </div>
        <?php }?>
        <div class="col-sm-6">
            <div class="text-sm-end d-none d-sm-block">
                Design & Develop by <a href="https://dipen-vasoya.com"> Dipen Vasoya</a>
            </div>
        </div>
    </div>
</div>