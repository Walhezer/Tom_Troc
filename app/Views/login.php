<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" contnt="width=device-width" , initial-scale="1.0">
    <title>Connexion - Tom Troc</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <main class="auth-container">

        <div class="auth-form-side">
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

            <div class="auth-image-side">
                <img src="public/images/auth-background.jpg" alt="Bibliothèque Tom Troc">
            </div>

    </main>

</html>