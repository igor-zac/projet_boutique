
<?php
include("functions.php");

$articles = [
    "article_1" => ["Article 1", 300, "article1.jpg"],
    "article_2" => ["Article 2", 400, "article2.jpg"],
    "article_3" => ["Article 3", 150, "article3.jpg"],
    "article_4" => ["Article 4", 300, "article4.jpg"],
    "article_5" => ["Article 5", 50, "article5.jpg"],
    "article_6" => ["Article 6", 500, "article6.jpg"]
];


$articles_recus = $_GET['articles'];
foreach ($articles_recus as $article){
    $articles_choisis[$article] = $articles[$article];
}

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
<div class="block">
<?php
afficheArticlesTableau($articles_choisis, false);

?>
</div>
</body>
</html>