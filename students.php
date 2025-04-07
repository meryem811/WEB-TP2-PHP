<?php
include "autoloader.php";
$bd=ConnexionBD::getInstance();

$query="select * from university_db.student ";
$response=$bd->query($query);
$students=$response->fetchAll(PDO::FETCH_OBJ);
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
    <title>Students</title>
</head>
<body>
    <div class="container">
        <div class="alert alert-info">
            <label> Students List</label> <br>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
            <tr>
                <th scope="row"><?=$student->id?></th>
                <th scope="row"><?=$student->name?></th>
                <td><?=$student->birthday?></td>
                <td >
                    <a href="détailsStudent.php?id= <?=$student->id?>" target="_blank">Détails</a>
                </td>
                <td></td>
                <!-- <td></td>
                <td</td> -->
            </tr>
            <?php endforeach?>
    </tbody>
    </table>
</body>
</html>