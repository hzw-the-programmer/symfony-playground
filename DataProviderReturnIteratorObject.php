<?php
use PHPUnit\Framework\TestCase;

require 'CsvFileIterator.php';

class DataProviderReturnIteratorObject extends TestCase {
    /**
     * @dataProvider addtionProvider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertEquals($expected, $a + $b);
    }

    public function addtionProvider() {
        return new CsvFileIterator('data.csv');
    }
}
