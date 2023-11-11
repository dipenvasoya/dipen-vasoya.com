<?php
include "conn.php";
$id=$_GET["blog_id"];
mysqli_query($link,"delete from blog where blog_id='$id'");
?>
<script type="text/javascript">
  alert("Blog Deleted Successfully");
    window.location="newsblog.php";
</script>