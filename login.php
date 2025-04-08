<?php
    session_start();
    $username=$_POST['inputUserName'];
    $password=$_POST['exampleInputPassword1'];
    include "autoloader.php";
    $bd=ConnexionBD::getInstance();
    $query = $bd->prepare("SELECT * FROM utilisateur WHERE username =? AND password = ?");
    $query->execute([$username, $password]);
    $user = $query->fetch();
    if($user){
        $_SESSION['user'] = $user;
        header("Location: home.php");
        exit();
    }else {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title>Login</title>
</head>
<body>
</body>
</html>
