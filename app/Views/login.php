<?php
$title = "Connexion -  TomTroc";
require_once 'partials/header.php';
?>

<div class="auth-wrapper">
    <div class="auth-form-side">
        <h1>Connexion</h1>



        <form action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>
            <button type="submit" class="btn-primary">Se connecter</button>
        </form>

        <p class="auth-link">
            Pas de compte ? <a href="index.php?action=register">Inscrivez-vous</a>
        </p>
    </div>

    <div class="auth-image-side">
        <img src="public/images/auth-background.jpg" alt="Bibliothèque Tom Troc">
    </div>
</div>

<?php require_once 'partials/footer.php'; ?>