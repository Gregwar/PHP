<?php

use Silex\WebTestCase;

class Tests extends WebTestCase
{
    /**
     * Creating the test application
     */
    public function createApplication()
    {
        // Getting the app
        $app = include(__DIR__.'/../app.php');

        // Creating a copy of the SQLite database
        copy(__DIR__.'/../sql/db.sqlite', __DIR__.'/../sql/test.sqlite');

        // Changing the config
        $config = $app['config'];
        $config['database'] = [
            'engine' => 'sqlite',
            'file' => __DIR__.'/../sql/test.sqlite'
        ];
        $app['config'] = $config;

        // Enabling sessions test
        $app['session.test'] = true;

        return $app;
    }

    /**
     * Testing that accessing the secure page doesn't works, and then logging
     */
    public function testAdmin()
    {
        $client = $this->createClient();

        // We are not admin, check that we get the error
        $crawler = $client->request('GET', '/addBook');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('.shouldbeadmin'));

        // Logging in as admin, bad password
        $crawler = $client->request('POST', '/admin', ['login' => 'admin', 'password' => 'bad']);
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(0, $crawler->filter('.loginsuccess'));

        // Logging in as admin, success
        $crawler = $client->request('POST', '/admin', ['login' => 'admin', 'password' => 'password']);
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('.loginsuccess'));

        // Now, we should get the page
        $crawler = $client->request('GET', '/addBook');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(0, $crawler->filter('.shouldbeadmin'));
    }

    /**
     * Testing insertion of a book
     */
    public function testBookInsert()
    {
        // There is no book
        $books = $this->app['model']->getBooks();
        $this->assertEquals(0, count($books));

        // Inserting one
        $this->app['model']->insertBook('Test', 'Someone', 'A test book', 'image', 3);

        // There is one book
        $books = $this->app['model']->getBooks();
        $this->assertEquals(1, count($books));

        // TODO: Vérifier que 3 exemplaires ont été créés
    }

    /**
     * Testing book insert (using form)
     */
    public function testBookInsertForm()
    {
        $client = $this->createClient();
        $this->app['session']->set('admin', true);

        // There is no book
        $books = $this->app['model']->getBooks();
        $this->assertEquals(0, count($books));

        // Inserting one using a POST request through the form
        $client->request('POST', '/addBook', [
            'title' => 'Test',
            'author' => 'Someone',
            'synopsis' => 'A test book',
            'copies' => 3
        ]);

        // There is one book
        $books = $this->app['model']->getBooks();
        $this->assertEquals(1, count($books));
    }
}
