<?php

session_start();
if (isset($_SESSION['admin']) && (isset($_SESSION['loggedIn']))){

    if ($_SESSION['admin'] && $_SESSION['loggedIn']) {
    
        $conn = new mysqli("localhost", "root", "", "moduleconnexion");
        $search = "SELECT * FROM utilisateurs WHERE `login` != 'admin'";
        $query = $conn->query($search);
        $users = $query->fetch_all();
        
        echo '<pre>';
        var_dump($users);
        echo '</pre>';
    }
    elseif ($_SESSION['loggedIn'] === false){
        header("Location: http://localhost/module-connexion/connexion.php");
    }

} else {
    header("Location: http://localhost/module-connexion/connexion.php");
}
?>








<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
</body>
</html>