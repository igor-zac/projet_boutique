
<?php
include("functions.php");
include ("baseArticles.php");





if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['add'])){
        $articles = getArr();
        $articles_recus = $_GET['articles'];
        $articles_choisis = [];


        foreach ($articles_recus as $article){
            $articles_choisis[$article] = $articles[$article];
            $articles_choisis[$article]['quantite'] = 1;
        }

    }  else {

        $articles_choisis = unserialize($_GET['panier']);

        if(isset($_GET['delete'])){
            unset($articles_choisis[$_GET['delete']]);
        }


        foreach($articles_choisis as $key => $article){

            $articles_choisis[$key]['quantite'] = $_GET[$key];
        }


    }
}


$panier = serialize($articles_choisis);

$total = totalPanier($articles_choisis);
?>

<!doctype html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon panier</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Mon panier</h1>
        </header>
        <!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="block">
            <input type="hidden" name="panier" value='<?= $panier ?>'>
        <?php
        afficheArticles($articles_choisis, false);
        ?>
            <p class="total"><strong>Total :</strong> <?= $total ?> €</p>
            <div class="bouton">
                <button type="submit" name="recalc" class="btn btn-primary">Recalculer</button>
            </div>

        </form>
    </body>
</html>