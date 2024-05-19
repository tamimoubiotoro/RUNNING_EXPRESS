<?php 
include_once("connexion.php");

$depart = $_POST['depart'];
$arrivee = $_POST['arrivee'];
$date = $_POST['date'];

try {
    $req = $connexion->prepare("INSERT INTO courses (pointDepart, pointArrivee, dateHeure, chauffeur_id, status) VALUES (?, ?, ?, ?, ?)");
    
        $req->execute(array($depart, $arrivee, $date, '1','En attente'));

    echo "La course a été enregistré avec succès !";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

header("location:index.php");
