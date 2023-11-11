<?php
include "conn.php";
$id=$_GET["product_id"];
mysqli_query($link,"delete from product where product_id='$id'");
?>
<script type="text/javascript">
  alert("Product Deleted Successfully");
    window.location="product.php";
</script>