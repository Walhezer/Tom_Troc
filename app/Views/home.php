<?php
$title = "Accueil - TomTroc";
require_once "partials/header.php";
?>
<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Rejoignez nos lecteurs passionnés</h1>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons
                en
                la magie du partage de connaissances et d'histoires à travers les livres.</p>
            <a class="btn-primary" href="#">Découvrir</a>
        </div>

        <div class="hero-image">
            <img src="public/images/Bibliothèque.jpg" alt="Bibliothèque">
        </div>
    </section>
    <section class="books-list">
        <h1 class="section-title">Les derniers livres ajoutés</h1>
        <div class="books-grid">
            <?php foreach ($book as $b): ?>
                <div class="book-card">
                    <img src="public/uploads/livres/<?= $b['image'] ?>" alt="Couverture de <?= $b['title'] ?>">
                    <h3><?= $b['title'] ?></h3>
                    <p><?= $b['author'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="block-btn">
            <a class="btn-primary" href="index.php?action=catalog">Voir tous les livres</a>
        </div>
    </section>
    <section class="how-it-work">

        <h2 class="section-title">Comment ça marche ?</h2>
        <p class="section-description">Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour
            commencer :</p>

        <div class="steps-container">
            <div class="step-card">Inscrivez-vous gratuitement sur notre plateforme.</div>
            <div class="step-card">Ajoutez les livres que vous souhaitez échanger à votre profil.</div>
            <div class="step-card">Parcourez les livres disponibles chez d'autres membres.</div>
            <div class="step-card">Proposez un échange et discutez avec d'autres passionnés de lecture.</div>
        </div>

        <a href="index.php?action=catalog" class="btn-outline">Voir tous les livres</a>


    </section>
</main>