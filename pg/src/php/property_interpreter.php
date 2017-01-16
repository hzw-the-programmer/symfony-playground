<?php
class A implements ArrayAccess {
    private $data = [];
    public $declared;
    private $hidden;

    public function __isset($key) {
        echo __METHOD__ . ": $key\n";
        return isset($this->data[$key]);
    }
    public function __get($key) {
        echo __METHOD__ . ": $key\n";
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
    public function __set($key, $value) {
        echo __METHOD__ . ": $key=>$value\n";
        $this->data[$key] = $value;
    }
    public function __unset($key) {
        echo __METHOD__ . ": $key\n";
        unset($this->data[$key]);
    }

    public function getHidden() {
        return $this->hidden;
    }

    public function offsetExists($key) {
        echo __METHOD__ . ": $key\n";
        return isset($this->data[$key]);
    }
    public function offsetGet($key) {
        echo __METHOD__ . ": $key\n";
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
    public function offsetSet($key, $value) {
        echo __METHOD__ . ": $key=>$value\n";
        $this->data[$key] = $value;
    }
    public function offsetUnset($key) {
        echo __METHOD__ . ": $key\n";
        unset($this->data[$key]);
    }
}

$a = new A();

var_dump(isset($a->hidden));
var_dump($a->hidden);

$a->hidden = 'hidden value';

var_dump(isset($a->hidden));
var_dump($a->hidden);

unset($a->hidden);

var_dump(isset($a->hidden));
var_dump($a->hidden);

echo "\n";

var_dump(isset($a['hidden']));
var_dump($a['hidden']);

$a['hidden'] = 'hidden value';

var_dump(isset($a['hidden']));
var_dump($a['hidden']);

unset($a['hidden']);

var_dump(isset($a['hidden']));
var_dump($a['hidden']);

echo "\n";

var_dump($a->getHidden());
