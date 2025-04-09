<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }
    include "autoloader.php";
    $bd=ConnexionBD::getInstance();
    // Filtrage par nom PHP
    $search = $_GET['search'] ?? '';
    $query_filtrage = "select section.* FROM platforme_db.section";
    $params = [];

    if (!empty($search)) {
        $query_filtrage .= " WHERE (designation LIKE :search OR description LIKE :search)";
        $params[':search'] = "%$search%";
    }

    $preparation = $bd->prepare($query_filtrage);
    $preparation->execute($params);
    $sections= $preparation->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrage Appliqué</title>
    <!-- Bootstrap -->
   <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- DataTables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!-- pdfmake pour export PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
</head>
<body>
    <?php include_once('Navbar.php');?>
    <div class="container">
        <div class="alert alert-light">
            <label>Liste Après Filtrage</label> <br>
        </div>
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
                    <td>
                        <a href="etudiantsParSection.php?section_id=<?= $section->id ?>" title="Voir les étudiants">
                            <i class="bi bi-person-lines-fill"></i>
                        </a>
                    </td>

                    <!-- <td >
                        <a href="détailsStudent.php?id= ?=$student->id?>" target="_blank">Détails</a>
                    </td> -->
                </tr>
                <?php endforeach?>
        </tbody>
        </table>
        <script>
        $(document).ready(function() {
        $('#tableSections').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'csv', 'pdf'
    ]
    }); });
        </script>
    </div>
    
</body>
</html>


<!-- <link 
         rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->