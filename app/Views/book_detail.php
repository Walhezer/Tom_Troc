<?php
$title = htmlspecialchars($book['title']) . " - TomTroc";
require_once 'partials/header.php';
?>

<main>
    <div class="book-detail-container">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php?action=catalog">Nos livres</a> > <span><?= htmlspecialchars($book['title']) ?></span>
            </div>
        </div>

        <div class="book-detail-wrapper">
            <div class="book-cover">
                <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>"
                    alt="Couverture de <?= htmlspecialchars($book['title']) ?>">
            </div>

            <div class="book-infos">
                <h1 class="detail-title"><?= htmlspecialchars($book['title']) ?></h1>
                <p class="detail-author">par <?= htmlspecialchars($book['author']) ?></p>

                <div class="separator-line"></div>

                <div class="detail-section">
                    <h3>DESCRIPTION</h3>
                    <p class="description-text">
                        <?= nl2br(htmlspecialchars($book['description'] ?? 'Aucune description fournie.')) ?>
                    </p>
                </div>

                <div class="detail-section">
                    <h3>PROPRIÉTAIRE</h3>
                    <div class="owner-card">
                        <div class="owner-avatar">
                            <?php if (!empty($book['userImage'])): ?>
                                <img src="public/uploads/users/<?= htmlspecialchars($book['userImage']) ?>"
                                    alt="<?= htmlspecialchars($book['username']) ?>">
                            <?php else: ?>
                                <img src="public/images/auth-background.jpg" alt="Avatar par défaut" style="opacity:0.5">
                            <?php endif; ?>
                        </div>
                        <span class="owner-name"><?= htmlspecialchars($book['username']) ?></span>
                    </div>
                </div>

                <a href="index.php?action=message&id=<?= $book['user_id'] ?>" class="btn-primary btn-message">Envoyer un
                    message</a>
            </div>
        </div>
    </div>
</main>

<?php require_once 'partials/footer.php'; ?>