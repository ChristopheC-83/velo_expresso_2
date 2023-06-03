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