<?php 
require_once 'etudiant.php';
$etudiants=[
    new etudiant("Aymen", [11,13,18,7,10,13,2,5,1]),
    new etudiant("Skander", [15,9,8,16])];

include 'session.php';

$session = new sessionmanager();
$session->start();
$session->incrementvisitcount();

if (isset($_POST['reset_session'])) {
    $session->reset();
    //header('Location: ' . $_SERVER['PHP_SELF']);
    //exit();
}
$message = $session->message();
?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des étudiants</title>
    </head> 
    <body>
        <form method="POST">
            <button type="submit" name="reset_session">Réinitialiser la session</button>
        </form>
        
        <h1><?php echo $message; ?></h1>
        <h1>Résultats des étudiants</h1>
        <?php
         foreach ($etudiants as $etudiant) {
             $etudiant->afficheres();
             echo "<hr>";
            }
        ?>
        </body> 
        </html>
        