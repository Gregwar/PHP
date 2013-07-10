<?php

use Gregwar\RST\Reference;
use Gregwar\RST\Environment;

class PhpNet extends Reference
{
    public function getName() { 
        return 'method'; 
    }

    public function resolve(Environment $environment, $data) {
        return array(
            'title' => $data,
            'url' => 'http://php.net/'.$data
        );
    }
};

