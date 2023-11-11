<?php
include "conn.php";
$id=$_GET["subcat_id"];
mysqli_query($link,"delete from subcat where subcat_id='$id'");
?>
<script type="text/javascript">
  alert("Subcategory Deleted Successfully");
    window.location="subcategory.php";
</script>