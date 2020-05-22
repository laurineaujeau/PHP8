<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="citation.php">Informations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>
</nav>
<h1>Ajout</h1>
<form action="modification.php" method="post">
    <div class="form-group">
        <label>ID de l'auteur</label>
        <input type="number" class="form-control" name="auteurId">
    </div>
    <div class="form-group">
        <label>Nom de l'auteur</label>
        <input type="text" class="form-control" name="auteurNom">
    </div>
    <div class="form-group">
        <label>Prénom de l'auteur</label>
        <input type="text" class="form-control" name="auteurPrenom">
    </div>
    <div class="form-group">
        <label>ID du siècle</label>
        <input type="number" class="form-control" name="siecleId">
    </div>
    <div class="form-group">
        <label>siècle</label>
        <input type="number" class="form-control" name="siecle">
    </div>
    <div class="form-group">
        <label>Citation</label>
        <input type="text" class="form-control" name="citation">
    </div>
    <button type="submit" class="btn btn-dark">Ajouter</button>
    <br><br>
    <?php
    include "connexpdo.php";

    $base='pgsql:dbname=citations;host=127.0.0.1;port=5432';
    $user = 'postgres';
    $password = 'isen2018';

    $idcon = connexpdo($base,$user,$password);

    if (isset($_POST['auteurId']) && isset($_POST['siecle']) && isset($_POST['auteurNom']) && isset($_POST['auteurPrenom'])  && isset($_POST['siecleId'])  && isset($_POST['citation'])){
        $query4 = "SELECT * from citation";
        $result4 = $idcon->query($query4);
        $compteur =0;
        foreach($result4 as $data){
            $compteur = $compteur +1;
        }
        $compteur = $compteur +1;
        //echo $compteur;
        $citation = $_POST['citation'];
        //echo $citation;
        //var_dump($_POST['citation']);
        $auteurid = $_POST['auteurId'];
        //echo $auteurid;
        //var_dump($_POST['auteurId']);
        $siecleid = $_POST['siecleId'];
        //echo $siecle;
        //var_dump($_POST['siecleId']);
        $query="INSERT INTO citation (id,phrase,auteurid,siecleid) VALUES(?,?,?,?)";
        $result = $idcon->prepare($query);
        if($result){
            echo "result";
        }
       // $result->execute([$compteur,$citation,$auteurid,$siecleid]);
        $result->execute(array($compteur,$_POST['citation'],$_POST['auteurId'],$_POST['siecleId']));
        //var_dump($result);

       /* $query5 = "INSERT INTO citation (id,phrase,auteurid,siecleid) VALUES ($compteur,$citation,$auteurid,$siecleid)";
        if ($idcon->query($query5)) {
            echo "New record created successfully";
        } else {
            var_dump($query5);
            echo "Error: " . $query5 . "<br>" . $idcon->error;
        }*/
        /*$query5 = "INSERT INTO citation(id,phrase,auteurid,siecleid) VALUES($compteur,$citation,$auteurid,$siecle)";
        $idcon->prepare($query5);
        $idcon->execute();*/
       /* $idcon->prepare("INSERT INTO citation(id,phrase,auteurid,siecleid) VALUES(?,?,?,?)");
        $idcon->execute(array($compteur,$_POST['citation'],$_POST['auteurId'],$_POST['siecleId']));*/
        echo "citation ";
       /* $idcon->prepare("INSERT INTO auteur(id,nom,prenom) VALUES(?,?,?)");
        $idcon->execute(array($_POST['auteurId'],$_POST['auteurNom'],$_POST['auteurPrenom']));
        echo "auteur";
        $idcon->prepare("INSERT INTO siecle(id,numero) VALUES(?,?)");
        $idcon->execute(array($_POST['siecleId'],$_POST['siecle']));
        echo "siecle";*/
    }
    ?>
    <h1>Suppression</h1>
    <select class="custom-select">
        <option selected>-- Sélectionner l'ID d'une citation --</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <br><br>
    <button type="submit" class="btn btn-dark">Supprimer</button>
</form>
<?php

?>
</body>
</html>