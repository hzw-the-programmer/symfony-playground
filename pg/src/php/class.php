<?php

class a{
    private $m = 'a';

    public function dump() {
        echo "$this->m\n";
    }

    public function cm() {
        $this->m = 'ac';
    }
}

class b extends a {
    private $m = 'b';

    public function dump() {
        $this->cm();
        parent::dump();
        echo "$this->m\n";
    }
}

$b = new b;
$b->dump();
