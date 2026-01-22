<?php

session_start();

require_once 'app/Controllers/BookController.php';

require_once 'app/Models/BookManager.php';
require_once 'app/Controllers/HomeController.php';

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

        default:
                echo "<h1>Error 404: Page not found</h1>";
                break;

}








