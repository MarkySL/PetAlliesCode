<?php

include 'connection.php';
#Reset Password
if (isset($_REQUEST['reset_pass'])) {
    
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $check_email = "select email from `user` where email = '$email'"; #it checks the db for email where it can send na verification code
    $check_email_query = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_query)>0) 
    {
        $msg = '<div>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <br>
        <p><button class="btn btn-primary"><a href="localhost:8080/PetAlliesCode/Login/reset_pass.php?secret='.base64_encode($email).'"Reset Password</a></button></p>
        <br>
        </div>';

        #Code for Sending verification to email or PHPMailer
        include_once("../Login/Mail/class.phpmailer.php");
        $email = "$email";
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = "";
        $mail->Password = "";
        $mail->FromName = "";
        $mail->addAddress($email);
        $mail->Subject = "Reset Password";
        $mail->isHTML(true);
        $mail->Body = "$msg";
        if ($mail->send()) {
            $msg = "We have e-mailed your password reset link";
        } else {
            $msg = "We cannot find a user with that email address";
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
            Reset Password
        </header>
        <form action="#" class="form" method="POST">
            <!---------- Login Form  ---------->
            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Email Address">
            </div>
            <div>
                <button type="submit" name="reset_pass" class="btn btn-primary">Reset Password</button>
                <button type="submit" class="btn btn-primary"><a href="login.php">Cancel</a></button>
            </div>
            
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