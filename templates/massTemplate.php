
<?php
function massTemplate($email,$campaign){

return '
<table border="0" width="100%" bgcolor="#f5f7f8">
    <tr padding="10px">
        <td><img width="200px" src="https://www.freemassage2019.com/img/logo.png"></td>
        <td align="right" width="50%">
            <br>Jeremy Archeleta: (415) 634-9942
        </td>
    </tr>
    <tr>
        <td style="height:150px" colspan="2" bgcolor="#1976d2" align="center">
            <h1 style="color: #fff; font-family: Arial, Helvetica, sans-serif;">Book a free in-office massage day for your staff!</h1>
            <p><a href="https://www.freemassage2019.com"><img width="150px" src="https://www.freemassage2019.com/img/book.png?email='.$email.'&camp='.$campaign.'" border="0"></a></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 20px; background: #fff;">
            <h1>Why?</h1>
            <ul>
                    <li>Because you’re a cool boss!</li>
                    <li>Fun office activity.</li>
                    <li>Relieves back pain.</li>
                    <li>Happy employees = Higher productivity.</li>
                    <li>It\'s FREE!!!</li>
            </ul>   
            <h2>What?</h2>

            <p>15-min chair massages by a registered therapist from a local wellness center in your area.</p>

            <h2>How is it Free?</h2>

            <p>We want to promote our system where you can book these events at any time and also our wellness partners in your area. If you would like to see them in the future great! If not, no harm no foul and everyone gets a free massage!</p>

            <p>No hard selling, no obligation. We will simply leave behind our contact information, promise!</p>

            <p>Ready to book an event? Simply put down some basic information and one of our representatives will contact you.</p>
        </td>
    </tr>
    <tr>
        <td padding="5px" style="background: #e20087; color:#fff; vertical-align: middle; font-size: 30;; font-family: Arial, Helvetica, sans-serif;" colspan="2" align="center">
            READY TO BOOK?
            <br>Fill out some basic info below or go to <a href="https://www.freemassage2019.com" style="color:#fff">www.FreeMassage2019.com</a> and we\'ll get you set up!
        </td>
    </tr>
    <tr>
        <td style="background: #fff; padding: 20px;" colspan="2">
                <h2>Contact Information:</h2>

                Your Name:
                <br>Company Name:
                <br>Contact Number
                <br>Tentative Dates:
                <br>Time:
                <br>Number of Staff:
                <br>Address:
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
                You can also sign up on <a href="https://freemassage2019.com">www.FreeMassage2019.com</a> or give us a call at 415-634-9942
        </td>
    </tr>
</table>
';

}