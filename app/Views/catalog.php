<?php
$title = "Nos livres à l'échange - TomTroc";
require_once 'partials/header.php';
?>

<main>
    <section class="books-list">
        <div class="container">
            <div class="catalogue-header">
                <h1 class="section-title">Nos livres à l'échange</h1>

                <form action="" method="GET" class="search-form">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Rechercher un livre">
                </form>
            </div>
            <div class="books-grid">
                <?php
                if (isset($books) && count($books) > 0):
                    ?>
                    <?php foreach ($books as $book): ?>
                        <article class="book-card">
                            <div class="book-image-container">
                                <a href="index.php?action=show_book&id=<?= $book['id'] ?>">
                                    <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>"
                                        alt="Couverture de <?= htmlspecialchars($book['title']) ?>">
                                </a>
                            </div>

                            <div class="book-infos">
                                <h3><?= htmlspecialchars($book['title']) ?></h3>
                                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                                <p class="book-owner">Vendu par : <a
                                        href="index.php?action=public_profile&id=<?= $book['user_id'] ?>">
                                        <?= $book['username'] ?>
                                    </a>
                                </p>
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