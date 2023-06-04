<?php





require_once("./models/pdo.model.php");

function deleteDBVelo($id){
    $req = "DELETE from velos
    WHERE velo_id = :id
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;

}

function getMarques(){

    $req = "SELECT * 
    FROM marques
    ORDER BY marque
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $marques;
}
function getVitesses(){

    $req = "SELECT * 
    FROM nb_vitesses
    ORDER BY nb_vitesses
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $nb_vitesses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $nb_vitesses;
}