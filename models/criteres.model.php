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
function deleteDBCritereItem($table, $colonne, $id){
    $req = "DELETE from $table
    WHERE $colonne = :id
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}

function compterVelos($colonne, $id){
    $req = "SELECT count(*) as 'nbVelos' from velos
    WHERE $colonne = :id
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['nbVelos'];




}
