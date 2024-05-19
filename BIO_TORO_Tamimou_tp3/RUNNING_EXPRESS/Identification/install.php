<?php 
include_once("conbase.php");

try{
    $sql = "
        CREATE TABLE IF NOT EXISTS users(
            Id int PRIMARY KEY AUTO_INCREMENT,
            Username varchar(200),
            Email varchar(200),
            Age int,
            Password varchar(200)
        );
    ";
        $connexion->exec($sql);

    echo "La creation des tables a reussi";
}catch(PDOException $e){
    echo "La creation des tables a echoué. <br>".$e->getMessage();
}