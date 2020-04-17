<?php

    
    
      //define variables and set to empty values 
       
        $name = $email = $phone =  "";



    $to = 'mytweet.rk@gmail.com';
    $subject = 'Enquiry Form Submit';
  
   
   
    $message = "From : "."  \r\n" ."  \r\n" . "Name : " . $_POST["name"]."  \r\n" . "Email : ". $_POST["email"]."  \r\n" . "Contact Number :  ". $_POST["contact_number"] ."\r\n";

    if (mail($to, $subject, $message)){       
        $name = $email = $phone =  '';
        header("Location: after_form.html");
       
    }
    


  
    ?>