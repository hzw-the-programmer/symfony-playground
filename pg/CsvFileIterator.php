<?php

class CsvFileIterator implements Iterator {
    private $key;
    private $current;
    private $file;

    public function __construct($file) {
        $this->file = fopen($file, 'r');
    }

    public function __destruct() {
        fclose($this->file);
    }

    public function rewind() {
        rewind($this->file);
        $this->key = 0;
        $this->current = fgetcsv($this->file);
    }

    public function valid() {
        return $this->current != false;
    }

    public function key() {
        return $this->key;
    }

    public function current() {
        return $this->current;
    }

    public function next() {
        $this->key++;
        $this->current = fgetcsv($this->file);
    }
}
