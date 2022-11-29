
<?php
// Créer une conexion
    $conn = new mysqli("localhost", "root", "", "moduleconnexion");
    // verifier la connexion

    
  $search = "SELECT * FROM utilisateurs";
  $query = $conn->query($search);
  $users = $query->fetch_all();
   //echo '<pre>';
    //var_dump($users);
    //echo '</pre>';

     
  //créer les conditions pour remplir les champs
   
    if (isset($_POST['submit'])){ 
    }
    $mmuser = false;
    $validuser = false;

    foreach ($users as $user){
        $dbLogin = $user[1];
        $dbpassword = $user[4];
        if (isset($_POST['login']) && ($dbLogin == $_POST['login'])){
            $mmuser = true; 
        }
    }

    if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["comfirm_password"])) {
        $validuser = true;
    }


        //création variable
        
        
        if($validuser && !$mmuser){

            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $login = $_POST["login"];
            $password = $_POST["password"];
            $comfirm_password = $_POST["comfirm_password"];



            $sql = "INSERT INTO `utilisateurs` (prenom, nom, login, password) VALUES('$prenom', '$nom', '$login', '$password')";


            if ($conn->query($sql) === TRUE) {
                echo "les nouveaux enregistrements ajoutés avec succés";
                header("Location: http://module-connexion/connexion.php");
                die();
            } else {
                echo "Erreur: " . $sql . "
            " . $conn->error;
           
            }

        }
        
        $conn->close();
        
        
  
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
        <title>inscriptions</title>
  </head>
    <body class ="mama01">
        <table>
            <thead class ="son01">
                <th>prenom</th>
                <th>nom</th>
                <th>login</th>
                <th>password</th>
                <th>confirm password</th>
            </thead>
            
            <tbody>
                <form method="post">
                <label>inscriptions</label>
                <input type="text" id="prenom" name='prenom'/>
                <input type="text" id="nom" name='nom'/>
                <input type="text" id="login" name='login'/>
                <input type="password" id="password" name='password' minlength="3" required/>
                <input type="password" id="comfirm_password" name='comfirm_password' minlength="3" required/>
                <input type="submit" id="button" name='submit'/>
            </tbody>
        </table>
    </body>
</html>
    
      
           
    