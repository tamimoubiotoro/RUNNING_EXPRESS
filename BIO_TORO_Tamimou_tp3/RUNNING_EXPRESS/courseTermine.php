<?php
include_once("connexion.php");

if(isset($_POST['chauffeur_id']) && isset($_POST['status'])){
    $chauffeurId = $_POST['chauffeur_id'];
    $status = $_POST['status'];
    
    try {
        $updateReq = $connexion->prepare("UPDATE chauffeurs SET disponible = 1 WHERE chauffeur_id = ?");
        $updateReq->execute([$chauffeurId]);

        $updateCourseReq = $connexion->prepare("UPDATE courses SET status = 'Terminée' WHERE status = ? AND chauffeur_id = ?");
        $updateCourseReq->execute([$status,$chauffeurId]);

        echo "Mise à jour réussie";
    } catch(PDOException $e) {
        echo "Echec de la mise à jour : " . $e->getMessage();
    }
} else {
    echo "Données manquantes";
}
