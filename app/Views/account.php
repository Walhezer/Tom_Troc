<?php
$title = "Mon compte - TomTroc";
require_once 'partials/header.php';
?>

<main class="account-page">
    <div class="container">
        <h1 class="section-title text-left">Mon compte</h1>

        <div class="account-info-wrapper">
            <div class="profile-card">
                <form action="index.php?action=account" method="post" enctype="multipart/form-data" id="avatarForm">
                    <div class="profile-avatar">
                        <img src="<?= $user['avatar_url'] ?>" alt="Avatar">
                    </div>
                    <label for="file-upload" class="edit-avatar-link" style="cursor:pointer;">modifier</label>
                    <input type="file" id="file-upload" name="avatar" style="display: none;">
                </form>

                <hr>
                <h2 class="profile-username"><?= htmlspecialchars($user['username']) ?></h2>
                <p class="member-since">Membre depuis <?= $memberSince ?></p>

                <div class="library-stats">
                    <span class="label">BIBLIOTHÈQUE</span>
                    <span class="count"><?= count($books) ?> livres</span>
                </div>
            </div>

            <div class="profile-form-container">
                <h3>Vos informations personnelles</h3>
                <form action="index.php?action=account" method="post">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="********">
                    </div>

                    <div class="form-group">
                        <label for="username">Pseudo</label>
                        <input type="text" id="username" name="username"
                            value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn-outline">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="user-books-section">
            <table class="books-table">
                <thead>
                    <tr>
                        <th>PHOTO</th>
                        <th>TITRE</th>
                        <th>AUTEUR</th>
                        <th>DESCRIPTION</th>
                        <th>DISPONIBILITÉ</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($books) > 0): ?>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td>
                                    <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>" alt="Livre"
                                        class="book-thumb">
                                </td>
                                <td class="book-title"><?= htmlspecialchars($book['title']) ?></td>
                                <td class="book-author"><?= htmlspecialchars($book['author']) ?></td>
                                <td class="book-desc">
                                    <div class="desc-content">
                                        <?= substr(htmlspecialchars($book['description']), 0, 80) ?>...
                                    </div>
                                </td>
                                <td>
                                    <?php if ($book['available']): ?>
                                        <span class="badge badge-available">disponible</span>
                                    <?php else: ?>
                                        <span class="badge badge-unavailable">non dispo.</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?action=edit_book&id=<?= $book['id'] ?>" class="action-link">Éditer</a>
                                    <a href="index.php?action=delete_book&id=<?= $book['id'] ?>" class="action-link delete"
                                        onclick="return confirm('Supprimer ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; padding: 40px;">
                                Vous n'avez pas encore de livres.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="add-book-action">
            <a href="index.php?action=add_book" class="btn-primary">Ajouter un livre</a>
        </div>
    </div>
</main>

<?php require_once 'partials/footer.php'; ?>