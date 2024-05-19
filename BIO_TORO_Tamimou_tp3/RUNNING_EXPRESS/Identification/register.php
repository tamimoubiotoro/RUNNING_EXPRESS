<?php
include_once("install.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/monstyle.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="form-box">

        <?php
        
        include("conbase.php");

        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $age=$_POST['age'];
            $password=$_POST['password'];

           /* $verify_query=mysqli_query($connexion, "SELECT Email FORM users WHERE Email='$email'");*/
            $verify_query=$connexion->prepare("SELECT Email FORM users WHERE Email='$email'");
            if(empty($verify_query)){
                echo " <div class='message'>
                        <p>This email is used, Try another one please!</p>
                        </div> <br> ";
                echo " <a href='javascript:self.history.back()'><button class='btn'>Go Back </button> ";
            }else{
               /* mysqli_query($connexion,"INSERT INTO users(Username,Email,Age,Password) VALUE('$username','$email','$age','$password')") or die("Error occured");*/
                $req=$connexion->prepare("INSERT INTO users(Username,Email,Age,Password) VALUE('$username','$email','$age','$password')") or die("Error occured");
                $req->execute(array('username','email','age','password'));
                echo " <div class='message'>
                        <p>Registretion successfully!</p>
                        </div> <br> ";
                echo " <a href='index.php'><button class='btn'>Login Now </button> ";
            }
        }else{
        
        ?>


            <header>Sign Up</header>
            <form action="" method="post" >
                    <div class="fild input">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" autocomplete="off" required >
                    </div>

                <div class="fild input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required >
                </div>

                <div class="fild input">
                    <label for="age">Âge</label>
                    <input type="number" name="age" id="age" autocomplete="off" required >
                </div>

                <div class="fild input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required >
                </div>

                <div class="fild">
                    <input type="submit" class="btn" name="submit" value="Login" required >
                </div>
                <div class="links">
                    Already a number? <a href="index.php">Sign Up</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>