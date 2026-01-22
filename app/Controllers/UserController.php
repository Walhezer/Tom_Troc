<?php
require_once 'app/Models/UserManager.php';
require_once 'app/Models/BookManager.php';

//Class to manage user operations
class UserController
{

    //Handle user registration  
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $userManager = new UserManager();

            if ($userManager->createUser($username, $email, $password)) {
                header('Location: index.php?action=login&success=1');
                exit();
            } else {
                exit();
            }

        }
        require_once 'app/Views/register.php';
    }

    //Handle user login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_pseudo'] = $user['username'];

                header('Location: index.php?action=home');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        require_once 'app/Views/login.php';
    }

    //Handle user account
    public function account()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $userId = $_SESSION['user_id'];

        $userManager = new UserManager();
        $bookManager = new BookManager();

        $user = $userManager->getUserById($userId);
        $books = $bookManager->getBooksByUserId($userId);

        $creationDate = new DateTime($user['created_at']);
        $now = new DateTime();
        $interval = $now->diff($creationDate);

        if ($interval->y > 0) {
            $memberSince = $interval->y . ' an(s)';
        } elseif ($interval->m > 0) {
            $memberSince = $interval->m . ' mois';
        } else {
            $memberSince = "moins d'un mois";
        }

        require_once 'app/Views/account.php';
    }
}