<?php

namespace Arena\Fight;

use Arena\Creature\BaseCreature;

class Fight
{
    /**
     * Créatures impliquées dans le combat (tabeleau)
     */
    public $creatures;

    /**
     * Créature courante (index de $creatures)
     */
    protected $turn;

    public function __construct(BaseCreature $firstCreature, BaseCreature $secondCreature)
    {
        $this->creatures = array($firstCreature, $secondCreature);
        $this->turn = mt_rand(0, 1);
    }

    /**
     * Retourne la creature dont c'est le tour
     */
    public function getCreature()
    {
        return $this->creatures[$this->turn];
    }

    /**
     * Obtient la cible (créature dont ça n'est pas le tour)
     */
    public function getTarget()
    {
        return $this->creatures[($this->turn + 1) % 2];
    }

    /**
     * Réalise une attaque
     */
    public function attack($name)
    {
        // Trouve la bonne attaque
        foreach ($this->getCreature()->getAttacks() as $attack) {
            if ($attack->getName() == $name) {
                // Lance l'attaque
                $attack->attack($this->getCreature(), $this->getTarget());

                // Change de tour
                $this->nextTurn();
            }
        }
    }

    /**
     * Passe au tour suivant
     */
    public function nextTurn()
    {
        $this->turn = ($this->turn + 1) % 2;
    }

    /**
     * Qui est gagnant de ce combat ?
     */
    public function getWinner()
    {
        if ($this->getCreature()->isDead()) {
            return $this->getTarget();
        }
        
        if ($this->getTarget()->isDead()) {
            return $this->getCreature();
        }

        return null;
    }
}
