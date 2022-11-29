<?php
session_start();
$_SESSION['admin'] = false;
$_SESSION['loggedIn'] = false;

$validuser = false;
if (isset($_POST["login"]) && isset($_POST["password"])) {
  $validuser = true;
}

//if (isset($_POST))

if ($validuser) {
  $login = $_POST["login"];
  $password = $_POST["password"];


  $conn = new mysqli("localhost", "root", "", "moduleconnexion");
  $sql = "SELECT `login`, `password` FROM utilisateurs WHERE `login` = '$login' AND `password` = '$password'";

  if ($conn->query($sql)) {
    $_SESSION['loggedIn'] = true;

    if ($login === 'admin') {
      $_SESSION['admin'] = true;
      header("Location: http://localhost/module-connexion/admin.php");
    }else {
      header("Location: http://localhost/module-connexion/connexion.php");
    }

  }
}
?>


<!DOCTYPE html>
<html lang="FR">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>connexion</title>
  </head>
  <body>
   
        <thead>
            <th>login</th>
            <th>password</th>

        </thead>
        <tbody>
            <form method="post">
            <label>connexion</label>
            <input type="text" id="login" name='login'/>
            <input type="text" id="password" name='password' minlength="3" required/>
            <input type="submit" id="button" name='button'/>
        </tbody>
    </body>
</html>