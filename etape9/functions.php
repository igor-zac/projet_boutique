<?php

include("quantites.php");



/*=====================================================================================================
fonction prenant en paramètre le nom de l'article, le nom du fichier jpg et l'entier correspondant au prix
la fonction se charge d'afficher les articles entrés au même format que les fonctions précédentes
====================================================================================================*/




function afficheArticles($array, $errTable,  bool $check, $selected_array){
    if(empty($array)){ ?>
        <p>Le panier est vide </p>
        <?php
    } else {
        foreach ($array as $key => $article) {

            $nom_fichier = $article['img'];
            $nom_article = $article['nom'];
            $prix = $article['prix'];
            $poids = $article['poids']/1000;
            ?>

            <div class="article">
                <div>
                    <img class="image_article" src="img/<?= $nom_fichier ?>" alt="L'image de mon article">
                </div>

                <div class="infosArticles">
                    <p class="nomArticle"><?= $nom_article ?></p>
                    <p class="poidsArticle">Poids : <?= $poids ?> kg</p>
                </div>

                <div class="prix">
                    <p><?= $prix ?> €</p>
                </div>

                <?php
                if ($check) { ?>
                    <div class="check">
                        <input type="checkbox" name="articles[]" value="<?= $key ?>"
                            <?php
                            if (in_array($key, $selected_array)) {
                                echo 'checked';
                            }
                            ?> >

                    </div>
                    <?php
                } else {
                    $quantite = $article['quantite'];
                    affichageQuantite($quantite, $errTable, $key);

                }
                ?>

            </div>

            <?php
        }
    }
}

function totalPanier($array): int{
    $total = 0;

    foreach($array as $article){
        $total += $article['prix'] * $article['quantite'];

    }

    return ($total);
}

function calculFraisPort($array, int $montantPanier): int {
    $total = 0;
    $frais = 0;

    foreach ($array as $article){
        $total += $article['poids'] * $article['quantite'];
    }

    if($total<=500){
       $frais = 5;
    } elseif ($total <= 2000){
        $frais = 0.1 * $montantPanier;
    }

    return ($frais);
}
?>

