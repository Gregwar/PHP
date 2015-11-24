<?php

class ModelTests extends BaseTests
{
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
}
