<?php


require_once("./models/pdo.model.php");

function getAllUsersInformation()
{
    $req = "SELECT * FROM user_management";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;
}