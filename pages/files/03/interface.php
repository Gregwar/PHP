<?php

interface CanSpeak
{
    public function speak();
}

class Human implements CanSpeak
{
    public function speak()
    {
        echo "I am Human!\n";
    }
}

$human = new Human;
$human->speak();
