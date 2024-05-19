<?php
include_once("connexion.php");

if(isset($_POST['chauffeur_id']) && isset($_POST['course_id'])){
    $chauffeurId = $_POST['chauffeur_id'];
    $courseId = $_POST['course_id'];
    
    try {
        $updateReq = $connexion->prepare("UPDATE chauffeurs SET disponible = 0 WHERE chauffeur_id = ?");
        $updateReq->execute([$chauffeurId]);

        $updateCourseReq = $connexion->prepare("UPDATE courses SET chauffeur_id = ?, status = 'En cours' WHERE course_id = ?");
        $updateCourseReq->execute([$chauffeurId, $courseId]);

        echo "Mise à jour réussie";
    } catch(PDOException $e) {
        echo "Echec de la mise à jour : " . $e->getMessage();
    }
} else {
    echo "Données manquantes";
}
