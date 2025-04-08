<?php
    session_start();
    if(isset($_SESSION['error'])){
        echo"Invalid credentials, Redirection to Login Page...";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet"    
        href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title>login</title>
</head>
<body>
<div class="container">
        <form action="login.php" method="post">
        <div class="form-group">
            <label for="inputUserName">User Name</label>
            <input type="text" class="form-control" name="inputUserName" id="inputUserName" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password">
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your authentification data with anyone else.</small> <br>
        <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</body>
</html>
