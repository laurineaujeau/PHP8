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
        <input  class="form-control" name="auteurId">
    </div>
    <div class="form-group">
        <label>Nom de l'auteur</label>
        <input class="form-control" name="auteurNom">
    </div>
    <div class="form-group">
        <label>Prénom de l'auteur</label>
        <input class="form-control" name="auteurPrenom">
    </div>
    <div class="form-group">
        <label>ID du siècle</label>
        <input class="form-control" name="siecleId">
    </div>
    <div class="form-group">
        <label>siècle</label>
        <input class="form-control" name="siecle">
    </div>
    <div class="form-group">
        <label>Citation</label>
        <input class="form-control" name="citation">
    </div>
    <button class="btn btn-dark">Ajouter</button>
    <br><br>
    <?php
    error_reporting(E_ALL & ~E_NOTICE);

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
            if($data["id"] > $compteur){
                $compteur = $data["id"];
            }
        }
        $compteur = $compteur +1;
        $citation = $_POST['citation'];
        $auteurid = $_POST['auteurId'];
        $siecleid = $_POST['siecleId'];
        $query="INSERT INTO citation (id,phrase,auteurid,siecleid) VALUES(?,?,?,?)";
        $result = $idcon->prepare($query);
        $result->execute([$compteur,$citation,$auteurid,$siecleid]);


        $query1 = "SELECT * from auteur";
        $result1 = $idcon->query($query1);
        $auteurValid = true;
        foreach($result1 as $data){
            if($data['id']== $auteurid){
                $auteurValid = false;
            }
        }
        if($auteurValid){
            $nom =$_POST['auteurNom'];
            $prenom=$_POST['auteurPrenom'];
            $query2="INSERT INTO auteur (id,nom,prenom) VALUES(?,?,?)";
            $result2 = $idcon->prepare($query2);
            $result2->execute([$auteurid,$nom,$prenom]);
        }


        $query3 = "SELECT * from siecle";
        $result3 = $idcon->query($query3);
        $siecleValid = true;
        foreach($result3 as $data){
            if($data['id']== $siecleid){
                $siecleValid = false;
            }
        }
        if($siecleValid){
            $numero =$_POST['siecle'];
            $query6="INSERT INTO siecle (id,numero) VALUES(?,?)";
            $result6 = $idcon->prepare($query6);
            $result6->execute([$siecleid,$numero]);
        }



    }

$query9= "SELECT * from citation";
$result9 = $idcon->query($query9);
echo ' <h1>Suppression</h1>';
echo '<select class="custom-select" name="citationSuppr">';
echo '<option >-- ID citation --</option>';
foreach($result9 as $data2){
    echo '<option >'.$data2['id'].'</option>';

}
echo '</select>';
if(isset($_POST['citationSuppr'])){
    $query1 = "DELETE from citation WHERE id=?";
    $result1 = $idcon->prepare($query1);
    $result1->execute([$_POST['citationSuppr']]);
}

?>
    <br><br>
    <button type="submit" class="btn btn-dark">Supprimer</button>
</form>
</body>
</html>