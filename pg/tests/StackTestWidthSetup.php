<?php
use PHPUnit\Framework\TestCase;

class StackTest1 extends TestCase {
    private $stack;

    public function setUp() {
        $this->stack = [];
    }

    public function testEmpty() {
        $this->assertTrue(empty($this->stack));
    }

    public function testPush() {
        array_push($this->stack, 'foo');
        $this->assertEquals('foo', $this->stack[count($this->stack) - 1]);
        $this->assertFalse(empty($this->stack));
    }

    public function testPop() {
        array_push($this->stack, 'foo');
        $this->assertEquals('foo', array_pop($this->stack));
        $this->assertTrue(empty($this->stack));
    }
}
