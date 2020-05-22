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
<h1>Rechercher une citation</h1><hr>
<form action="recherche.php" method="post">
<h4>Auteur :</h4>




<?php
include "connexpdo.php";

$base='pgsql:dbname=citations;host=127.0.0.1;port=5432';
$user = 'postgres';
$password = 'isen2018';

$idcon = connexpdo($base,$user,$password);

$query8= "SELECT * from auteur";
$result8 = $idcon->query($query8);
echo '<select class="custom-select" name="auteur">';
echo '<option >-- Auteur --</option>';
foreach($result8 as $data2){
    echo '<option>'.$data2['nom'].'</option>';

}
echo '</select>';

echo '<br><br><h4>Siècle :</h4>';
$query9= "SELECT * from siecle";
$result9 = $idcon->query($query9);
echo '<select class="custom-select" name="siecle">';
echo '<option >-- Siècle --</option>';
foreach($result9 as $data2){
    echo '<option >'.$data2['numero'].'</option>';

}
echo '</select>';
echo '<br><br><button type="submit" class="btn btn-primary">Rechercher</button><br><br>';


if (isset($_POST['auteur']) && isset($_POST['siecle'])) {
    $auteur = $_POST['auteur'];
    $siecle = $_POST['siecle'];
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col"> Citation </th>';
    echo '<th scope="col"> Auteur </th>';
    echo '<th scope="col"> Siecle </th>';
    echo '</tr>';
    echo '</thead>';

    $query = "SELECT id FROM siecle WHERE numero = '$siecle'";
    $result = $idcon->query($query);
    $siecleid = $result->fetch()['id'];
    $query1 = "SELECT id FROM auteur WHERE nom = '$auteur'";
    $result1 = $idcon->query($query1);
    $auteurid = $result1->fetch()['id'];

    $query2 = "SELECT phrase FROM citation WHERE auteurid = $auteurid and siecleid = $siecleid";
    $result2 = $idcon->query($query2);
    foreach ($result2 as $data) {
        echo '<tr>';
        echo '<td>' . $data ['phrase'] . '</td>';
        echo '<td>' . $auteur . '</td>';
        echo '<td>' . $siecle . '</td>';
        echo '</tr>';
    }

    echo '</table>';

}
?>

</form>
</body>
</html>