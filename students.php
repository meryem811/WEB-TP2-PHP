<?php
include "autoloader.php";
$bd=ConnexionBD::getInstance();

$query="select étudiant.*,section.designation as section_name from  platforme_db.étudiant, platforme_db.section where  étudiant.section = section.id";
$response=$bd->query($query);
$students=$response->fetchAll(PDO::FETCH_OBJ);
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
            <label> Students' List</label> <br>
        </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Section</th>
            <th scope="col">Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
            <tr>
                <th scope="row"><?=$student->id?></th>
                <td>
                <img src="images/<?=$student->image?>" alt="<?=$student->Name?>" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                </td>
                <th scope="row"><?=$student->Name?></th>
                <td><?=$student->birthday?></td>
                <!-- <td>
                    <small> ?=$student->image?></small><br>
                    <img src="images/?=$student->image?>" width="60">
                </td> -->
                <th scope="row"><?=$student->section_name?></th>
                <td >
                    <a href="détailsStudent.php?id= <?=$student->id?>" target="_blank">Détails</a>
                </td>
                <!-- <td></td> -->
                <!-- <td></td>
                <td</td> -->
            </tr>
            <?php endforeach?>
    </tbody>
    </table>
    </div>
</body>
</html>