<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: http://localhost/module-connexion/connexion.php");
}
//créer une connexion
//$conn = new mysqli("localhost", "root", "", "moduleconnexion");
//connexionn DB on plesk
$conn = new mysqli("localhost", "CC_DBusers", "Nowayback13", "christophe-ceccaldi_moduleconnexion");

$login = $_SESSION['login'];

//var_dump($_POST);

if (isset($_POST['submit'])){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $sql = "UPDATE `utilisateurs` SET prenom = '$prenom', nom = '$nom', password = '$password' WHERE login = '$login'";
    $updated = $conn->query($sql);
    if ($updated) {
        echo "user info has been updated";
    } else {
        echo "user info could not be updated";
    }
    //var_dump($result);
}
    else
    {
    

        //vérifier que l'utilisateur possède un login ds la DB pour savoir si user enregistrer(query pour fetch_all DB)//
        //récupérer tout dans la DB
            $search = "SELECT * FROM utilisateurs WHERE login = '$login'";
            $query = $conn->query($search);
            $user = $query->fetch_array();
        //echo '<pre>';
        //var_dump($user);
        $prenom = $user['prenom'];
        $nom = $user['nom'];
        $login = $user['login'];
        $password = $user['password'];
        //$comfirm_password = $user['comfirm_password'];
        //echo '</pre>';
        //création variable validusser//
        //$dblogin = $users[0];
        
        
        //pour chaque utilisateurs qui possède un login autorisent les a modifier leurs profils//
        

    }

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

       

       <!--title uper of my form to midified user-->
        <h2>Modifier son profil</h2>
        <!--champs à remplir dans le formulaire pour modofoer son profil user avec post pour récupérer les infos-->
        <form method="post">
            <!--used of php in my input to field data of users who wa register in the DB yet-->
            <label>
                <span>Prenom</span>             
                <input type="text" id="prenom" name='prenom' value="<?php echo $prenom?>"/>
            </label>
            <!--used of php in my input to field data of users who wa register in the DB yet-->
            <label>
                <span>Nom</span>
                <input type="text" id="nom" name='nom' value="<?php echo $nom?>"/>
            </label>
            <!--used of php in my input to field data of users who wa register in the DB yet-->     
            <label>
                <span>Login</span>
                <input type="text" id="login" name='login' value="<?php echo $login?>" disabled/>
            </label>
            <!--used of php in my input to field data of users who wa register in the DB yet-->
            <label>
                <span>Password</span>
                <input type="password" id="password" name='password' minlength="3" required value ="<?php echo $password ?>"/>
            </label>
                <!--input of the submit button-->
                <input type="submit" id="button" name='submit'/>
            </form>
    </body>
</html>