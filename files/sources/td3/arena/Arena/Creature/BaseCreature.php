<?php

namespace Arena\Creature;

use Arena\Attack\Struggle;

abstract class BaseCreature
{
    /**
     * Vie de la créature
     */
    private $life = 100;

    /**
     * Attaques
     */
    protected $attacks = array();

    /**
     * Surnom de la créature
     */
    protected $nickname;

    public function __construct($nickname)
    {
        $this->nickname = $nickname;
        $this->attacks = array(new Struggle);
    }

    /**
     * Frappe la créature
     */
    public function hit($strength)
    {
        $this->life = (int)max(0, $this->life - $strength);
    }

    /**
     * Soigne la créature
     */
    public function heal($strength)
    {
        $this->life = (int)min(100, $this->life + $strength);
    }

    /**
     * Est-ce que la créature est morte ?
     */
    public function isDead()
    {
        return $this->life <= 0;
    }

    /**
     * Obtient la vie courante
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Nom de la créature
     */
    public abstract function getName();

    /**
     * Attaques réalisables
     */
    public function getAttacks()
    {
        return $this->attacks;
    }

    /**
     * Surnom de la créature
     */
    public function __toString()
    {
        return $this->nickname;
    }
}
