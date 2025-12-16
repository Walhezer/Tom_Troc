<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription - Tom Troc</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <main class="auth-container">
        <div class="auth-form-side">
        <h1>Inscription</h1>

        <form action="index.php?action=register" method="post">
            <div class="form-group">
                <label for="username">Pseudo (Username)</label>
                <input type="text" text id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="text" id="email" name="email" required>
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

        <div class="auth-image-side">
            <img src="public/images/auth-background.jpg" alt="Bibliothèque Tom Troc">
        </div>
    </main>

</body>

</html>