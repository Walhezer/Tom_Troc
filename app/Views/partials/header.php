<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Tom Troc' ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="header-left-side">

                <div class="header-logo">
                    <a href="index.php">
                        <img src="public/images/logo.png" alt="Tom Troc Logo" class="logo-img">
                    </a>
                </div>

                <div class="header-nav-links">
                    <a href="index.php">Accueil</a>
                    <a href="index.php?action=books">Nos livres à l'échange</a>
                </div>
            </div>

            <div class="header-right-side">
                <a href="index.php?action=messages">Messagerie</a>
                <a href="index.php?action=account">Mon compte</a>
                <a href="index.php?action=login">Connexion</a>
            </div>
        </nav>
    </header>