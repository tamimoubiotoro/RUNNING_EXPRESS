<?php
session_start();

include("conbase.php");
if(isset($_SESSION['valid'])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="monstyle.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p> <a href=""> Logo </a></p>
        </div>

        <div class="right-links">
        <?php 
        
        $id= $_SESSION['Id'];
        $query= $connexion->prepare("SELECT*FORM users WHERE Id=$id");
        
        wihle($row=$result->fetch(PDO::FETCH_ASSOC)){
            $res_uname=$row['Username'];
            $res_email=$row['Email'];
            $res_age=$row['Age'];
            $res_id=$row['Id'];
        }
        
        echo "<a href='edit.php?Id=$res_id'> Change Profile</a>";
        ?>

            <a href=""> <button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>

        <div class="main-box top">
                <div class="top">
                        <div class="box">
                            <p>Hello <b>Ludiflex</b>, Welcome</p>
                        </div>
                        <div class="box">
                                <p>Your email is <b>123@gmail.com</b>.</p>
                            </div>
                    </div>
                    <div class="buttom">
                        <div class="box">
                            <p>And you are <b>20 years old</b>.</p>
                        </div>
        
                    </div>
        </div>

    </main>
</body>
</html>