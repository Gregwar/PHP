<?php

namespace Arena\Attack;

use Arena\Creature\BaseCreature;

class Arrow implements Attack
{
    /**
     * Frappe l'adversaire
     */
    public function attack(BaseCreature $runner, BaseCreature $target)
    {
        $target->hit(20 + mt_rand(0, 10));
    }

    /**
     * Nom de l'attaque
     */
    public function getName(): string
    {
        return 'Fleche';
    }
}
