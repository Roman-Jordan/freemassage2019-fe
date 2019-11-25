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
    if (isset($_POST["secret"]) && $_POST["secret"] === "yoda") {
        $mailList = explode(',', $_POST["list"]);
        ?>
        <script>
            (async function(){
            const campaign = await axios.post('https://freemassage.herokuapp.com/addcampaign', {
                title: '<?php echo $_POST["campaign"]; ?>'
            })

            const mailList = <?php echo json_encode($mailList); ?>;
            console.log(mailList)
            console.log(campaign)
            mailList.forEach(async (email,i)=> {
                await axios.post('https://freemassage.herokuapp.com/campaign', {
                    email:mailList[i],
                    campaign_id:campaign.data[0].id
                }).then(res=>{
                    const form = new FormData();
                    form.set('secret','<?php echo $_POST['secret']; ?>')
                    form.set('email',mailList[i])
                    form.set('campaign',campaign.data[0].id)
                    axios.post('https://freemassage2019.com/mailer/sendMail.php',form)
                    .then(res=>console.log('response from mailer',res))
                    .catch(res=>console.log('response from mailer',res))
                })
                .catch(res=>console.log(res))
            })
        })()
        </script>
<?php
    }
?>
    <form method="post">
        <input type="password" name="secret" placeholder="Your Super Secret" /><input name='campaign' type="text" placeholder="campaign"><input type="submit" /> <br />
        <textarea name="list" rows="25" cols="70" placeholder="example@gmail.com,example2@gmail.com"></textarea>
    </form>
</body>
</html>