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
    $query_filtrage = "select E.*, S.designation as section_name from platforme_db.`étudiant` E ,platforme_db.section S WHERE E.section=S.id";
    $params = [];

    if (!empty($search)) {
        $query_filtrage .=" and E.Name LIKE :search"; 
        $params[':search'] = "%$search%";
    }
    $preparation = $bd->prepare($query_filtrage);
    
    // try {
    //     $preparation->execute($params);
    // } catch (PDOException $e) {
    //     echo "Erreur SQL: " . $e->getMessage();
    // }
    $preparation->execute($params);
    $students= $preparation->fetchAll(PDO::FETCH_OBJ);
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
        
    <table id="tableStudent" class="display">
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
        <script>
        $(document).ready(function() {
        $('#tableStudent').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'csv', 'pdf'
        ]
        }); });
        </script>
    </div>
    
</body>
</html>