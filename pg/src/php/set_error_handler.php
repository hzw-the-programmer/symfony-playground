<?php

register_shutdown_function(function() {
    echo "shutdown 1 called.\n";
});
register_shutdown_function(function() {
    echo "shutdown 2 called.\n";
});
set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
    echo "$errno, $errstr, $errfile, $errline\n";
    print_r($errcontext);
    echo error_reporting() . "\n";
    //die();
    return false;
});
//$b = @$a;
$b = $a;
echo "execution continued.\n";
