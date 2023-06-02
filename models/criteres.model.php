<?php



require_once("./models/pdo.model.php");

function getInfosCriteres($critere, $nom_critere)
{
    $req = "SELECT * 
    FROM $critere
    ORDER BY $nom_critere
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $criteresItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $criteresItems;
}

function getNomColonnes($critere){
    $req = "SELECT COLUMN_NAME as nomColonne
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$critere'; 
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $nomColonnes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $nomColonnes;
}
