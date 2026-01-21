<?php
$title = "Nos livres à l'échange - TomTroc";
require_once 'partials/header.php';
?>

<main>
    <section class="books-list">
        <div class="container">
            <h1 class="section-title">Nos livres à l'échange</h1>

            <div class="books-grid">
                <?php
                if (isset($books) && count($books) > 0):
                    ?>
                    <?php foreach ($books as $book): ?>
                        <article class="book-card">
                            <div class="book-image-container">
                                <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>"
                                    alt="Couverture de <?= htmlspecialchars($book['title']) ?>">
                            </div>

                            <div class="book-info">
                                <h3><?= htmlspecialchars($book['title']) ?></h3>
                                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                                <p class="book-owner">Vendu par : <?= htmlspecialchars($book['username'] ?? 'Membre') ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p class="no-books">Aucun livre n'est disponible pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php
require_once 'partials/footer.php';
?>