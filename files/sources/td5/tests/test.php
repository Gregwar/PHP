<?php

include('code.php');

class BusTest extends PHPUnit_Framework_TestCase
{
    public function testGetPosition()
    {
	$bus = new Bus(1);

	$this->assertEquals(0, $bus->getPosition());
	$bus->next();
	$this->assertEquals(1, $bus->getPosition());
	$bus->next();
	$this->assertEquals(1, $bus->getPosition());
    }

    public function testNext()
    {
	$bus = new Bus(1);

	$this->assertTrue($bus->next());
	$this->assertFalse($bus->next());
    }

    public function testGo()
    {
	$bus = new Bus(10);

	$bus->go(5);
	$this->assertEquals(5, $bus->getPosition());
    }
}
