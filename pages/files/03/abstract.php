<?php

abstract class Message
{
    abstract public function getName();
    abstract public function getBody();

    public function display() {
        echo 'From: '.$this->getName()."\n";
        echo 'Contents: '.$this->getBody()."\n";
    }
}

$m = new Message; // Erreur
