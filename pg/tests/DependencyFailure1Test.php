<?php
use PHPUnit\Framework\TestCase;

class DependencyFailure1Test extends TestCase {
    /**
     * @depends testOne
     */
    public function testTwo() {
    }

    public function testOne() {
        $this->assertTrue(true);
    }
}
