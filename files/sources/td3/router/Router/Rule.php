<?php

namespace Router;

class Rule
{
    protected $name;
    protected $pattern;
    protected $callback;

    public function __construct($name, $pattern, \Closure $callback)
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->callback = $callback;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Compare un chemin pour savoir si il correspond au motif
     */
    public function match($path)
    {
        $regexp = str_replace('*', '(.*)', $this->pattern);
        $regexp = '#^' . $regexp . '$#mUsi';

        if (preg_match($regexp, $path, $matches)) {
            return $matches;
        } else {
            return null;
        }
    }

    /**
     * Génere une URL avec les paramètres donnés
     */
    public function generate(array $parameters)
    {
        $url = '';
        $parts = explode('*', $this->pattern);
        $position = 0;

        foreach ($parameters as $parameter) {
            $url .= $parts[$position++];
            $url .= $parameter;
        }
        for (; $position<count($parts); $position++) {
            $url .= $parts[$position];
        }

        return $url;
    }

    public function execute($tokens)
    {
        array_shift($tokens);
        $callback = $this->callback;

        call_user_func_array($callback, $tokens);
    }
}
