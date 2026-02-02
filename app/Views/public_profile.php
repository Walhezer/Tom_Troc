<?php
$title = "Profil de " . htmlspecialchars($user['username']) . " - Tom Troc";
require_once 'partials/header.php';
?>

<main class="account-page">
    <div class="container">

        <div class="profile-layout">
            <div class="profile-card">
                <div class="profile-avatar">
                    <?php if (!empty($user['image'])): ?>
                        <img src="public/images/<?= htmlspecialchars($user['image']) ?>" alt="Avatar">
                    <?php else: ?>
                        <img src="public/images/default-avatar.png" alt="Avatar par défaut">
                    <?php endif; ?>
                </div>

                <hr>
                <h2 class="profile-username"><?= htmlspecialchars($user['username']) ?></h2>
                <p class="member-since">Membre depuis <?= $memberSince ?></p>

                <div class="library-stats">
                    <span class="label">BIBLIOTHÈQUE</span>
                    <span class="count"><?= count($books) ?> livres</span>
                </div>

                <a href="index.php?action=messages&id=<?= $user['id'] ?>" class="btn-outline">
                    Écrire un message
                </a>
            </div>

            <div class="user-books-section">
                <table class="books-table">
                    <thead>
                        <tr>
                            <th>PHOTO</th>
                            <th>TITRE</th>
                            <th>AUTEUR</th>
                            <th>DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($books) > 0): ?>
                            <?php foreach ($books as $book): ?>
                                <tr>
                                    <td>
                                        <a href="index.php?action=show_book&id=<?= $book['id'] ?>">
                                            <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>" alt="Livre"
                                                class="book-thumb">
                                        </a>
                                    </td>
                                    <td class="book-title"><?= htmlspecialchars($book['title']) ?></td>
                                    <td class="book-author"><?= htmlspecialchars($book['author']) ?></td>
                                    <td class="book-desc">
                                        <div class="desc-content">
                                            <?= substr(htmlspecialchars($book['description']), 0, 100) ?>...
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="empty-table-message">
                                    Cet utilisateur n'a pas encore de livres.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
</main>

<?php require_once 'partials/footer.php'; ?>