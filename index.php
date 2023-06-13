<!--THIS IS A SUCCESS REGISTRATION FORM WHICH ONLY NEEDS FURTHER MANIPULATION OF DATAS-->
<?php
include 'dbcon.php';

if (isset($_POST['submit_btn'])) 
{
    $fname = $_POST["full_name"];
    $uname = $_POST["username"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $c_pass = $_POST["c_pass"];

    $query = "INSERT INTO user (full_name,username,gender,password,c_pass) VALUES ('$fname','$uname','$gender','$password','$c_pass')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Registration Successful";
    } else {
        echo "Registration Failed";
        header("location:index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Dashboard</title>
</head>
<body>
    <div class="form_reg">
        <form action="#" method="post">
            <!--Title Form-->
            <div class="container">
                <center><h1>Simple Registration Form</h1></center>
            </div>
            <hr>
            <!--Name-->
            <input type="text" name="full_name" placeholder="Enter your name">
            <input type="text" name="username" placeholder="Create username">

            <!--Gender-->
            <input type="radio" value="Male" name="gender" checked > Male   
            <input type="radio" value="Female" name="gender"> Female
            
            <!--Password-->
            <input type="password" name="password" placeholder="Create password">
            <input type="password" name="c_pass" placeholder="Confirm password">

            <!--Submission-->
            <button type="submit" name="submit_btn" class="registerbtn">Create Account</button>

        </form>
    </div>
</body>
</html>