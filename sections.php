<?php
include "autoloader.php";
$bd=ConnexionBD::getInstance();

$query="select section.* from platforme_db.section ";
$response=$bd->query($query);
$sections=$response->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title>Sections</title>
</head>
<body>
    <div class="container">
        <div class="alert alert-info">
            <label> Sections' List</label> <br>
        </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <table id="tableSections" class="dispplay">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Designation</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sections as $section): ?>
            <tr>
                <th scope="row"><?=$section->id?></th>
                <th scope="row"><?=$section->designation?></th>
                <td><?=$section->description?></td>
                <th scope="row">--</th>
                <!-- <td >
                    <a href="détailsStudent.php?id= <?=$student->id?>" target="_blank">Détails</a>
                </td> -->
            </tr>
            <?php endforeach?>
    </tbody>
    </table>
    <script>
    $(document).ready(function() {
        $('#tableSections').DataTable(); 
    });
    </script>
    </div>
</body>
</html>

