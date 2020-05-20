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
<form>
    <div class="form-group">
        <label>ID de l'auteur</label>
        <input type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Nom de l'auteur</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Prénom de l'auteur</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>ID du siècle</label>
        <input type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>siècle</label>
        <input type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Citation</label>
        <input type="text" class="form-control">
    </div>
    <button type="submit" class="btn btn-dark">Ajouter</button>
    <br><br>
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