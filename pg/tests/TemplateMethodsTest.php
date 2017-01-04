<?php
use PHPUnit\Framework\TestCase;

class TemplateMethods extends TestCase {
    public function testOne() {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(true);
    }

    public function testTwo() {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(false);
    }

    public function setUp() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function tearDown() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function assertPreConditions() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function assertPostConditions() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function onNotSuccessfulTest($e) {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $e;
    }

    public static function setUpBeforeClass() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass() {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
}
