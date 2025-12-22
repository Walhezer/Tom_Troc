<?php
require_once 'app/Models/UserManager.php';

class UserController
{

    //Function to handle user registration
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $userManager = new UserManager();

            if ($userManager->createUser($username, $email, $password)) {
                header('Location: index.php?action=login');
                exit();
            } else {
                exit();
            }

        }
        require_once 'app/Views/register.php';
    }

    //Function to handle user login
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
}