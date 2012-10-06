<?php

namespace Router;

class Router
{
    protected $rules = array();

    protected function addRule(Rule $rule)
    {
        $this->rules[] = $rule;
    }

    /** 
     * Enregistre une page
     */
    public function register($name, $pattern, \Closure $callback)
    {
        $this->addRule(new Rule($name, $pattern, $callback));
    }

    /**
     * Définit la page par défaut
     */
    public function fallback(\Closure $callback)
    {
        $this->addRule(new Rule('fallback', '*', $callback));
    }

    /**
     * Effectue le routage
     */
    public function route($path)
    {
        if (!$path) {
            $path = '/';
        }

        foreach ($this->rules as $rule)
        {
            if (($tokens = $rule->match($path)) != null) {
                $rule->execute($tokens);
                return;
            }
        }

        throw new \Exception('Unable to find a suitable route for ' . $path);
    }

    /**
     * Génère l'URL correspondante
     */
    public function generate($name, array $parameters = array())
    {
        foreach ($this->rules as $rule) {
            if ($rule->getName() == $name) {
                return $_SERVER['SCRIPT_NAME'] . $rule->generate($parameters);
            }
        }

        throw new \Exception('Rule not found : ' . $name);
    }
}
