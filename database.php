<!-- (C) Volynsky Alexander 2021  
*
* Ce fichier implémente une connexion à la base de données 
*--> 

<?php
//Définition des constantes 
define('MYSQL_SERVER', 'localhost');
define( 'MYSQL_USER', 'root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB', 'blog');

/**
* La fonction d'ouverture de connexion 
*/
function db_connect() {
    // Crée un descripteur 
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die("Erreur ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8"))
        printf("Erreur: ".mysqli_error($link));

    if(!$link)
    {
        trigger_error("Erreur de connexion : " . mysqli_connect_error());
    }
   
    // renvoie le descripteur 
    return  $link;
}

/**
* La fonction de fermeture de connexion 
*/
function db_close() {
    global $link;
    mysqli_close($link);
}

?>