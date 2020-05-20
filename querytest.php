


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
<h1>Auteurs de la BD</h1><br>


<?php
include "connexpdo.php";


$base='pgsql:dbname=citations;host=127.0.0.1;port=5432';
$user = 'postgres';
$password = 'isen2018';

$idcon = connexpdo($base,$user,$password);

$query1 = "SELECT * from auteur";
$query2 = "SELECT * from citation";
$query3 = "SELECT * from siecle";

$result1 = $idcon->query($query1);
$result2 = $idcon->query($query2);
$result3 = $idcon->query($query3);
echo '<table>';
echo '<tr>';
echo '<td>Prenom :</td><td>Nom :</td>';
echo '</tr>';
foreach($result1 as $data){
    echo '<tr>';
    echo'<td>'.$data['prenom'].'</td>'.'<td>'.$data['nom'].'</td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><h1>Citations de la BD</h1><br>';

foreach($result2 as $data){
    echo $data['phrase'];
    echo '<br>';
}

echo '<br><h1>Siecles de la BD</h1><br>';

foreach($result3 as $data){
    echo $data['numero'];
    echo '<br>';
}

?>
</body>
</html>
