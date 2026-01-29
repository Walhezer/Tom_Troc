<?php
$title = "Modifier le livre - TomTroc";
require_once 'partials/header.php';
?>

<main class="edit-book-page">
    <div class="container">

        <div class="back-link">
            <a href="index.php?action=account">← retour</a>
        </div>

        <h1 class="section-title text-left">Modifier les informations</h1>

        <div class="edit-book-wrapper">
            <div class="edit-book-image-col">
                <p>Photo</p>
                <div class="current-book-image">
                    <img src="public/uploads/livres/<?= htmlspecialchars($book['image']) ?>" alt="Couverture actuelle">
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="editBookForm">
                    <label for="imageUpload" class="edit-photo-link">Modifier la photo</label>
                    <input type="file" id="imageUpload" name="image" style="display: none;"
                        onchange="previewImage(event)">
            </div>

            <div class="edit-book-form-col">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>"
                        class="form-control-light" required>
                </div>

                <div class="form-group">
                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>"
                        class="form-control-light" required>
                </div>

                <div class="form-group">
                    <label for="description">Commentaire</label>
                    <textarea id="description" name="description" rows="5" class="form-control-light"
                        required><?= htmlspecialchars($book['description']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="available">Disponibilité</label>
                    <select name="available" id="available" class="form-control-light">
                        <option value="1" <?= $book['available'] == 1 ? 'selected' : '' ?>>disponible</option>
                        <option value="0" <?= $book['available'] == 0 ? 'selected' : '' ?>>non disponible</option>
                    </select>
                </div>

                <button type="submit" class="btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.querySelector('.current-book-image img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php require_once 'partials/footer.php'; ?>