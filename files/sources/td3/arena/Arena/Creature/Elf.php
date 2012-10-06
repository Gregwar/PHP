<?php

namespace Arena\Creature;

use Arena\Attack\Hit;
use Arena\Attack\Arrow;

class Elf extends BaseCreature
{
    public function __construct($nickname)
    {
        parent::__construct($nickname);

        $this->attacks[] = new Hit;
        $this->attacks[] = new Arrow;
    }

    public function getName()
    {
        return 'Elfe';
    }
}
