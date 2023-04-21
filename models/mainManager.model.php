<?php
// les modelsManager permettent la récupéretion, le traitement des données
// ils gèrent aussi la partie logique du site.

require_once("./models/pdo.model.php");


// fonction qui simule recup de datas.
//A effacer, ne sert que d'exemple
function getDataX(){
    $data=[
        "data1"=>"Données de la data1",
        "data2"=>"Données de la data2",
        "data3"=>"Données de la data3",
    ];
    return $data;

}

//Commande SQL à adapter au site en construction, au moins le nom de la table
function getDatas(){
    $req = getBDD()->prepare("SELECT * from bd_mvc");
    $req -> execute();
    $datas = $req ->fetchAll(PDO::FETCH_ASSOC);
    $req -> closeCursor();
    return $datas;


}



