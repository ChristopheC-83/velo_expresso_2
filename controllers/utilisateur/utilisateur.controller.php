<?php


require_once("./controllers/functionController.controller.php");
require_once("./models/visiteur/visiteur.model.php");
require_once("./models/utilisateur/utilisateur.model.php");
require_once("./controllers/functionController.controller.php");

function validation_login($login, $password)
{


    if (isCombinaisonValide($login, $password)) {
        if (compteActif($login)) {
            ajouterMessageAlerte("Hello ". $login ." ! You're welcome !", "vert");
            $_SESSION['profil']=[
                "login"=>$login,

            ];
            header('location:' . URL . "compte/profil");
        } else {
            ajouterMessageAlerte("Le compte de " . $login . " n'a pas été activé.<br> Contrôler vos mails !", "rouge");
            header('location:' . URL . "login");
        }
    } else {
        ajouterMessageAlerte("Combinaison Login / Mot de passe non valide.", "rouge");
        header('location:' . URL . "login");
    }
}

function profil()
{
    $datas = getUserInformation($_SESSION['profil']['login']);
    $_SESSION['profil']['role']=$datas['role'];
    
    $data_page = [
        "page_description" => "Description Utilisateur",
        "page_title" => "Votre profil",
        "view" => "views/pages/utilisateur/profil.view.php",
        "template" => "views/commons/template.php",
        "css" => "profilContainer",
        "utilisateur"=>$datas,

    ];
    genererPage($data_page);
}

function deconnexion(){
    ajouterMessageAlerte("Vous êtes bien déconnecté.", "vert");
    session_unset();
    header('location:' . URL . "accueil");
}

