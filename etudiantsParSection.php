<?php
include "autoloader.php";
$bd = ConnexionBD::getInstance();

if (!isset($_GET['section_id'])) {
    echo "Section ID manquant.";
    exit();
}

$section_id = $_GET['section_id'];
$query = "SELECT étudiant.* , section.designation as section_name,section.description FROM platforme_db.étudiant, platforme_db.section WHERE étudiant.section= section.id AND section.id=:id ";
$reponse = $bd->prepare($query);
$reponse->execute([':id' => $section_id]);
$students = $reponse->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Étudiants de la section <?= htmlspecialchars($section_id) ?></title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Liste des étudiants de la section d'id #<?= htmlspecialchars($section_id) ?></h2>
        <!-- <ul class="list-group">
            ?php  ?>
                <li class="list-group-item">
                    <?= $etudiant->Name ?> <?= $etudiant->id ?>
                </li>
            ?php endforeach; ?>
        </ul> -->
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
            </tr>
            <?php endforeach?>
    </tbody>
    </table>
    </div>
</body>
</html>
