<?php

$articles=[
        "Article 1" => ["Article 1", 100, "article1.jpg"],
        "Article 2" => ["Article 2", 400, "article2.jpg"],
        "Article 3" => ["Article 3", 200, "article3.jpg"]
];


/*Boucle for itérant a travers $names et qui affecte le prix et l'image correspondant a l'article en fonction des
tableaux $prix et $img_name

Elle génère a chaque tour une div 'article' qui est de type flex, la disposition est mise en forme dans le fichier
style.css */

foreach($articles as $article) { ?>
    <div class="article">
        <div>
            <img class="image_article" src=img/<?= $article[2]?> alt="L'image de mon article">
        </div>

        <h2><?= $article[0]?></h2>

        <div class="prix">
            <p><?= $article[1]?> €</p>
        </div>
    </div>
<?php
}
?>