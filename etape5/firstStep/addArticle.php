<!doctype html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <header>
            <h1 class="text-center">Ajouter un article</h1>
        </header>
        <div class="container">
            <div class="row d-flex justify-content-around">

        <!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
                <form action="displayArticle.php" method="POST" enctype="multipart/form-data" class="col-8">
                    <div class="form-group">
                        <label>
                            Nom de l'article
                            <input type="text" class="form-control" name="name">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Prix de l'article
                            <input type="number" step="0.01" class="form-control" name="price">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Choisir l'image
                            <input type="file" class="form-control-file" name="myFile">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </body>
</html>