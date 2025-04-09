<?php
   
    session_start();
    $_SESSION['message']="Déconnection avec succès!";
    session_unset();
    session_destroy();
    header("Location:index.php");
    exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title>Logout</title>
</head>
<body>
    
</body>
</html>
