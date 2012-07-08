<?php

class User
{
    protected $name = null;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        echo 'Hello, I am '.$this->name."!\n";
    }
}
