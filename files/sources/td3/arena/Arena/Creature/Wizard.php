<?php

namespace Arena\Creature;

use Arena\Attack\Tackle;
use Arena\Attack\Heal;

class Wizard extends BaseCreature
{
    public function __construct($nickname)
    {
        parent::__construct($nickname);

        $this->attacks[] = new Tackle;
        $this->attacks[] = new Heal;
    }

    public function getName(): string
    {
        return 'Sorcier';
    }
}
