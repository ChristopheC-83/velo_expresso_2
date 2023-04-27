<?php

require_once("./controllers/images.controller.php");
require_once("./controllers/security.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/administrateur/administrateur.model.php");


function droits()
{
    $utilisateurs = getAllUsersInformation();
    
    $data_page = [
        "page_description" => "Gestion des droits des utilisateurs",
        "page_title" => "Gestion Droits",
        "view" => "views/pages/administrateur/gestion_droits.view.php",
        "template" => "views/commons/template.php",
        "css" => "droitsContainer",
        "utilisateurs" => $utilisateurs,

    ];
    genererPage($data_page);
}
