<?php
    $link=mysqli_connect("localhost","root","") or die(mysqli_error("not connect"));
    mysqli_select_db($link,"yaarvi_db")or die(mysqli_error($link));
?>