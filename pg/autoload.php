<?php

spl_autoload_register(function ($class) {
    if ($class !== 'Composer\\Autoload\\ClassLoader') {
        require __DIR__ . '/src/' . $class . '.php';
    }
});
