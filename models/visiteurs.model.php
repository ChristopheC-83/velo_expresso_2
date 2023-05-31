<?php


require_once("./models/pdo.model.php");


function getNeufs()
{
    $req = "SELECT * 
    FROM velos
    inner join marques m on  m.marque_id = velos.marque_id
    inner join nb_vitesses v on velos.vitesses_id = v.vitesses_id
    inner join  taille_cadres tc on velos.taille_cadre_id = tc.taille_cadre_id
    inner join  taille_roues tr on velos.taille_roues_id = tr.taille_roues_id
    inner join  type_velo tyv on velos.type_id = tyv.type_id
    inner join  suspension s on velos.suspension_id = s.suspension_id    
    where neuf = 1";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $neufs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $neufs;
}
function getOccasions()
{
    $req = "SELECT * 
     FROM velos
    inner join marques m on  m.marque_id = velos.marque_id
    inner join nb_vitesses v on velos.vitesses_id = v.vitesses_id
    inner join  taille_cadres tc on velos.taille_cadre_id = tc.taille_cadre_id
    inner join  taille_roues tr on velos.taille_roues_id = tr.taille_roues_id
    inner join  type_velo tyv on velos.type_id = tyv.type_id
    inner join  suspension s on velos.suspension_id = s.suspension_id   
    where neuf = 0";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $occasions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $occasions;
}
function getVelo($velo_id)
{
    $req = "SELECT * 
     FROM velos
    inner join marques m on  m.marque_id = velos.marque_id
    inner join nb_vitesses v on velos.vitesses_id = v.vitesses_id
    inner join  taille_cadres tc on velos.taille_cadre_id = tc.taille_cadre_id
    inner join  taille_roues tr on velos.taille_roues_id = tr.taille_roues_id
    inner join  type_velo tyv on velos.type_id = tyv.type_id
    inner join  suspension s on velos.suspension_id = s.suspension_id   
    where velo_id = :velo_id";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":velo_id", $velo_id, PDO::PARAM_INT);
    $stmt->execute();
    $velo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $velo;
}
function getPhotosSlider()
{
    $req = "SELECT * FROM photos_slider_accueil";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $photos_slider = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $photos_slider;
}