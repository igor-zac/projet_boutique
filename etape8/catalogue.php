<?php
include("functions.php");
include("baseArticles.php");
$articles = getArr();
$articles_choisis = [];
if (isset($_SESSION['panier'])){

    $articles_choisis = unserialize($_SESSION['panier']);

    if(isset($_GET['delete'])){
        unset($articles_choisis[$_GET['delete']]);
    }


    foreach($articles_choisis as $key => $article){
        if(isset($_GET[$key])) {
            if ($_GET[$key] > 0) {
                $articles_choisis[$key]['quantite'] = $_GET[$key];
                $errorTable[$key] = "";
            } else {
                $errorTable[$key] = "Veuillez entrer un nombre supérieur à 0";
            }
        } else {
            $errorTable[$key] = "";
        }

    }


} else if(isset($_COOKIE['panier'])){

    $articles_choisis = unserialize($_COOKIE['panier']);

}

$articles_choisis_catalogue = array_keys($articles_choisis);

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
        <?php include("entete.php"); ?>
<!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
        <form action="panier.php" method="GET" class="block">
            <?php

                afficheArticles($articles,null, true, $articles_choisis_catalogue);

            ?>
            <div class="bouton">
                <button type="submit" name="add" class="btn btn-primary">Ajouter au panier</button>
            </div>
        </form>
    </body>
</html>