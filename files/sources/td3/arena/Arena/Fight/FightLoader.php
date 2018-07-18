<?php

namespace Arena\Fight;

class FightLoader
{
    protected $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Charge le combat sérialisé
     */
    public function loadFight(): ?Fight
    {
        $fight = null;

        if (isset($_SESSION[$this->key])) {
            $fight = unserialize($_SESSION[$this->key]);
        } 

        return $fight;
    }

    /**
     * Enregistre le combat serialisé
     */
    public function saveFight(Fight $fight)
    {
        $_SESSION[$this->key] = serialize($fight);
    }
}
