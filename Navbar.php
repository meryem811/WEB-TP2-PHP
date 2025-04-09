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
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Students Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="students.php">Liste des étudiants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sections.php">Liste des sections</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php" onclick="return confirm('Voulez-vous vraiment quitter la plateforme?')">log out</a>   
        </li>
        </ul>
    </div>
    </nav>
    </div>
</div>
</body>
</html>