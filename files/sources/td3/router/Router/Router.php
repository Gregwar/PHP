<?php

namespace Router;

class Router
{
    protected $rules = [];

    protected function addRule(Rule $rule)
    {
        $this->rules[] = $rule;
    }

    /** 
     * Enregistre une page
     */
    public function register(string $name, string $pattern, \Closure $callback)
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
    public function route(?string $path = null)
    {
        if ($path === null) {
	    if (isset($_SERVER['PATH_INFO'])) {
		$path = $_SERVER['PATH_INFO'];
	    }
        }

        if (!$path) {
            $path = '/';
        }

        foreach ($this->rules as $rule) {
            if (($tokens = $rule->match($path)) != null) {
                $rule->execute($tokens);
                return;
            }
        }

        throw new \Exception('Unable to find a suitable route for ' . $path);
    }

    /**
     * Génère une URL absolue pour un fichier statique
     */
    public function generateStatic($path): string
    {
        $root = dirname($_SERVER['SCRIPT_NAME']);

        if ($root && $root[strlen($root)-1]!='/') {
            $root .= '/';
        }

        return $root . $path;
    }

    /**
     * Génère l'URL correspondante
     */
    public function generate($name, array $parameters = []): string
    {
        foreach ($this->rules as $rule) {
            if ($rule->getName() == $name) {
                return $_SERVER['SCRIPT_NAME'] . $rule->generate($parameters);
            }
        }

        throw new \Exception('Rule not found : ' . $name);
    }
}
