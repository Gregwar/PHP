<?php

class A
{
    public final function f()
    {
        return 42;
    }
}

class B
{
    public function f()
    {
        return 30; // Erreur
    }
}
