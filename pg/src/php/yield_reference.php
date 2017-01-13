<?php
function &yield_reference() {
    $value = 3;
    while ($value > 0) {
        yield $value;
    }
}

foreach(yield_reference() as &$value) {
    echo ($value--) . "\n";
}
