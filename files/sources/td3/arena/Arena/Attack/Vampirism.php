<?php

namespace Arena\Attack

use Arena\Creature\BaseCreature;

class Vampirism implements Attack
{
    /**
     * Frappe l'adversaire
     */
    public function attack(BaseCreature $runner, BaseCreature $target)
    {
        $life = 15 + mt_rand(0, 10);

        $target->hit($life);
        $runner->heal($life/2.0);
    }

    /**
     * Nom de l'attaque
     */
    public function getName()
    {
        return 'Vampirisme';
    }
}
