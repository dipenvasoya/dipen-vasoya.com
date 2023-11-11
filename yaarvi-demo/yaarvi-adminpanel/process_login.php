<?php
    include "conn.php";
    if(isset($_POST['login']))
    {
        $l=mysqli_query($link,"select * from admin where admin_email='".addslashes($_POST['email'])."'and
        admin_pwd='".addslashes($_POST['pwd'])."'")
        or die(mysqli_error());

        //session
        $a=mysqli_num_rows($l);
        if($a>0)
        {
            session_start();
            $_SESSION['user_admin']=$_POST['email'];
            // header("location:index1.php");
            echo "<script>
                alert('Successfully Login');
                window.location.href = 'index.php'
            </script>";
        }
        else
        {
            //header("location:index.php");
            echo "<script>
                alert('Email or Password is incorrect please check again');
                window.location.href = 'auth-login.php'
            </script>";
        }
    }
?>