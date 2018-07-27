<?php

namespace Arena\Attack;

use Arena\Creature\BaseCreature;

interface Attack
{
    /**
     * Lance une attaque
     */
    public function attack(BaseCreature $runner, BaseCreature $target);

    /**
     * Obtenir le nom de l'attaque
     */
    public function getName(): string;
}
