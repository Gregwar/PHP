<?php

namespace Arena\Fight;

class FightLoader
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Charge le combat sérialisé
     */
    public function loadFight()
    {
        $fight = false;

        if (isset($_SESSION[$this->key])) {
            $fight = unserialize($_SESSION[$this->key]);
        } 

        return $fight;
    }

    /**
     * Enregistre le combat serialisé
     */
    public function saveFight($fight)
    {
        $_SESSION[$this->key] = serialize($fight);
    }
}
