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

    public function showbook()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $bookManager = new BookManager();
            $book = $bookManager->getBookById($id);
            if (!$book) {
                header('Location: index.php?action=catalog');
                exit;
            }
            require_once 'app/Views/book_detail.php';
        } else {
            header('Location: index.php?action=catalog');
            exit;
        }
    }
}