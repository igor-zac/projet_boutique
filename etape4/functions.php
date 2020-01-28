<?php
// Tableau d'articles destiné à être appelé par la fonction "afficheArticle(...)
$articles = [
    "Article 1" => ["Article 4", 300, "article4.jpg"],
    "Article 2" => ["Article 5", 50, "article5.jpg"],
    "Article 3" => ["Article 6", 500, "article6.jpg"]
];

// Boucle itérant a travers le tableau précédent et appelant la fonction afficheArticle sur chaqueArticle
foreach($articles as $article){
    afficheArticle($article[2], $article[0], $article[1]);
}

/*================================================================================================
3 fonctions permettant d'afficher des articles, ne prenant aucun paramètre et sans valeur de retour
structure semblable au code de l'étape 2
================================================================================================*/
function afficheArticle1(){
    $article = ["Article 1", 100, "article1.jpg"]; ?>
    <div class="article">
        <div>
            <img class="image_article" src="img/<?= $article[2]?>" alt="L'image de mon article">
        </div>

        <h2><?= $article[0]?></h2>

        <div class="prix">
            <p><?= $article[1]?> €</p>
        </div>
    </div>
<?php
}

function afficheArticle2(){
    $article = ["Article 2", 400, "article2.jpg"];?>
    <div class="article">
        <div>
            <img class="image_article" src="img/<?= $article[2]?>" alt="L'image de mon article">
        </div>

        <h2><?= $article[0]?></h2>

        <div class="prix">
            <p><?= $article[1]?> €</p>
        </div>
    </div>
<?php
}

function afficheArticle3(){
    $article = ["Article 3", 200, "article3.jpg"]; ?>
    <div class="article">
        <div>
            <img class="image_article" src="img/<?= $article[2]?>" alt="L'image de mon article">
        </div>

        <h2><?= $article[0]?></h2>

        <div class="prix">
            <p><?= $article[1]?> €</p>
        </div>
    </div>
<?php
}

/*=====================================================================================================
fonction prenant en paramètre le nom de l'article, le nom du fichier jpg et l'entier correspondant au prix
la fonction se charge d'afficher les articles entrés au même format que les fonctions précédentes
====================================================================================================*/
function afficheArticle(String $nom_fichier, String $nom_article, int $prix){ ?>
    <div class="article">
        <div>
            <img class="image_article" src="img/<?= $nom_fichier?>" alt="L'image de mon article">
        </div>

        <h2><?= $nom_article?></h2>

        <div class="prix">
            <p><?= $prix?> €</p>
        </div>
    </div>
<?php
}
?>
