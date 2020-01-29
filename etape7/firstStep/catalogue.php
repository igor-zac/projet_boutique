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
        <form action="" method="GET">
            <?php
                include("functions.php");

            ?>
        </form>
    </body>
</html>