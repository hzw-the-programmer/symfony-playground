<?php
use PHPUnit\Framework\TestCase;

class DependencyAndDataProviderTest extends TestCase {
    public function testProducerFirst() {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond() {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer() {
        $this->assertEquals(
            ['provider1', 'first', 'second'],
            func_get_args()
        );
    }

    public function provider() {
        return [['provider1'], ['provider2']];
    }
}
