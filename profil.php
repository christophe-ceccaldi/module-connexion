<?php
// Créer une conexion
    $conn = new mysqli("localhost", "root", "", "moduleconnexion");
//remplir les inputs de l'utilisateur existant//
//utiliser id de la DB pour savoir si user enregistrer
?>

<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="inscription.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>Modifier son profil</title>
  </head>
    <body class ="mama01">

        <!-- <table>
            <thead class ="son01">
                <th>prenom</th>
                <th>nom</th>
                <th>login</th>
                <th>password</th>
                <th>confirm password</th>
            </thead>
            
            <tbody>
                </tbody>
            </table> -->


        <h2>Modifier son profil</h2>

        <form method="post">
            <label>
                <span>Prenom</span>             
                <input type="text" id="prenom" name='prenom'/>
            </label>
            
            <label>
                <span>Nom</span>
                <input type="text" id="nom" name='nom'/>
            </label>

            <label>
                <span>Login</span>
                <input type="text" id="login" name='login'/>
            </label>
            
            <label>
                <span>Password</span>
                <input type="password" id="password" name='password' minlength="3" required/>
            </label>

            <label>
                <span>Comfirmpassword</span>
                <input type="password" id="comfirm_password" name='comfirm_password' minlength="3" required/>
            </label>
                <input type="submit" id="button" name='submit'/>
            </form>
    </body>
</html>