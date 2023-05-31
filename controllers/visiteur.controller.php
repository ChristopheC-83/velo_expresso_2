<?php

require_once "./controllers/functions.controller.php";
require_once "./models/visiteurs.model.php";

function pageAccueil()
{

    $photos_slider = getPhotosSlider();

    $data_page = [
        "page_description" => "accueil d'un magasin de vélo dans la Vaunage, à Congénies, dans le Gard, entre Nîmes, Calvisson et Sommières.",
        "page_title" => "Vélo Expresso",
        "view" => "views/pages/visiteur/accueil.view.php",
        "template" => "views/commons/template.php",
        "photos_slider"=>$photos_slider,
    ];
    genererPage($data_page);
}

function pageErreur($msg)
{
    $data_page = [
        "page_description" => "Erreur !",
        "page_title" => "Erreur !",
        "view" => "views/pages/visiteur/erreur.view.php",
        "template" => "views/commons/template.php",
        "msg" => $msg,

    ];
    genererPage($data_page);
}


function pageVelos()
{
    $neufs =  getNeufs();

    $data_page = [
        "page_description" => "Les vélos neufs proposés par votre magasin de la vaunage, Congénies.",
        "page_title" => "VE _ Vélos Neufs",
        "view" => "views/pages/visiteur/velos.view.php",
        "template" => "views/commons/template.php",
        "neufs" => $neufs,
    ];
    genererPage($data_page);
}
function pageVelo($velo_id)
{
    $getVelo =  getVelo($velo_id);
    $velo=$getVelo[0];

    $data_page = [
        "page_description" => "Les caractérisques du " .$velo['marque']." ".$velo['modele'],
        "page_title" => "VE _ Vélo Détaillé",
        "view" => "views/pages/visiteur/velo.view.php",
        "template" => "views/commons/template.php",
        "velo" => $velo,
    ];
    genererPage($data_page);
}
function pageOccasions()
{
    $occasions =  getOccasions();

    $data_page = [
        "page_description" => "Les vélos d'occasion disponibles dans votre magasin de la vaunage, Congénies.",
        "page_title" => "VE _ Vélos Occasions",
        "view" => "views/pages/visiteur/occasions.view.php",
        "template" => "views/commons/template.php",
        "occasions" => $occasions,
    ];
    genererPage($data_page);
}
function pageLocation()
{

    $data_page = [
        "page_description" => "Les locations disponibles dans votre magasin de la vaunage, Congénies.",
        "page_title" => "VE _ Locations de vélos",
        "view" => "views/pages/visiteur/locations.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
function pageMecanique()
{

    $data_page = [
        "page_description" => "De la réparation la plus simple aux plus complexes.",
        "page_title" => "VE _ Entretetien vélos",
        "view" => "views/pages/visiteur/mecanique.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
function pageLogin()
{

    $data_page = [
        "page_description" => "De la réparation la plus simple aux plus complexes.",
        "page_title" => "VE _ Entretetien vélos",
        "view" => "views/pages/visiteur/login.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
function pageSorties()
{

    $data_page = [
        "page_description" => "Les sorties vtt dans la vaunage en groupe",
        "page_title" => "VE _ sorties vtt",
        "view" => "views/pages/visiteur/sorties.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
