<?php
include "conn.php";
$id=$_GET["slider_id"];
mysqli_query($link,"delete from slider where slider_id='$id'");
?>
<script type="text/javascript">
  alert("slider Deleted Successfully");
    window.location="slider.php";
</script>