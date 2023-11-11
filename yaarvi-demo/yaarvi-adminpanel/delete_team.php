<?php
include "conn.php";
$id=$_GET["team_id"];
mysqli_query($link,"delete from team where team_id='$id'");
?>
<script type="text/javascript">
  alert("Team Member Deleted Successfully");
    window.location="team.php";
</script>