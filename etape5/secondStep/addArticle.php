
<?php
$validName = $validPrice = $validFile = false;
$nameErr = $priceErr = $fileErr = "";
$Titre = 'Ajouter un article';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "* Merci de renseigner le nom de l'article";
    } else {
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            $nameErr = "* Merci de ne mettre que des lettres et des espaces";
        } else {
            $validName = true;
        }
    }

    if(empty($_POST["price"])){
        $priceErr = "* Merci de renseigner un prix pour l'article";
    } else {
        $price = $_POST["price"];
        if($price <= 0){
            $priceErr = "* Merci de renseigner un prix supérieur à 0";
        } else {
            $validPrice = true;
        }
    }

    if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0){
        if($_FILES['myFile']['size'] <= 2500000){
            $fileInfo = pathinfo($_FILES['myFile']['name']);
            $uploadExtension = $fileInfo['extension'];
            $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
            if(in_array($uploadExtension, $allowedExtensions)){
                if ($validName AND $validPrice) {
                    $pathToImg = 'uploads/' . basename($_FILES['myFile']['name']);
                    move_uploaded_file($_FILES['myFile']['tmp_name'], $pathToImg);
                }
                $validFile = true;

            } else {
                $fileErr = "* Votre fichier doit être de type jpg, jpeg, gif ou png";
            }
        } else {
            $fileErr = "* Le fichier ne doit pas faire plus de 2.5 Mo";
        }
    } else {
        $fileErr = "* Merci de choisir un fichier";
    }
    $Titre = "J'ai essayé d'envoyer un truc";



    if(($validPrice == true) AND ($validName == true) AND ($validFile == true)){
        var_dump($name);
        var_dump($pathToImg);
        var_dump($price);
        $Titre = "J'ai essayé d'envoyer un truc";
        session_start();
        $_SESSION['articleName'] = $name;
        $_SESSION['articlePrice'] = $price;
        $_SESSION['pathToImg'] = $pathToImg;

        header('Location: displayArticle.php');
        exit();
    }

}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
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
            <h1 class="text-center"><?= $Titre ?></h1>
        </header>
        <div class="container">
            <div class="row d-flex justify-content-around">

        <!-- Inclus le fichier functions.php et appelle ses fonctions pour générer les blocs article de la page -->
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