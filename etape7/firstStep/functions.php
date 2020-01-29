<?php
// Tableau d'articles destiné à être appelé par la fonction "afficheArticle(...)
$articles = [
    "article_1" => ["Article 1", 300, "article1.jpg"],
    "article_2" => ["Article 2", 400, "article2.jpg"],
    "article_3" => ["Article 3", 150, "article3.jpg"],
    "article_4" => ["Article 4", 300, "article4.jpg"],
    "article_5" => ["Article 5", 50, "article5.jpg"],
    "article_6" => ["Article 6", 500, "article6.jpg"]
];

// Boucle itérant a travers le tableau précédent et appelant la fonction afficheArticle sur chaqueArticle
foreach($articles as $key => $article){
    afficheArticle($article[2], $article[0], $article[1], $key);
}


/*=====================================================================================================
fonction prenant en paramètre le nom de l'article, le nom du fichier jpg et l'entier correspondant au prix
la fonction se charge d'afficher les articles entrés au même format que les fonctions précédentes
====================================================================================================*/
function afficheArticle(String $nom_fichier, String $nom_article, int $prix, string $article){ ?>
    <div class="article">
        <div>
            <img class="image_article" src="img/<?= $nom_fichier?>" alt="L'image de mon article">
        </div>

        <h2><?= $nom_article?></h2>

        <div class="prix">
            <p><?= $prix?> €</p>
        </div>
        <div  class="check">
            <input type="checkbox" name="<?= $article ?>" value="Bike">
        </div>

    </div>
<?php
}
?>
