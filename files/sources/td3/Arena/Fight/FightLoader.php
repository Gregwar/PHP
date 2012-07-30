<?php

namespace Arena\Fight;

class FightLoader
{
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Charge le combat sérialisé
     */
    public function loadFight()
    {
        $fight = false;

        if (file_exists($this->filename)) {
            $fight = unserialize(file_get_contents($this->filename));
        } 

        return $fight;
    }

    /**
     * Enregistre le combat serialisé
     */
    public function saveFight($fight)
    {
        file_put_contents($this->filename, serialize($fight));
    }
}
