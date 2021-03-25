<!-- (C) Volynsky Alexander 2021  
*
* Fichier de configuration de connexion à la base de données 
*
* -->
<?php
// Définition des constantes 
 define('MYSQL_SERVER1', 'localhost');
 define('MYSQL_USER1', 'root');
 define('MYSQL_PASSWORD1','');
 define('MYSQL_DB1', 'blog');

 $db = mysqli_connect(MYSQL_SERVER1, MYSQL_USER1, MYSQL_PASSWORD1, MYSQL_DB1);
?>