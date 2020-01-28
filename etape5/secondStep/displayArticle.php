<!doctype html>
<?php
session_start(); //On recupere la session ouverte depuis 'addArticle.php'

//Les 3 lignes suivantes recuperent les informations qu'on a faites passer depuis addArticle via la variable $_SESSION
$article = $_SESSION['articleName'];
$price = $_SESSION['articlePrice'];
$path_to_img = $_SESSION['pathToImg'];

//Les 3 lignes suivantes suppriment les champs de $_SESSION definis pour faire passer les valeurs souhaitees
unset($_SESSION['pathToImg']);
unset($_SESSION['articleName']);
unset($_SESSION['articlePrice']);

//Finalement, on termine la session avec session_destroy()
session_destroy();

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
                <p><?= $price ?> €</p>
            </div>
        </div>
    </body>
</html>