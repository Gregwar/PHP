<?php

use Silex\WebTestCase;

class BaseTests extends WebTestCase
{
    /**
     * Creating the test application
     */
    public function createApplication()
    {
        // Getting the app
        $app = include(__DIR__.'/../app.php');

        // Creating a copy of the SQLite database
        copy(__DIR__.'/../sql/library.db', __DIR__.'/../sql/test.db');

        // Changing the config
        $config = $app['config'];
        $config['database'] = [
            'engine' => 'sqlite',
            'file' => __DIR__.'/../sql/test.db'
        ];
        $app['config'] = $config;

        // Enabling sessions test
        $app['session.test'] = true;

        return $app;
    }
}
