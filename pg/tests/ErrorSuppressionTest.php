<?php
use PHPUnit\Framework\TestCase;

class ErrorSuppressionTest extends TestCase {
    public function testFileWriting() {
        $writer = new FileWriter();
        $this->assertFalse(@$writer->write('/is-not-writeable/file', 'stuff'));
    }
}
