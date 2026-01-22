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
                    <a href="index.php?action=show_book&id=<?= $b['id'] ?>">
                        <img src="public/uploads/livres/<?= $b['image'] ?>" alt="Couverture de <?= $b['title'] ?>">
                        <div class="book-infos">
                            <h3><?= $b['title'] ?></h3>
                            <p><?= $b['author'] ?></p>
                            <?php if (isset($b['username'])): ?>
                                <p class="book-owner">Vendu par : <?= $b['username'] ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="block-btn">
            <a class="btn-primary" href="index.php?action=catalog">Voir tous les livres</a>
        </div>
    </section>

    <section class="how-it-work">
        <div class="container">

            <h2 class="section-title">Comment ça marche ?</h2>
            <p class="section-description">Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes
                pour
                commencer :</p>

            <div class="steps-container">
                <div class="step-card">
                    <p> Inscrivez-vous gratuitement sur notre plateforme.</p>
                </div>
                <div class="step-card">
                    <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
                </div>
                <div class="step-card">
                    <p>Parcourez les livres disponibles chez d'autres membres.</p>
                </div>
                <div class="step-card">
                    <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
                </div>
            </div>

            <a href="index.php?action=catalog" class="btn-outline">Voir tous les livres</a>
        </div>
    </section>

    <div class="img-mask">
        <img src="public/images/Mask-group.jpg">
    </div>
    <section class="our-values">
        <div class="values-content">
            <h2 class="section-title">Nos valeurs</h2>

            <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont
                ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous
                croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations
                enrichissantes.</p>

            <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.
            </p>

            <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se
                connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment
                sur les étagères.</p>

            <div class="signature-block">
                <cite>L'équipe Tom Troc</cite>
                <img src="public/images/Vector.svg" alt="Coeur">
            </div>
        </div>
    </section>
    <?php require_once 'partials/footer.php'; ?>
</main>