<?php

$names = ["Article 1", "Article 2", "Article 3"]; // Tableau contenant les noms des articles
$prix = [100, 400, 200]; //Tableau contenant les prix des articles
$img_name = ["article1.jpg", "article2.jpg", "article3.jpg"]; // Nom des différentes images

/*Boucle for itérant a travers $names et qui affecte le prix et l'image correspondant a l'article en fonction des
tableaux $prix et $img_name

Elle génère a chaque tour une div 'article' qui est de type flex, la disposition est mise en forme dans le fichier
style.css */

for($i = 0; $i<count($names); $i++) {
    print("<div class=\"article\" id='$i'>");
    print("<div><img class=\"image_article\" src=img/$img_name[$i] alt=\"L'image de mon article\"></div>");
    print("<h2>$names[$i]</h2>");
    print("<div class=\"prix\"> <p>$prix[$i] €</p> </div>");
    print("</div>");
}