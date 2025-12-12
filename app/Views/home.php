<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test MVC</title>
</head>
<body>
      <h1> <?php echo $book['title'] ?></h1>

      <img src="public/uploads/livres/<?= $book['image'] ?>" alt="Couverture du livre" width="300">
</body>
</html>