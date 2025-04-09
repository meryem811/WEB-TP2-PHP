<?php
  session_start();
  if (!isset($_SESSION['user'])) {
      header("Location: index.php");
      exit();
  }
include "autoloader.php";
$bd=ConnexionBD::getInstance();
$query="select section.* from platforme_db.section ";
$response=$bd->query($query);
$sections1=$response->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections</title>
    
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
    <!-- icone filtrere -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <?php include_once('Navbar.php');?>
    <div class="container">
        <div class="alert alert-info">
            <label> Sections' List</label> <br>
        </div>
        <!-- form filtrage php -->
        <form action="FiltrageSection.php" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Filtrer par nom..." style="width: 200px ; " >
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Filtrer
                </button>
                <button type="button" class="btn btn-secondary">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </form>
        <!-- fin -->
    <table id="tableSections" class="display">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Designation</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sections1 as $section): ?>
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
    });
    });
    </script>
    </div>
</body>
</html>

