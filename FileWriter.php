<?php

class FileWriter {
    public function write($file, $content) {
        $file = fopen($file, 'w');
        if ($file === false) {
            return false;
        }
    }
}
