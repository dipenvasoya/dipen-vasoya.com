<?php
include "conn.php";
$id=$_GET["admin_id"];
mysqli_query($link,"delete from admin where admin_id='$id' AND status != '1'");
?>
<script type="text/javascript">
  alert("Admin User Deleted Successfully");
    window.location="index.php";
</script>