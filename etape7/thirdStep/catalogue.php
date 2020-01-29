<?php
include("functions.php");
include("baseArticles.php");
$articles = getArr();
?>

<!doctype html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">

    </head>
    <body>
        <header>
            <h1>Nom de la boutique</h1>
        </header>
<!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
        <form action="panier.php" method="GET" class="block">
            <?php

                afficheArticles($articles, true);

            ?>
            <div class="bouton">
                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
            </div>
        </form>
    </body>
</html>