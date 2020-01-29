<!doctype html>
<?php
$article=$_POST['name'];
$prix=(float)$_POST['price'];
$path_to_img="upload/" . basename($_FILES['myFile']['name']);
move_uploaded_file($_FILES['myFile']['tmp_name'], $path_to_img);

?>


<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Nom de la boutique</h1>
        </header>
        <!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
        <div class="article">
            <div>
                <img class="image_article" src="<?= $path_to_img ?>" alt="L'image de mon article">
            </div>

            <h2><?= $article ?></h2>

            <div class="prix">
                <p><?= $prix ?> €</p>
            </div>
        </div>
    </body>
</html>