<?php
  if (isset($_POST['email']))  {
  
    //Email information
    $admin_email = "info@webdevbuilder.tech";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    //send email
    mail($admin_email, "New Form Submission", $message . ' - ' . $phone, "From:" . $email);
    
    header('Location: https://webdevbuilder.tech/gr/success.html');
  }