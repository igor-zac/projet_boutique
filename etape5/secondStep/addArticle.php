
<?php
$validName = $validPrice = $validFile = false; //variables verifiant si les valeurs sont valides ou pas
$nameErr = $priceErr = $fileErr = ""; // variables contenant la precision sur l'origine de l'erreur en cas d'erreur


if($_SERVER["REQUEST_METHOD"] == "POST"){ //On ne lance les verifications que si la page a ete demandee via une requete POST

    // VERIFICATION SUR LE NOM DE L'ARTICLE ===================================================================================
    if(empty($_POST["name"])){
        //Si le nom de l'article est vide, alors on stocke la cause de l'erreur dans la variable $nameErr
        $nameErr = "* Merci de renseigner le nom de l'article";

    } else {
        //Si le nom de l'article n'est pas vide, on stocke sa valeur, traitee en amont par test_input(), dans la variable $name
        $name = test_input($_POST["name"]);

        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            //On verifie si les caracteres ne sont que des lettres ou espaces, si ce n'est pas le cas on le precise dans $nameErr
            $nameErr = "* Merci de ne mettre que des lettres et des espaces";

        } else {
            //Sinon, si tout est OK, on declare le champ valide en faisant passer $validName a 'true'
            $validName = true;
        }
    }

    // VERIFICATION SUR LE PRIX DE L'ARTICLE ==========================================================================
    if(empty($_POST["price"])){
        //Si le prix est vide, alors on stocke la cause de l'erreur dans la variable $priceErr
        $priceErr = "* Merci de renseigner un prix pour l'article";

    } else {
        //Sinon on recupere la valeur entree pour le prix
        $price = $_POST["price"];

        if($price <= 0){
            //Si la valeur est inferieure ou egale a 0, on le precise dans $priceErr
            $priceErr = "* Merci de renseigner un prix supérieur à 0";

        } else {
            //Sinon, tout est OK, on declare le champ valide en faisant passer $validPrice a 'true'
            $validPrice = true;
        }
    }

    // VERIFICATION SUR L'UPLOAD DU FICHIER ===========================================================================
    if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0){
        //Si un fichier a bien ete envoye et qu'il n'y a pas d'erreur a l'envoi, on procede a la suite des verifications

        if($_FILES['myFile']['size'] <= 2500000){
            //On limite la taille du fichier a envoyer a 2.5 Mo
            $fileInfo = pathinfo($_FILES['myFile']['name']); //Genere un tableau $fileInfo contenant les differentes parties du chemin du fichier
            $uploadExtension = $fileInfo['extension']; //Stocke l'extension du fichier dans $uploadExtension
            $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');  //Tableau regroupant les extensions admises

            if(in_array($uploadExtension, $allowedExtensions)){
                //On verifie si l'extension du fichier est admissible

                if ($validName AND $validPrice) {
                    //Si le nom et le prix sont OK, on deplace le fichier dans 'uploads/'
                    $pathToImg = 'uploads/' . basename($_FILES['myFile']['name']);
                    move_uploaded_file($_FILES['myFile']['tmp_name'], $pathToImg);
                }
                //Si l'extension est admissible, on declare le champ valide en passant $validFile a 'true'
                $validFile = true;

            } else {
                //Si l'extension du fichier ne fait pas partie des extensions admises, on le precise dans $fileErr
                $fileErr = "* Votre fichier doit être de type jpg, jpeg, gif ou png";

            }
        } else {
            //Si le fichier fait plus de 2.5 Mo on le precise dans $fileErr
            $fileErr = "* Le fichier ne doit pas faire plus de 2.5 Mo";

        }
    } else {
        //Si le fichier n'a pas ete envoye (pas de fichier ou erreur) on redemande l'input dans $fileErr
        $fileErr = "* Merci de choisir un fichier";
    }


    //VERIFICATION DE LA VALIDITE DE L'ENSEMBLE DES INFORMATIONS ENVOYEES
    if(($validPrice == true) AND ($validName == true) AND ($validFile == true)){
    //Si tous les champs sont valides apres la verification, on redirige l'utilisateur et les infos entrees sur la page 'displayArticle.php'

        session_start(); //Demarre une session et initialise la variable superglobale $_SESSION
        $_SESSION['articleName'] = $name; // Ces lignes ajoutent les valeurs des champs a la variable $_SESSION
        $_SESSION['articlePrice'] = $price;
        $_SESSION['pathToImg'] = $pathToImg;

        header('Location: displayArticle.php'); //Finalement, redirection de l'utilisateur sur displayArticle.php en changeant l'entete 'Location'
        //On stoppe par la suite l'execution du code de la page avec exit();
        exit();
    }

}
function test_input($data){ //Traitement de la chaine passee en parametre pour enlever toute partie inutile ou malicieuse

    $data = trim($data); // On enleve les caracteres invisibles en debut et fin de chaine $data
    $data = stripslashes($data); //On enleve les eventuels antislashs presents dans $data
    $data = htmlspecialchars($data);// On encode les eventuels caracteres HTML au lieu de les laisser tels quels
    return $data;
}
 ?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">

    </head>
    <body>
        <header>
            <h1 class="text-center">Ajouter un article</h1>
        </header>
        <div class="container">
            <div class="row d-flex justify-content-around">

<!-- La page s'envoie les infos a elle meme
On echappe les eventuels caracteres HTML lors de la recuperation du chemin du fichier depuis la variable $_SERVER["PHP_SELF"]

On precise egalement un attribut 'enctype' avec valeur 'multipart/form-data' afin de rendre possible l'envoie de fichiers
-->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" class="col-8">
                    <div class="form-group">
                        <label>
                            Nom de l'article
                            <input type="text" class="form-control" name="name">
                            <span class="error"><?= $nameErr ?> </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Prix de l'article
                            <input type="number" step="0.01" class="form-control" name="price">
                            <span class="error"><?= $priceErr ?> </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Choisir l'image
                            <input type="file" class="form-control-file" name="myFile">
                            <span class="error"><?= $fileErr ?> </span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </body>
</html>