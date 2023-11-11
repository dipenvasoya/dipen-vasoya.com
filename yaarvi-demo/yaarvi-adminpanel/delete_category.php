<?php
include "conn.php";
$id=$_GET["category_id"];
mysqli_query($link,"delete from category where category_id='$id'");
?>
<script type="text/javascript">
  alert("Category Deleted Successfully");
    window.location="category.php";
</script>