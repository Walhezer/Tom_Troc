<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Tom Troc</title>
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
                <a href="#adefinir">Accueil</a>
                <a href="#adefinir">Nos livres à l'échange</a>
            </div>

            <div class="header-user-links">
                <a href="#adefinir">Messagerie</a>
                <a href="#adefinir">Mon compte</a>
                <a href="#adefinir">Connexion</a>
            </div>
        </nav>
    </header>

    <main class="auth-container">

        <div class="auth-form-side">

            <div class="auth-wrapper">

                <h1>Inscription</h1>

                <form action="index.php?action=register" method="post">

                    <div class="form-group">
                        <label for="username">Pseudo</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn-primary">S'inscrire</button>

                </form>

                <p class="auth-link">
                    Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a>
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