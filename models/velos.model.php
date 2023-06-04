<?php





require_once("./models/pdo.model.php");

function deleteDBVelo($id)
{
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

function getMarques()
{

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

function getVitesses()
{

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
function getCadre()
{

    $req = "SELECT * 
    FROM taille_cadres
    ORDER BY taille_cadre
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $cadre = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $cadre;
}
function getRoues()
{

    $req = "SELECT * 
    FROM taille_roues
    ORDER BY taille_roues
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $roues = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $roues;
}
function getTypeVelo()
{

    $req = "SELECT * 
    FROM type_velo
    ORDER BY type_velo
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $type_velo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $type_velo;
}
function getSuspension()
{

    $req = "SELECT * 
    FROM suspension
    ORDER BY suspension
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $suspension = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $suspension;
}

function createDBVelo($infoVelo)
{
    $req = "INSERT INTO velos (
    marque_id,
    modele,
    photo,
    electrique,
    prix,
    description,
    vitesses_id,
    taille_cadre_id,
    taille_roues_id,
    type_id,
    promo,
    vendu,
    suspension_id,
    neuf,
    message_perso
    ) VALUES (
    :marque_id,
    :modele,
    :photo,
    :electrique,
    :prix,
    :description,
    :vitesses_id,
    :taille_cadre_id,
    :taille_roues_id,
    :type_id,
    :promo,
    :vendu,
    :suspension_id,
    :neuf,
    :message_perso
    )
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':marque_id', $infoVelo['marque'], PDO::PARAM_INT);
    $stmt->bindValue(':modele', $infoVelo['modele'], PDO::PARAM_STR);
    $stmt->bindValue(':photo', $infoVelo['photo'], PDO::PARAM_STR);
    // $stmt->bindValue(':photo', "");
    $stmt->bindValue(':electrique', $infoVelo['electrique'], PDO::PARAM_INT);
    $stmt->bindValue(':prix', $infoVelo['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':description', $infoVelo['description'], PDO::PARAM_STR);
    $stmt->bindValue(':vitesses_id', $infoVelo['nb_vitesses'], PDO::PARAM_INT);
    $stmt->bindValue(':taille_cadre_id', $infoVelo['cadre'], PDO::PARAM_INT);
    $stmt->bindValue(':taille_roues_id', $infoVelo['roues'], PDO::PARAM_INT);
    $stmt->bindValue(':type_id', $infoVelo['type'], PDO::PARAM_INT);
    $stmt->bindValue(':promo', $infoVelo['promo'], PDO::PARAM_INT);
    $stmt->bindValue(':vendu', $infoVelo['vendu'], PDO::PARAM_INT);
    $stmt->bindValue(':suspension_id', $infoVelo['suspension'], PDO::PARAM_INT);
    $stmt->bindValue(':neuf', $infoVelo['neuf'], PDO::PARAM_INT);
    $stmt->bindValue(':message_perso', $infoVelo['message_perso'], PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}
function updateDBVelo($infoVelo)
{
    $req = "UPDATE velos set 
    marque_id = :marque_id,
    modele = :modele,
    photo = :photo,
    electrique = :electrique,
    prix = :prix,
    description = :description,
    vitesses_id = :vitesses_id,
    taille_cadre_id = :taille_cadre_id,
    taille_roues_id = :taille_roues_id,
    type_id = :type_id,
    promo = :promo,
    vendu = :vendu,
    suspension_id = :suspension_id,
    neuf = :neuf,
    message_perso = :message_perso
    WHERE velo_id = :velo_id
    
    ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':marque_id', $infoVelo['marque'], PDO::PARAM_INT);
    $stmt->bindValue(':modele', $infoVelo['modele'], PDO::PARAM_STR);
    $stmt->bindValue(':photo',$infoVelo['photo'], PDO::PARAM_STR);
    $stmt->bindValue(':electrique', $infoVelo['electrique'], PDO::PARAM_INT);
    $stmt->bindValue(':prix', $infoVelo['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':description', $infoVelo['description'], PDO::PARAM_STR);
    $stmt->bindValue(':vitesses_id', $infoVelo['nb_vitesses'], PDO::PARAM_INT);
    $stmt->bindValue(':taille_cadre_id', $infoVelo['cadre'], PDO::PARAM_INT);
    $stmt->bindValue(':taille_roues_id', $infoVelo['roues'], PDO::PARAM_INT);
    $stmt->bindValue(':type_id', $infoVelo['type'], PDO::PARAM_INT);
    $stmt->bindValue(':promo', $infoVelo['promo'], PDO::PARAM_INT);
    $stmt->bindValue(':vendu', $infoVelo['vendu'], PDO::PARAM_INT);
    $stmt->bindValue(':suspension_id', $infoVelo['suspension'], PDO::PARAM_INT);
    $stmt->bindValue(':neuf', $infoVelo['neuf'], PDO::PARAM_INT);
    $stmt->bindValue(':message_perso', $infoVelo['message_perso'], PDO::PARAM_STR);
    $stmt->bindValue(':velo_id', $infoVelo['velo_id'], PDO::PARAM_INT);
    $stmt->execute();
    $ModifOK = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $ModifOK;
}
