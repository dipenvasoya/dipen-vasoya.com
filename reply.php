<?php

if ($_SERVER['REQUEST_METHOD']) {
   
    $uemail = $_REQUEST['email'];
    $cp = $_REQUEST['name'];
          

 //Email information
  $admin_email = 'info@dipen-vasoya.com';
  $mail = "info@dipen-vasoya.com";
  $subject = "Dipen Vasoya";
  
  $message = "Contact Person  : " . $_POST['name'] . "\n";
  
  $message .= "Email  : " . $_POST['email'] . "\n";
  $message .= "Phone  : " . $_POST['contact'] . "\n";
  
  $message .= "Message  : " . $_POST['message'] . "\n";
  
  $headers  = 'MIME-Version: 1.0' . "\\r\
";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\\r\
";
  //send email
  mail($admin_email, "$subject", $message, "From:" . $mail);
  
  //Email information
  $admin_email = "$uemail";
  $mail = "info@dipen-vasoya.com";
  $subject = "Thank you for Inquire.";
  $comment ="Hello ". strip_tags($cp) .",". "\r\n". "\r\n".
            "Thank you for visit my Website.
            
            I will Contact You soon.";
  $headers  = 'MIME-Version: 1.0' . "\\r\
";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\\r\
";
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $mail);
            
                echo "<script>alert('Send Successfully, Chek Your Email');window.location.href='contact.php'</script>";
            } else {
                //In case any error occured 
               echo "<script>alert('Form Not Completed ');window.location.href='contact.php'</script>";
            }
        
        //Closing the database connection 
        mysqli_close($link);
    ?>