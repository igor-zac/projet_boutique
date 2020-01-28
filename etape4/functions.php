<?php

$articles = [
    "Article 1" => ["Article 4", 300, "article4.jpg"],
    "Article 2" => ["Article 5", 50, "article5.jpg"],
    "Article 3" => ["Article 6", 500, "article6.jpg"]
];

foreach($articles as $article){
    afficheArticle($article[2], $article[0], $article[1]);
}


function afficheArticle1(){
    $article = ["Article 1", 100, "article1.jpg"]; ?>
    <div class="article">
        <div>
            <img class="image_article" src=img/<?php echo $article[2]?> alt="L'image de mon article">
        </div>

        <h2><?php echo $article[0]?></h2>

        <div class="prix">
            <p><?php echo $article[1]?> €</p>
        </div>
    </div>
<?php
}

function afficheArticle2(){
    $article = ["Article 2", 400, "article2.jpg"];?>
    <div class="article">
        <div>
            <img class="image_article" src=img/<?php echo $article[2]?> alt="L'image de mon article">
        </div>

        <h2><?php echo $article[0]?></h2>

        <div class="prix">
            <p><?php echo $article[1]?> €</p>
        </div>
    </div>
<?php
}

function afficheArticle3(){
    $article = ["Article 3", 200, "article3.jpg"]; ?>
    <div class="article">
        <div>
            <img class="image_article" src=img/<?php echo $article[2]?> alt="L'image de mon article">
        </div>

        <h2><?php echo $article[0]?></h2>

        <div class="prix">
            <p><?php echo $article[1]?> €</p>
        </div>
    </div>
<?php
}

function afficheArticle(String $nom_fichier, String $nom_article, int $prix){ ?>
    <div class="article">
        <div>
            <img class="image_article" src=img/<?php echo $nom_fichier?> alt="L'image de mon article">
        </div>

        <h2><?php echo $nom_article?></h2>

        <div class="prix">
            <p><?php echo $prix?> €</p>
        </div>
    </div>
<?php
}
?>
