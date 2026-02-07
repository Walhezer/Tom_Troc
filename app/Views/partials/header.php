<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Tom Troc' ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="header-left-side">

                <a class="header-logo" href="index.php">
                    <img src="public/images/logo.png" alt="Tom Troc Logo" class="logo-img">
                </a>

                <button class="burger-menu" aria-label="Menu" aria-controls="mobileMenu" aria-expanded="false">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </button>

                <div class="header-menu" id="mobileMenu">
                    <div class="header-nav-links">
                        <a href="index.php" class="<?= (!isset($_GET['action'])) ? 'active' : '' ?>">Accueil</a>
                        <a href="index.php?action=catalog"
                            class="<?= (isset($_GET['action']) && $_GET['action'] == 'catalog') ? 'active' : '' ?>">Nos
                            livres à l'échange</a>
                    </div>


                    <div class="header-right-side">
                        <a href="index.php?action=messages"
                            class="link-with-icon <?= (isset($_GET['action']) && $_GET['action'] == 'messages') ? 'active' : '' ?>">
                            <img src="public/images/Icon-message.png" alt="Message" class="header-icon">
                            Messagerie
                        </a>
                        <a href="index.php?action=account"
                            class="link-with-icon <?= (isset($_GET['action']) && $_GET['action'] == 'account') ? 'active' : '' ?>">
                            <img src="public/images/Icon-user.png" alt="Compte" class="header-icon">
                            Mon compte
                        </a>
                        <a href="index.php?action=login"
                            class="link-with-icon <?= (isset($_GET['action']) && $_GET['action'] == 'login') ? 'active' : '' ?>">Connexion</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>