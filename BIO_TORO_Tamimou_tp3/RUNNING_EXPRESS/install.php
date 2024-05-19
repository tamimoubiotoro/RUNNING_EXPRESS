<?php 
include_once("connexion.php");

try{
    $sql = "
        CREATE TABLE IF NOT EXISTS chauffeurs(
            chauffeur_id INT AUTO_INCREMENT PRIMARY KEY,
            nom varchar(30),
            prenoms varchar(50),
            telephone BIGINT,
            sexe varchar(2),
            disponible BOOLEAN NOT NULL
        );

        CREATE TABLE IF NOT EXISTS courses(
            course_id INT AUTO_INCREMENT PRIMARY KEY,
            pointDepart varchar(100) NOT NULL,
            pointArrivee varchar(100) NOT NULL,
            dateHeure datetime NOT NULL,
            chauffeur_id INT,
            FOREIGN KEY (chauffeur_id) REFERENCES chauffeurs(chauffeur_id),
            status varchar(15) NOT NULL
        );
    ";
        $connexion->exec($sql);

    echo "La creation des tables a reussi";
}catch(PDOException $e){
    echo "La creation des tables a echoué. <br>".$e->getMessage();
}