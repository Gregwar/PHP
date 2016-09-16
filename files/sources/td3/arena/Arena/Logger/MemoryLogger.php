<?php

namespace Arena\Logger;

/**
 * Log des messages dans la mémoire
 */
class MemoryLogger implements Logger
{
    protected $entries = [];

    /**
     * Ajoute une entrée au log
     */
    public function addEntry($message)
    {
        $this->entries[] = $message;
    }

    /**
     * Obtiens les entrées du log
     */
    public function getEntries()
    {
        return $this->entries;
    }
}
