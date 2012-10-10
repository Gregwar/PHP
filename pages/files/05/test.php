<?php

class Calculator
{
    public static function add($a, $b)
    {
        return $a + $b;
    }
}

class Test extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        for ($i=0; $i<10; $i++) {
            $this->assertEquals(
                Calculator::add($i, $i), 2*$i
            );
        }
    }
}
