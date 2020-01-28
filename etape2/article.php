<!doctype html>

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

            <div class="article">
                <?php

                $name = "Le fameux article";
                $prix = 300;
                $path_to_img = "img/article.jpg";
                ?>

                <div>
                    <img class="image_article" src="<?= $path_to_img?>" alt="L'image de mon article">
                </div>

                <h2><?php echo $name?></h2>

                <div class="prix">
                    <p><?php echo $prix?> €</p>
                </div>

            </div>
    </body>
</html>