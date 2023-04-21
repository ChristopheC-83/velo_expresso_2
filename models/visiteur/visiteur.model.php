<?php


require_once("./models/pdo.model.php");

function getUtilisateurs(){
    $req = getBDD()->prepare("SELECT * from user_management");
    $req -> execute();
    $datas = $req ->fetchAll(PDO::FETCH_ASSOC);
    $req -> closeCursor();
    return $datas;


}