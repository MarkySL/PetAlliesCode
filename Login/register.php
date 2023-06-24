<?php
$success = 0;
$user = 0;


if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    include 'connection.php';
    
    $client = mysqli_real_escape_string($con,$_POST['client']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($password); #Hashing the password for better security
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $p_name = mysqli_real_escape_string($con, $_POST['p_name']);
    $p_gender = mysqli_real_escape_string($con,$_POST['p_gender']);
    $species = mysqli_real_escape_string($con,$_POST['species']);
    $p_bday = mysqli_real_escape_string($con,$_POST['p_bday']);
    $breed = mysqli_real_escape_string($con,$_POST['breed']);
    $colmarks = mysqli_real_escape_string($con,$_POST['colmarks']);
    

    $sql = "select * from `user` where username = '$username'";
    $result = mysqli_query($con,$sql);

    if ($result) {
        $num = mysqli_num_rows($result); //This function counts the number of rows inside the database
        if ($num>0) {
            $user=1; /* If the number of user is greater than 0 and that username is stored 2 times it will print this */ //passing variable name with value
        } else {
           /*This will insert data in the DB*/
            $sql = "insert into `user` (client,username,email,password,phone,address,p_name,p_gender,species,p_bday,breed,colmarks,timestamp) VALUES ('$client','$username','$email','$password','$phone','$address','$p_name','$p_gender','$species','$p_bday','$breed','$colmarks',NOW())";

            $result = mysqli_query($con, $sql);

            if ($result) {
                $success=1; //passing variable name with value
            } else {
                die("Registration Failed!");
            }
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
        <!--FONTAWESOME-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <!--BOOSTRAP CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>Pet Allies</title>
    </head>
<body>
    <section class="container">
        <header>
            Registration Form
            <?php
                #This is an error alert
                if ($user) {
                    echo '<div class="alert alert-danger" role="alert">
                        Username Already Exist!
                    </div>';
                }
            ?>
            <?php
                #This is a success alert
                if ($success) {
                    echo '<div class="alert alert-success" role="alert">
                    Registration Successful
                  </div>';
                }
            ?>
        </header>
        <form action="register.php" class="form" method="POST">
            <!---------- Input Box  ---------->
            <div class="input-box">
                <label>Owner</label>
                <input type="text" name="client" placeholder="Enter your full name" required>
            </div>
            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Create username" required>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="input-box">
                <label>Phone Number</label>
                <input type="number" name="phone" placeholder="Enter your Phone Number">
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter your Address">
            </div>
            <div class="input-box">
                <label>Pet Name</label>
                <input type="text" name="p_name" placeholder="Enter your Pet's Name">
            </div>
            <!---------- Gender Box ---------->
            <div class="sex-box">
                <h3>Pet Gender</h3>
                <div class="sex-option">
                    <div class="sex">
                        <input type="radio" value="Male" name="p_gender" required/>
                        <label for="check">Male</label>
                    </div>
                    <div class="sex">
                        <input type="radio" value="Female" name="p_gender" required/>
                        <label for="check">Female</label>
                    </div>
                </div>
            </div>
            <!---------- Input Box Column Div ---------->
            <div class="column">
                <div class="input-box">
                    <label>Species</label>
                    <input type="text" name="species" placeholder="Species" required>
                </div>
                <div class="input-box">
                    <label>Pet Birthday</label>
                    <input type="date" name="p_bday" required>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Breed</label>
                    <input type="text" name="breed" placeholder="Breed" required>
                </div>
                <div class="input-box">
                    <label>Color Markings</label>
                    <input type="text" name="colmarks" placeholder="Color Markings" required>
                </div>
            </div>

            <label >Already Registered? <a href="login.php">Login</a></label>
            <!--Submission-->
            <button type="submit" name="register_btn">Create Account</button>
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