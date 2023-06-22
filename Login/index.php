<?php
session_start();
#This set the program to only allow access to user who have created account
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/bbc16bf572.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <!--BOOTSTRAP CDN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <title>Pet Allies</title>
    </head>
<body>
    <center>
        <h1>Hello</h1> 
        <?php 
            #This prints username along with the html code
            echo($_SESSION['username']);
        ?>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </center>
</body>
</html>