<?php
$title = "Inscription - TomTroc";
require_once 'partials/header.php';
?>
<div class="auth-wrapper">
    <div class="auth-form-side">
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

            <p class="auth-link">
                Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a>
            </p>
        </form>
    </div>


    <div class="auth-image-side">
        <img src="public/images/auth-background.jpg" alt="Bibliothèque Tom Troc">
    </div>
</div>

<?php require_once 'partials/footer.php'; ?>