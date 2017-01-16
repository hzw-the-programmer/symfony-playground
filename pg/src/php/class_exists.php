<?php
spl_autoload_register(function() {
    echo "autoload called\n";
});
var_dump(class_exists('A', false));
var_dump(class_exists('A'));
