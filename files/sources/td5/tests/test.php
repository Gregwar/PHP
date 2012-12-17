<?php

include('code.php');

class BusTest extends PHPUnit_Framework_TestCase
{
    public function testGetPosition()
    {
	$bus = new Bus(1);

	$this->assertEquals($bus->getPosition(), 0);
	$bus->next();
	$this->assertEquals($bus->getPosition(), 1);
	$bus->next();
	$this->assertEquals($bus->getPosition(), 1);
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
	$this->assertEquals($bus->getPosition(), 5);
    }
}
