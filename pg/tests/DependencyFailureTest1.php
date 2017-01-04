<?php
use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase {
    /**
     * @depends testOne
     */
    public function testTwo() {
    }

    public function testOne() {
        $this->assertTrue(true);
    }
}
