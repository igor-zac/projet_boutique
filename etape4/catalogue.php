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
<!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
            <?php
                include("functions.php");
                afficheArticle1();
                afficheArticle2();
                afficheArticle3();

            ?>
    </body>
</html>