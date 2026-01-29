<?php
$title = "Ajouter un livre - TomTroc";
require_once 'partials/header.php';
?>

<main class="edit-book-page">
    <div class="container">

        <div class="back-link">
            <a href="index.php?action=account">← retour</a>
        </div>

        <h1 class="section-title text-left">Ajouter un livre</h1>

        <form action="" method="post" enctype="multipart/form-data" class="book-form">

            <div class="edit-book-wrapper">

                <div class="edit-book-image-col">

                    <div class="box-image-upload" onclick="triggerUpload()">

                        <div id="placeholder-content" class="upload-placeholder">
                            <span class="placeholder-text">Ajouter une photo</span>
                        </div>

                        <img src="#" alt="Prévisualisation" id="preview-img" class="preview-img-hidden">
                    </div>

                    <label for="imageUpload" class="edit-photo-link">Ajouter une photo</label>

                    <input type="file" id="imageUpload" name="image" onchange="previewImage(event)" required>
                </div>

                <div class="edit-book-form-col">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" placeholder="Titre du livre"
                            class="form-control-light" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Auteur</label>
                        <input type="text" id="author" name="author" placeholder="Nom de l'auteur"
                            class="form-control-light" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Commentaire</label>
                        <textarea id="description" name="description" placeholder="Résumé ou état du livre..."
                            class="form-control-light" required></textarea>
                    </div>

                    <button type="submit" class="btn-primary">Valider</button>
                </div>

            </div>
        </form>

    </div>
</main>

<script>
    function triggerUpload() {
        document.getElementById('imageUpload').click();
    }

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('preview-img');
            var placeholder = document.getElementById('placeholder-content');

            output.src = reader.result;

            placeholder.style.display = 'none';
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php require_once 'partials/footer.php'; ?>