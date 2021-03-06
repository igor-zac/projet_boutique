
<?php
session_start();

include("functions.php");
include ("baseArticles.php");

$errorTable = [];



if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['empty_cart'])){

        $articles_choisis = [];


    } elseif(isset($_GET['add'])){
        $articles = getArr();
        $articles_recus = $_GET['articles'];
        $articles_choisis = [];


        foreach ($articles_recus as $article){
            $articles_choisis[$article] = $articles[$article];

            $articles_choisis[$article]['quantite'] = 1;
        }

    }  elseif (isset($_SESSION['panier'])){

        $articles_choisis = unserialize($_SESSION['panier']);

        if(isset($_GET['delete'])){
            unset($articles_choisis[$_GET['delete']]);
        }


        foreach($articles_choisis as $key => $article){
            if(isset($_GET[$key])) {
                if ($_GET[$key] > 0) {
                    if ($_GET[$key] <1){
                        $articles_choisis[$key]['quantite'] = 1;
                    } else {
                        $articles_choisis[$key]['quantite'] = $_GET[$key];
                    }
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
}


    foreach ($articles_choisis as $key => $article) {
        if (!isset($errorTable[$key])) {
            $errorTable[$key] = "";
        }
    }


    $panier = serialize($articles_choisis);
    $totalPanier = totalPanier($articles_choisis);
    $frais = calculFraisPort($articles_choisis, $totalPanier);

$_SESSION['panier'] = $panier;
setcookie('panier', $panier, time()+14*24*3600, null, null, false, true);


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
    <?php include("entete.php"); ?>
        <!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="block">

        <?php
        afficheArticles($articles_choisis, $errorTable, false, NULL);

        if(!empty($articles_choisis)) { ?>
            <p class="total"><strong>Prix :</strong> <?= $totalPanier ?> €</p>
            <p class="total"><strong>Frais de port :</strong> <?= $frais ?> €</p>
            <p class="total"><strong>Total commande :</strong> <?= $totalPanier + $frais ?> €</p>

            <div class="bouton">
                <button type="submit" name="recalc" class="btn btn-primary">Recalculer</button>
            </div>
            <?php
        }
            ?>

        </form>
    </body>
</html>