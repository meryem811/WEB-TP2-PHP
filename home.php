<?php
session_start();
if (!isset($_SESSION['user'])) {
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
    <title>Home</title>
</head>
<body>
    <?php include_once('Navbar.php');?>
    <div class="container">
        <div class="alert alert-success">
                <label> Welcome To Home Page!</label> <br>
        </div>
    </div>
</body>
</html>