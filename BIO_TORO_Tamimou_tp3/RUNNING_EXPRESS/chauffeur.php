<?php 
include_once("connexion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/img2.jpg" type="image/x-icon">
    <title>Affecter chauffeur</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="background-image-full">
    <header>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-3 col-7">
                    <div class="logo d-flex">
                        <img class="me-3" src="./img/img2.jpg" alt="RUNNING" width="60px">
                        <h2 class="pt-1 "><a href="index.php" class="text-warning">RUNNING</a></h2>
                    </div>
                </div>

                <div class="col-md-9 col-5">
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" id="boutton">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menu">
                            <ul class="navg navbar-nav">
                                <li class="nav-item"><a class="nav-link text-warning" href="index.php">Acceuil</a></li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-warning" data-bs-toggle="dropdown" href="#">Nos services</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html" class="dropdown-item text-warning">Ajouter une course</a></li>
                                        <li><a href="chauffeur.php" class="dropdown-item text-warning">Affecter un chauffeur</a></li>
                                        <li><a href="termine.php" class="dropdown-item text-warning">Terminer votre course</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link text-warning" href="course.php">Nos courses</a></li>
                                <li class="nav-item"><a class="nav-link text-warning" href="contacts.html">Contacts</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>          
        </div>
    </header>

    <section>
        <div class="container">
            <h2 class="text-light">NOS COURSES EN ATTENTE</h2>
            <table class="tables">
                <thead>
                    <tr>
                        <td>N° de course</td>
                        <td>Point de départ</td>
                        <td>Point d'arrivée</td>
                        <td>Date et heure</td>
                        <td>Chauffeur affecté</td>
                        <td>Status de la course</td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    try{
                        $req = $connexion->prepare("SELECT * FROM courses WHERE status='En attente'");
                        $req->execute();
                        $courses = $req->fetchAll();

                        $req2 = $connexion->prepare("SELECT chauffeur_id, nom, prenoms FROM chauffeurs WHERE disponible='1'");
                        $req2->execute();
                        $chauffeurDispo = $req2->fetchAll();

                        foreach($courses as $course){
                            echo '<tr>
                                    <td>'.$course['course_id'].'</td>
                                    <td>'.$course['pointDepart'].'</td>
                                    <td>'.$course['pointArrivee'].'</td>
                                    <td>'.$course['dateHeure'].'</td>
                                    <td class="monTd">
                                        <select class="chauffDispo" name="chauffDispo">
                                    ';
                            foreach($chauffeurDispo as $chauff){
                                    echo '
                                        <option value="'.$chauff['chauffeur_id'].'">'.$chauff['nom'].' '.$chauff['prenoms'].'</option>
                                        ';
                            }
                            echo '</select>
                                        </td>
                                        <td class="status">'.$course['status'].'</td>
                                    </tr>
                                 ';
                        }
                        
                    }catch(PDOException $e){
                        echo 'Echec <br>'.$e->getMessage();
                    }

                    
                   ?>
                </tbody>
            </table>
            <div class="lien">
                <a href="course.php" class="text-warning">Voir les courses en cours</a>
            </div>
        </div>
    </section>
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>