<?php

class HomeController
{
    public function home()
    {
        $bookManager = new BookManager();
        $book = $bookManager->getBook();

        require('app/Views/home.php');
    }

    public function pageNotFound()
    {
        http_response_code(404);
        require 'app/Views/404.php';
    }
}


