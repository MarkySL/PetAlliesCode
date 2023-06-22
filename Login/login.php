<?php
$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    include 'connection.php';
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "select * from `user` where username = '$username' and password ='$password'"; #This time we use the AND operator to check if both conditions are true
    $result = mysqli_query($con,$sql);

    if ($result) {
        $num = mysqli_num_rows($result); //This function counts the number of rows inside the database
        if ($num>0) {
            $login = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:index.php');
        } else {
           $invalid = 1;
        }
    }
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>Pet Allies</title>
    </head>
<body>
    <section class="container">
        <header>
            Registration Form
            <?php
                #This is a login success alert
                if ($login) {
                    echo '<div class="alert alert-success" role="alert">
                    Login Successfully!
                  </div>';
                }
            ?>
            <?php
                #This is an invalid login alert
                if ($invalid) {
                  echo '<div class="alert alert-danger" role="alert">
                       Invalid Username or Password
                    </div>';
                }
            ?>
        </header>
        <form action="login.php" class="form" method="POST">
            <!---------- Login Form  ---------->
            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username">
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <!---------- Submission Form -------->
            <label style="line-height:3.0;"><a href="#">Forgot password?</a></label>
            <button type="submit" name="login_btn">Login</button>
            <label style="line-height: 2.0;">Don't have an account? <a href="register.php">Register here</a></label>
        </form>
    </section>
    <!--Resubmission Form Error-->
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>