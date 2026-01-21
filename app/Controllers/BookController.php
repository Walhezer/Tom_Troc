<?php

require_once 'app/Models/BookManager.php';

class BookController
{
    public function catalog()
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        require_once 'app/Views/catalog.php';
    }
}