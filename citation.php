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
<?php
include "connexpdo.php";

$base='pgsql:dbname=citations;host=127.0.0.1;port=5432';
$user = 'postgres';
$password = 'isen2018';

$idcon = connexpdo($base,$user,$password);

echo '<h1>La citation du jour</h1><hr>';
$query4 = "SELECT * from citation";
$result4 = $idcon->query($query4);
$compteur =0;
/*if ($result4){
    echo $compteur;
}*/
foreach($result4 as $data){
    $compteur = $compteur +1;
}
echo 'Il y a <strong>'.$compteur.'</strong> citations répertoriées.';
echo '<br>';
echo 'Et en voici une générée aléatoirement :';
echo '<br>';
$alea = rand (1,$compteur);
//echo $alea;
/*if ($result4 ){
    //echo $result4; ne fonctionne pas
    //echo $result4->fetch() ; fontionne mais n'affiche rien
    echo $alea;
}*/
$query5 = "SELECT * from citation";
$result5 = $idcon->query($query5);
foreach($result5 as $data){
    if($alea == $data['id']){
        echo '<strong>';
        echo $data['phrase'];
        echo '</strong><br>';
        $query6 = "SELECT * from auteur";
        $result6 = $idcon->query($query6);
        foreach($result6 as $data2){
            //echo "tu es dans la boucle 2";
            //echo '<br>';
            if($data['auteurid'] == $data2['id']){
                //echo "tu es dans le if";
                //echo '<br>';
                echo $data2['prenom']." ".$data2['nom']." ";

            }

        }
        $query7 = "SELECT * from siecle";
        $result7 = $idcon->query($query7);
        foreach($result7 as $data2) {
            //echo "tu es dans la boucle 2";
            //echo '<br>';
            if ($data['siecleid'] == $data2['id']) {
                //echo "tu es dans le if";
                //echo '<br>';
                echo "(" . $data2['numero'] . " ème siècle)";

            }
        }
    }
}
/*while($data = $result4->fetch()){
    echo $data['id'];
    echo $alea;
    if($alea == $data['id']){
        echo '<strong>';
        echo $data['phrase'];
        echo '</strong><br>';
    }
}*/

?>
</body>
</html>

