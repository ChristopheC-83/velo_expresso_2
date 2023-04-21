<?php

// require_once ("./controllers/mainController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/visiteur/visiteur.model.php");
require_once("./controllers/functionController.controller.php");


function pageAccueil()
{
    $utilisateurs = getUtilisateurs();

    $data_page = [
        "page_description" => "Description accueil",
        "page_title" => "titre accueil",
        "view" => "views/pages/visiteur/accueil.view.php",
        "template" => "views/commons/template.php",
        "css" => "accueilContainer",
        "utilisateurs" => $utilisateurs,

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

function pageLogin()
{

    $data_page = [
        "page_description" => "Page de connexion au site",
        "page_title" => "Connexion",
        "view" => "views/pages/visiteur/login.view.php",
        "template" => "views/commons/template.php",
        "css" => "loginContainer",

    ];
    genererPage($data_page);
}
