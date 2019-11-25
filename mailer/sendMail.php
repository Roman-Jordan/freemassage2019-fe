<?php

header("HTTP/1.1 200 OK");
//Bring In the HTML Template For the Mass Mailer
//This is where massTemplate($email,$campaign) comes from
include "./templates/massTemplate.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./mailer/PHPMailer-master/src/PHPMailer.php";
require_once "./mailer/PHPMailer-master/src/Exception.php";

header_remove();
    // set the actual code
http_response_code(200);
    // set the header to make sure cache is forced
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
header('Status: 200 ok');
header('Content-Type: application/json');

function autoMailer($recipient, $campaignId)
{
    //PHPMailer Object
    $mail = new PHPMailer;

    //From email address and name
    $mail->From = "info@FreeMassage2019.com";
    $mail->FromName = "Jeremy A.";

    //To address and name
    $mail->addAddress($recipient, "One who deserves a massage");

    //Address to which recipient will reply
    $mail->addReplyTo("info@freemassage2019.com", "Reply");

    //Send HTML or Plain Text email
    $mail->isHTML(true);

    //Custom Headers for google
    $mail->addCustomHeader("List-Unsubscribe", '<info@freemassage2019.com.com>, <http://freemassage2019.com/?email=' . $recipient . '>');
    $mail->addCustomHeader("List-Unsubscribe-Post", 'List-Unsubscribe=One-Click');

    $mail->Subject = "Employee Relaxation Day";
    $mail->Body = massTemplate($recipient, $campaignId);
    $mail->AltBody = "This is the plain text version of the email content";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message to: " . $recipient . " has been sent successfully<br>";
    }
}


if (isset($_POST["secret"]) && $_POST["secret"] === "sdhrhfoiwerh38yuhin209q2u-9ji3j90ruj2j0u8j0iwroher09") {
    
    //$mailList = explode(',', $_POST["list"]);
    //autoMailer($recipient, $_POST["campaign"]);
}

echo json_encode(array(
    'status' => 'googd', // success or not?
    'message' => 'yo'
    ));