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

class A {
}

class B {
    private function __clone() {
    }
}

class C {
    protected function __clone() {
    }
}

class D {
    public function __clone() {
    }
}

class E {
    function __clone() {
    }
}

$r = new ReflectionClass('A');
var_dump($r->isCloneable());
//$m = $r->getMethod('__clone');
//var_dump(Reflection::getModifierNames($m->getModifiers()));
echo "\n";

$r = new ReflectionClass('B');
var_dump($r->isCloneable());
$m = $r->getMethod('__clone');
var_dump(Reflection::getModifierNames($m->getModifiers()));
echo "\n";

$r = new ReflectionClass('C');
var_dump($r->isCloneable());
$m = $r->getMethod('__clone');
var_dump(Reflection::getModifierNames($m->getModifiers()));
echo "\n";

$r = new ReflectionClass('D');
var_dump($r->isCloneable());
$m = $r->getMethod('__clone');
var_dump(Reflection::getModifierNames($m->getModifiers()));
echo "\n";

$r = new ReflectionClass('E');
var_dump($r->isCloneable());
$m = $r->getMethod('__clone');
var_dump(Reflection::getModifierNames($m->getModifiers()));
echo "\n";
