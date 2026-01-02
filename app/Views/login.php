<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Tom Troc</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="header-logo">
                <a href="index.php">
                    <img src="public/images/logo.png" alt="Tom Troc Logo" class="logo-img">
                </a>
            </div>

            <div class="header-nav-links">
                <a href="#">Accueil</a>
                <a href="#">Nos livres à l'échange</a>
            </div>

            <div class="header-user-links">
                <a href="#">Messagerie</a>
                <a href="#">Mon compte</a>
                <a href="#">Connexion</a>
            </div>
        </nav>
    </header>
    <main class="auth-container">

        <div class="auth-form-side">

            <div class="auth-wrapper">

                <h1>Connexion</h1>

                <?php if (isset($error)): ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>

                <form action="index.php?action=login" method="post">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn-primary">Se connecter</button>
                </form>

                <p class="auth-link">
                    Pas de compte ? <a href="index.php?action=register">Inscrivez-vous</a>
                </p>
            </div>
        </div>

        <div class="auth-image-side">
            <img src="public/images/auth-background.jpg" alt="Bibliothèque Tom Troc">
        </div>

    </main>
    <footer>
        <div class="footer-container">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Mentions légales</a>
            <a href="#">Tom Troc©</a>
            <img src="public/images/mini-logo.png" alt="logo" class="footer-mini-logo">
        </div>
    </footer>

</body>

</html>