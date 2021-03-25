<!-- (C) Volynsky Alexander 2021  
*
* Fichier de session. Ce fichier récupère le nom complet de l'utilisateur autorisé de la base de données. 
*
**-->  
<?php
   include('config.php');

   // Initialiser la session 
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT prenom, nom FROM usagers WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['prenom']." ".$row['nom'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location: ../login.php");;
      die();
   }
?>