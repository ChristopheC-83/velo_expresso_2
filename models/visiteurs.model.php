<?php


require_once("./models/pdo.model.php");


function getNeufs()
{
    $req = "SELECT * FROM neufs";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $neufs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $neufs;
}
function getOccasions()
{
    $req = "SELECT * FROM occasions";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $occasions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $occasions;
}