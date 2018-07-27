<?php

namespace Arena\Attack;

use Arena\Creature\BaseCreature;

class Struggle implements Attack
{
    /**
     * Frappe l'adversaire, le lanceur se fait cependant aussi mal
     */
    public function attack(BaseCreature $runner, BaseCreature $target)
    {
        $target->hit(5 + mt_rand(0, 5));
        $runner->hit(1 + mt_rand(0, 3));
    }

    /**
     * Nom de l'attaque
     */
    public function getName(): string
    {
        return 'Lutte';
    }
}
