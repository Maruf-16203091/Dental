<?php  
   ini_set("sendmail_from", "sonoojaiswal@javatpoint.com");  
   $to = "crypticmaruf999@gmail.com";//change receiver address  
   $subject = "This is subject";  
   $message = "Your appointment date is 21th march.";  
   $header = "From:sonoojaiswal@javatpoint.com \r\n";  
  
   $result = mail ($to,$subject,$message,$header);  
  
   if( $result == true ){  
      echo "Message sent successfully...";  
   }else{  
      echo "Sorry, unable to send mail...";  
   }  
?>  