<?php

class SiteTests extends BaseTests
{
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
        $this->assertCount(1, $crawler->filter('.loginsuccess'));

        // Now, we should get the page
        $crawler = $client->request('GET', '/addBook');
        $this->assertCount(0, $crawler->filter('.shouldbeadmin'));

        // Disconnect
        $crawler = $client->request('GET', '/logout');
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->request('GET', '/addBook');
        $this->assertCount(1, $crawler->filter('.shouldbeadmin'));
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
        $client->request('GET', '/addBook');
        $form = $client->getCrawler()->filter('form')->form();
        $form['title'] = 'Test';
        $form['author'] = 'Someone';
        $form['synopsis'] = 'A test book';
        $form['copies'] = 3;
        $client->submit($form);

        // There is one book
        $books = $this->app['model']->getBooks();
        $this->assertEquals(1, count($books));
    }
}
