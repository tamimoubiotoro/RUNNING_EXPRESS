<?php 
include_once("connexion.php");

try {

    $chauffeurs = $connexion->prepare("INSERT INTO chauffeurs (nom, prenoms, telephone, sexe, disponible)
    VALUES (?, ?, ?, ?, ?)");

    $insererChauffeur = array(
        array('', '', '0', '', '1'),
        array('ADE', 'Eli', '53041691', 'M', '1'),
        array('KPA', 'Morel', '58169247', 'M', '1'),
        array('OBE', 'Orens', '40563978', 'M', '1'),
        array('LOTSU', 'RIck', '96458712', 'M', '1'),
        array('AITON', 'Didier', '5341578', 'M', '1'),
        array('ABALO', 'Claude', '55405569', 'M', '1'),
        array('SEFAN', 'Gwladys', '40557644', 'F', '1'),
        array('OKERE', 'Rafiatou', '97841133', 'F', '1'),
        array('MINKI', 'Chancelle', '5121478', 'F', '1'),
        array('AIKOUN', 'Dingue', '63847922', 'M', '1')
    );

    foreach ($insererChauffeur as $chauffeur) {
        $chauffeurs->execute($chauffeur);
    }
    echo "Insertions des 10 chauffeur reussi";

} catch (PDOException $e) {
    echo "L'insertion a echoue" . $e->getMessage();
}