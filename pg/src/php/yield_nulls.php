<?php
function yield_nulls($n) {
    $i = 0;
    while($i < $n) {yield; $i++;};
}

var_dump(iterator_to_array(yield_nulls(3)));
