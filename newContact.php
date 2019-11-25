<?php
// Example  
// Array ( [CompanyName] => Alpha Cleaners [name] => Roman Jordan [tel] => 4242725742 [email] => rjordan1352@gmail.com [date] => [time] => [address] => 1714 NW 103rd Street [city] => Vancouver [state] => Washington [g-recaptcha-response] => 03AOLTBLRZfJbYnvg9J5dwRkJ68_Rm-HCa9Sm85JaZs8QaXpRbUUDiPc3Zp2J-LE6kxsDSB9uui33mJ-rdktNQlx7-5ebWitcCcxpaUqzJyD4_8mqhqX_-_FQ-hBcqlKnR98cJGt4jIrWXvZvKhspGYtcYEuVlZJuyCmnIrKnwKQqqFFToXqyUT6mnoZ-Fcu7UneDegWkJrUQtmBPQyt_8_gQcOPGxFW_NxV0-1LsJ5BcoqV5fCGHlzFj2id9t0f-ELOvBcSChY5atNEz5Z0hS3She3w2E0rq0l-v9vNBevY2W0Cd9eeuDhSv6AL6DMhmy1dV6ms3OYAQy2_6WqEHSiyhjE49Do7LqSIQWTpljtryC3d4wNqwrRC5TuSkC7jJ7nbR_62luDMwyB14TwocJgQZdcPqBY3EDzwCDC-AzyTKWKsAjTk_ZxTzpz0AtIIPwrqRg-7etF8kQ6H2IIgF0lwge-4CV3_JquGdVcUbxS3Oc8PrtwaDP_3BqKX-uBkOLpmKc7GHwvyHG )

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./mailer/PHPMailer-master/src/PHPMailer.php";
require_once "./mailer/PHPMailer-master/src/Exception.php";


if(isset($_POST)){
    //Check Recapcha
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
        // Google reCAPTCHA API secret key 
        $secretKey = '6LetccMUAAAAAK67ZyNakg67vgeyJD47pvdxMaZy'; 
         
        // Verify the reCAPTCHA response 
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
         
        // Decode json data 
        $responseData = json_decode($verifyResponse); 
         
        // If reCAPTCHA response is valid 
        if($responseData->success){ 
            $newContactMsg = ''; 
            // Posted form data 
            foreach($_POST as $req){
                $newContactMsg .= '<p>'.$req.'</p>';
            }
            
            autoMailer($_POST['email'],$newContactMsg);
            toHomeBase($newContactMsg);
            
            echo  'Success Route';
        }else{ 
            echo  'Robot verification failed, please try again.'; 
        } 
    }else{ 
        echo  'Please check on the reCAPTCHA box.'; 
    }
}else{
    return 'HUMM';
}



function autoMailer($recipient,$newContactMsg){
    
    //PHPMailer Object
    $mail = new PHPMailer;
    
    //Mail Template
    $template = file_get_contents("./templates/confirmation.php");
    
    //From email address and name
    $mail->From = "info@FreeMassage2019.com";
    $mail->FromName = "Jeremy A.";
    
    //To address and name
    $mail->addAddress($recipient, "Thank You From All of Us");
  

    //Address to which recipient will reply
    $mail->addReplyTo("info@freemassage2019.com", "Reply");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    
    //Custom Headers for google
    $mail->addCustomHeader("List-Unsubscribe",'<info@freemassage2019.com.com>, <http://freemassage2019.com/?email='.$recipient.'>');
    $mail->addCustomHeader("List-Unsubscribe-Post",'List-Unsubscribe=One-Click');
  
    $mail->Subject = "Employee Relaxation Day";
    $mail->Body = $template;
    $mail->AltBody = "This is the plain text version of the email content";
    
    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        echo "Message to: ".$recipient." has been sent successfully<br>";
    }
}


function toHomeBase($newContactMsg){
    
    //PHPMailer Object
    $mail = new PHPMailer;
    
    //From email address and name
    $mail->From = "info@FreeMassage2019.com";
    $mail->FromName = "Jeremy A.";
    
    //Address to which recipient will reply
    $mail->addReplyTo("info@freemassage2019.com", "Reply");
    
    //Recipient 
    $mail->addAddress("info@yesamerica.com", "Thank You From All of Us");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    
    //Custom Headers for google
    $mail->addCustomHeader("List-Unsubscribe",'<info@freemassage2019.com.com>, <http://freemassage2019.com/?email=info@yesamerica.com>');
    $mail->addCustomHeader("List-Unsubscribe-Post",'List-Unsubscribe=One-Click');
  
    $mail->Subject = "Employee Relaxation Day";
    $mail->Body = $newContactMsg;
    $mail->AltBody = "This is the plain text version of the email content";
    
    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        echo "Message to: Home Base, has been sent successfully<br>";
    }
}



