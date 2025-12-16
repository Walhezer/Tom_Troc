<?php
require_once 'app/Models/UserManager.php';

class UserController
{

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "1. Le formulaire a bien été envoyé en POST.<br>";

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            echo "2. Données reçues : $username / $email <br>";

            $userManager = new UserManager();

            if ($userManager->createUser($username, $email, $password)) {
                echo "3. VICTOIRE ! La méthode createUser a renvoyé TRUE.<br>";
                header('Location: index.php?action=login');
                exit();
            } else {
                echo "3. ECHEC. La méthode createUser a renvoyé FALSE.<br>";
                exit();
            }

        }
        require_once 'app/Views/register.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_pseudo'] = $user['username'];

                header('LOcation: index.php?action=home');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        require_once 'app/Views/login.php';
    }
}