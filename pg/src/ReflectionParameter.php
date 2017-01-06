<?php
require '../../vendor/autoload.php';
//$rclass = new ReflectionClass('Symfony\\Component\\HttpKernel\\HttpKernel');
//$rmethod = $rclass->getMethod('handle');
//$rmethod = new ReflectionMethod('Symfony\\Component\\HttpKernel\\HttpKernel', 'handle');
//$rclass = new ReflectionClass('Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage');
//$rmethod = $rclass->getMethod('loadSession');
//$rmethod = $rclass->getMethod('setSaveHandler');
//$rmethod = new ReflectionMethod('Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage', 'loadSession');
//$rmethod = new ReflectionMethod('Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage', 'setSaveHandler');
//$rmethod = new ReflectionFunction('array_merge');
//$rmethod = new ReflectionFunction('sum');
$rmethod = new ReflectionFunction('total_intervals');

$parameters = $rmethod->getParameters();

echo "\n";
var_dump($rmethod->getName());
foreach($parameters as $p) {
    echo "******\n";

    echo "name:\n";
    var_dump($p->getName());

    echo "position:\n";
    var_dump($p->getPosition());

    echo "is optional:\n";
    var_dump($p->isOptional());

    echo "is default value available:\n";
    var_dump($p->isDefaultValueAvailable());

    echo "default value:\n";
    if ($p->isDefaultValueAvailable()) {
        var_dump($p->getDefaultValue());

        echo "is default value constant:\n";
        var_dump($p->isDefaultValueConstant());

        echo "default value constant:\n";
        if ($p->isDefaultValueConstant()) {
            var_dump($p->getDefaultValueConstantName());
        }
    }

    echo "is passed by reference:\n";
    var_dump($p->isPassedByReference());

    echo "has type:\n";
    var_dump($p->hasType());

    echo "type:\n";
    //if ($p->hasType()) {
        var_dump($p->getType());
    //}

    echo "is array:\n";
    var_dump($p->isArray());

    echo "is callable:\n";
    var_dump($p->isCallable());

    echo "is variadic:\n";
    var_dump($p->isVariadic());

    echo "allows null:\n";
    var_dump($p->allowsNull());

    echo "can be passed by value:\n";
    var_dump($p->canBePassedByValue());
}

function sum(...$numbers) {
}

function total_intervals($unit, DateInterval ...$intervals) {
}
