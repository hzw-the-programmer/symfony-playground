<?php
use PHPUnit\Framework\TestCase;

class DataProviderReturnIteratorObject extends TestCase {
    /**
     * @dataProvider addtionProvider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertEquals($expected, $a + $b);
    }

    public function addtionProvider() {
        return new CsvFileIterator(__DIR__ . '/data.csv');
    }
}
