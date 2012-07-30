<?php

namespace Arena\Attack;

use Arena\Creature\BaseCreature;

class Heal implements Attack
{
    /**
     * Frappe l'adversaire
     */
    public function attack(BaseCreature $runner, BaseCreature $target)
    {
        $runner->heal(25 + mt_rand(0, 10));
    }

    /**
     * Nom de l'attaque
     */
    public function getName()
    {
        return 'Soin';
    }
}
