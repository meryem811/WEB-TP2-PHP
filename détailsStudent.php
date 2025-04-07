<?php
include "autoloader.php";
$bd=ConnexionBD::getInstance();
$id=$_GET['id'];
if (!isset($id)){
    header("Refresh:2; url=index.php");
    echo'<div class="alert alert-danger" role="alert">';
    echo"Verify the ID provided!";
    echo'</div>';
    exit;
}
$query="select * from university_db.student where id='$id'";
$response=$bd->query($query);
$student=$response->fetch(PDO::FETCH_OBJ);
if (!$student){
    echo "Student NOT found!";
    header("Refresh:2; url=index.php");
    exit;
}
// var_dump($students);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title>Détails Etudiant</title>
</head>
<body>
    <div class="container">
        <div class="alert alert-info">
            <h3>Studnet Details</h3>
        </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?=$student->name?></h5>
            <p class="card-text"><strong>Birthday:</strong> <?=$student->birthday?></p>
            <p class="card-text"><strong>id:</strong> <?=$student->id?></p>
        </div>
    </div>
    </div>

</body>
</html>