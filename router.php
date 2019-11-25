<?php

$request = $_SERVER['REQUEST_URI'];

function pathFinder($request)
{
    $requestType = explode('.', $request);

    if (end($requestType) === 'png' || end($requestType) === 'png') {
        echo file_get_contents(__DIR__ . $request);
    } else {

        switch ($request) {
            case '/':
                require __DIR__ . '/index.php';
                break;
            case '':
                require __DIR__ . '/index.php';
                break;
            default:
                require __DIR__ . $request;
                break;
        }
    }
}




if (isset($_SERVER['QUERY_STRING']) && isset($_GET['email']) && isset($_GET['camp'])) {
    $txt = '{email:"' . $_GET['email'] . '", campaign:"' . $_GET['camp'] . '", source:' . $request . '}';
    $myfile = fopen("tracker.txt", "a") or die("Unable to open file!");
    fwrite($myfile, "\n" . $txt);
    fclose($myfile);
    ?>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            const objOne = {
                email: '<?php echo $_GET['email'] ?>',
                campaign: '<?php echo $_GET['camp'] ?>'
            }
            axios.post('https://freemassage.herokuapp.com/campaign_opened', objOne)
                .then(res => console.log('response from mailer', res))
                .catch(res => console.log('response from mailer', res))
        </script>
    <?php
        $request = explode('?', $request);

        pathFinder($request[0]);
    } else {

        pathFinder($request);
    }
