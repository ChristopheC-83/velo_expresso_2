<?php


require_once("./controllers/functions.controller.php");
require_once("./models/visiteurs.model.php");
require_once("./models/administrateur.model.php");
// require_once("./controllers/images.controller.php");

function validation_login($login, $password)
{
    if (isCombinaisonValide($login, $password)) {

        $_SESSION['profil'] = [
            "login" => $login,
        ];
        $_SESSION['access'] = 
            "admin"
        ;
        ajouterMessageAlerte("Hello " . $login . " ! You're welcome !", "vert");
        header('location:' . URL . "admin/accueilAdmin");
    } else {
        ajouterMessageAlerte("Combinaison Login / Mot de passe non valide.", "rouge");
        header('location:' . URL . "accueil");
    }
}

function deconnexion()
{
    session_unset();
    header('location:' . URL . "accueil");
    ajouterMessageAlerte("Vous êtes bien déconnecté.", "vert");
}
function accueilAdmin()
{
    {

        $data_page = [
            "page_description" => "Accueil Administrateur",
            "page_title" => "Admin Accueil",
            "view" => "views/pages/administrateur/accueilAdmin.view.php",
            "template" => "views/commons/template.php",
        ];
        genererPage($data_page);
    }
}
