




<?php
function connexpdo($base, $user, $password)
{
    try {
        $dbh = new PDO($base, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
 return $dbh;
}

?>