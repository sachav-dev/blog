<!-- (C) Volynsky Alexander 2021  

 Fichier de login

--> 
<?php
   include("config.php");
   session_start();

   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // Nom d'utilisateur et mot de passe envoyés depuis le formulaire (form) 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT nom, prenom FROM usagers WHERE username = ? AND password = ?";
    
      /* Crée une requête préparée */
      if ($stmt = mysqli_prepare($db,$sql)) {

          /* Lecture des marqueurs */
          mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);

          /* Exécution de la requête */
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
          $count = mysqli_num_rows($result);
          
          // Si le résultat correspond à $myusername et $mypassword, la ligne du tableau doit avoir une ligne
          if($count == 1) {
             $_SESSION['login_user'] = $myusername;
             
             header("Location: admin/index.php");
          }else {
             $error = "Votre nom d'utilisateur ou votre mot de passe n'est pas valide";
          }
    
      }

   }
?>
<!DOCTYPE html>
<html lang="fr">
   
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="Description" content="Le blog d'Alexandre Volynsky" />
      <meta name="author" content="Volynsky Alexander" />
      <meta name="theme-color" content="#317EFB" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Blog d'Alexander Volybsky | Page de connexion </title>
      <style>
         .center {
            margin: auto;
            width: 30%;
            padding: 10px;
         }

         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }

         .maindiv {
              width:300px;
              border: solid 1px #333333;
              text-align: center;
         }
      </style> 
   </head>
   
   <body>
	
      <div class = "center">
         <div class="maindiv">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "#" method = "post">
                  <label>UserName:&nbsp;</label><input type = "text" placeholder = "Saisir nom d'utilisateur" name = "username" class = "box"/><br /><br />
                  <label>Password:&nbsp;&nbsp;</label><input type = "password" placeholder = "Saisir le mot de passe" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Soumettre"/><br>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>