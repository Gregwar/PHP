<?php

class Bus
{
    // Position
    protected $position = 0;

    // Nombre d'arrêts
    protected $max;

    /**
     * Construit un bus
     *
     * @int max le nombre d'arrêts
     */
    public function __construct($max)
    {
	$this->max = $max;
    }

    /**
     * Passe au prochain arrêt
     *
     * @return vrai si le bus a avancé
     */
    public function next()
    {
	if ($this->position < $this->max) {
	    $this->position++;
	    return true;
	}

	return false;
    }

    /**
     * Envoie le bus directement à une position
     */
    public function go($position)
    {
	$this->position = $position;
    }

    /**
     * Position du bus
     *
     * @return la position actuelle
     */
    public function getPosition()
    {
	return $this->position;
    }
}
