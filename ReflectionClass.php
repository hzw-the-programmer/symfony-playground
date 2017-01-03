<?php

require_once 'vendor/autoload.php';

//$r = new ReflectionClass('Symfony\\Component\\HttpKernel\\HttpKernelInterface');
//$r = new ReflectionClass('Symfony\\Component\\HttpKernel\\Kernel');
$r = new ReflectionClass('AppKernel');
print_r($r->getConstants());
echo $r->getFileName() . "\n";
print_r($r->getMethods());
echo $r->getName() . "\n";
echo $r->getNameSpaceName() . "\n";
echo $r->getShortName() . "\n";
print_r($r->getProperties());
print_r($r->getInterfaces());
print_r($r->getInterfaceNames());
var_dump($r->getParentClass());
