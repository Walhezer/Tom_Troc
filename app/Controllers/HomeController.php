<?php

class HomeController
{
    public function home()
    {
        $bookManager = new BookManager();
        $book = $bookManager->getBook();

        require('app/Views/home.php');
    }
}


