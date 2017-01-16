<?php
class A {
    protected $name;
    function __construct($n) {
        $this->name = $n;
    }
    function __destruct() {
        printf("%s %s\n", $this->name, __METHOD__);
    }
}

function shutdown_1($p1, $p2) {
    printf("%s(%s, %s)\n", __FUNCTION__, $p1, $p2);
}
function shutdown_2($p1, $p2) {
    printf("%s(%s, %s)\n", __FUNCTION__, $p1, $p2);
}
register_shutdown_function('shutdown_1', '1', 'finished');
register_shutdown_function('shutdown_2', '2', 'finished');
register_shutdown_function(function($p1, $p2) {printf("%s(%s, %s)\n", __FUNCTION__, $p1, $p2);}, '3', 'finished');

$a1 = new A('a1');
$a2 = new A('a2');

echo "going to finish\n";
//exit("exit called.\n");
echo "just finished...\n";
