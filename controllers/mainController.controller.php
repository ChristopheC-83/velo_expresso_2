<?php
//mainController peut être fait en POO mais ce n'est pas une obligation
// ici, nous sommes en procédural


// mainController répertorie les pages avec leurs infos respectives



require_once("./controllers/functionController.controller.php");
require_once("./models/mainManager.model.php");


function pageAccueil()
{
    // Exemple de message d'alerte
    // ajouterMessageAlerte("message test", "rouge");
    // ajouterMessageAlerte("message test2", "orange");

    // avec extract de genererPage
    //la variable $variable_de_demo aura la valeur "demo de variable"
    // génial non !?!
    
    $data_page = [
        "page_description" => "Description accueil",
        "page_title" => "titre accueil",
        "view" => "views/pages/public/accueil.view.php",
        // on met un template variable au cas où une page en necessiterait un différent
        "template" => "views/commons/template.php",
        "css"=>"accueilContainer",
        "variable_de_demo" => "demo de variable",

    ];
    genererPage($data_page);
}
function pageErreur($msg)
{

    $data_page = [
        "page_description" => "Erreur !",
        "page_title" => "Erreur !",
        "view" => "views/pages/public/erreur.view.php",
        "template" => "views/commons/template.php",
        "msg" => $msg,

    ];
    genererPage($data_page);
}
function page1()
{
    //exemple de message d'alerte
    // $_SESSION['alert']=[
    //     "message"=> "exemple de message d'alerte pour page1",
    //     "type"=> "alerteVerte",
    // ];

    //on récupère les datas de mainManager, function getDataX()
    $datas = getDataX();

    $data_page = [
        "page_description" => "Description Page 1",
        "page_title" => "titre page 1",
        "view" => "views/pages/public/page1.view.php",
        "template" => "views/commons/template.php",
        "datas" => $datas,

    ];
    genererPage($data_page);
}
function page2()
{
    
    
    //on récupère les datas de mainManager, function getDatas()
    $datas = getDatas();
    
    $data_page = [
        "page_description" => "Description Page 2",
        "page_title" => "titre page 2",
        "view" => "views/pages/public/page2.view.php",
        "template" => "views/commons/template.php",
        "datas" => $datas,


    ];
    genererPage($data_page);
}
function page3()
{
    $data_page = [
        "page_description" => "Description Page 3",
        "page_title" => "titre page 3",
        "view" => "views/pages/public/page3.view.php",
        "template" => "views/commons/template.php"

    ];
    genererPage($data_page);
}
