<?php

//Bring In the HTML Template For the Mass Mailer
//This is where massTemplate($email,$campaign) comes from
include "./templates/massTemplate.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./PHPMailer-master/src/PHPMailer.php";
require_once "./PHPMailer-master/src/Exception.php";

function autoMailer($recipient, $campaign)
{

    //PHPMailer Object
    $mail = new PHPMailer;

    //Mail Template

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
    $mail->Body = massTemplate($recipient, $campaign);
    $mail->AltBody = "This is the plain text version of the email content";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message to: " . $recipient . " has been sent successfully<br>";
    }
}

//Bring in the mailList

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <?php
    if (isset($_POST["secret"]) && $_POST["secret"] === "sdhrhfoiwerh38yuhin209q2u-9ji3j90ruj2j0u8j0iwroher09") {
        $mailList = explode(',', $_POST["list"]);
        ?>
        <script>
            (async function(){
            const campaign = await axios.post('https://freemassage.herokuapp.com/addcampaign', {
                title: '<?php echo $_POST["campaign"]; ?>'
            })

            const mailList = [];
            console.log(mailList)
            console.log(campaign)
            mailList.forEach(async (email,i)=> {
                await axios.post('https://freemassage.herokuapp.com/campaign', {
                    email,
                    campaign_id:campaign.id
                }).then(res=>console.log(res))
                .catch(res=>console.log(res))
            })
        })()
        </script>

    <?php
        print_r($mailList);
        foreach ($mailList as $recipient) {
            autoMailer($recipient, $_POST["campaign"]);
        }
    }
    ?>
    <form method="post">
        <input type="password" name="secret" placeholder="Your Super Secret" /><input name='campaign' type="text" placeholder="campaign"><input type="submit" /> <br />
        <textarea name="list" rows="25" cols="70" placeholder="example@gmail.com,example2@gmail.com"></textarea>
    </form>
</body>

</html>