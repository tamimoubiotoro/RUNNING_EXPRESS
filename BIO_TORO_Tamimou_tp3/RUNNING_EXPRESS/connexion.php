<?php 
$server ="localhost";
$user = "root";
$password = "";
$db = "rapido";

try{
    $connexion = new PDO("mysql:server=$server;dbname=$db", $user, $password);
}catch(PDOException $e){
    echo 'La connexion a echoué <br>'.$e->getMessage();
}