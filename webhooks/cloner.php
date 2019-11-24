<?php
    
    exec("./webhooks/clone.sh 2>&1", $output, $return_var);
    print_r($output);
    print_r($return_var);
