<!-- (C) Volynsky Alexander 2021  
*
* C'est le point d'entrée.
*--> 

<?php
    //Nous connectons la base de données 
    require_once("database.php");
    
    //Nous connectons le fichier pour travailler avec des fonctions 
    require_once("models/articles.php");

    $link = db_connect ();

    //Nous appelons la fonction à partir du modèle et lui passons l'identifiant de l'article.   
    $article = articles_get($link, $_GET['id']);
    include("views/article.php");

    //Ferme de connexion 
    db_close();
?>