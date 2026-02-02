<?php

session_start();

require_once 'app/Controllers/BookController.php';

require_once 'app/Models/BookManager.php';
require_once 'app/Controllers/HomeController.php';
require_once 'app/Controllers/MessageController.php';

if (file_exists('app/Controllers/UserController.php')) {
        require_once 'app/Controllers/UserController.php';
}

$action = $_GET['action'] ?? 'home';

switch ($action) {
        case 'home':
                $controller = new HomeController();
                $controller->home();
                break;

        case 'register':
                $controller = new UserController();
                $controller->register();
                break;

        case 'login':
                $controller = new UserController();
                $controller->login();
                break;

        case 'catalog':
                $controller = new BookController();
                $controller->catalog();
                break;

        case 'show_book':
                $controller = new BookController();
                $controller->showbook();
                break;

        case 'account':
                $controller = new UserController();
                $controller->account();
                break;

        case 'public_profile':
                $controller = new UserController();
                $controller->public_profile();
                break;

        case 'edit_book':
                $controller = new BookController();
                $controller->editBook();
                break;

        case 'add_book':
                $controller = new BookController();
                $controller->addBook();
                break;

        case 'messages':
                $controller = new MessageController();
                $controller->messagerie();
                break;

        default:
                echo "<h1>Error 404: Page not found</h1>";
                break;

}








