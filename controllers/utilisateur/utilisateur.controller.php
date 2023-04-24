<?php


require_once("./controllers/functionController.controller.php");
require_once("./models/visiteur/visiteur.model.php");
require_once("./models/utilisateur/utilisateur.model.php");
require_once("./controllers/functionController.controller.php");

function validation_login($login, $password)
{
    if (isCombinaisonValide($login, $password)) {
        if (compteActif($login)) {
            ajouterMessageAlerte("Hello " . $login . " ! You're welcome !", "vert");
            $_SESSION['profil'] = [
                "login" => $login,
            ];
            header('location:' . URL . "compte/profil");
        } else {
            $msg = "Le compte de " . $login . " n'a pas été activé. <br> Contrôlez vos mails ! <br> <a href='renvoyerMailValidation/".$login."'>Renvoyer le mail de validation</a>";
            
            ajouterMessageAlerte($msg, "rouge");
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
    $_SESSION['profil']['role'] = $datas['role'];

    $data_page = [
        "page_description" => "Description Utilisateur",
        "page_title" => "Votre profil",
        "view" => "views/pages/utilisateur/profil.view.php",
        "template" => "views/commons/template.php",
        "css" => "profilContainer",
        "js" => ['profil.js'],
        "utilisateur" => $datas,
    ];
    genererPage($data_page);
}

function deconnexion()
{
    ajouterMessageAlerte("Vous êtes bien déconnecté.", "vert");
    session_unset();
    header('location:' . URL . "accueil");
}

function validation_creerCompte($login, $password, $mail)
{
    if (verifLoginDispo($login)) {
        $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
        $cle = rand(0, 999999);
        if (bdCreerCompte($login, $passwordCrypte, $mail, $cle)) {
            sendMailValidation($login, $mail, $cle);
            ajouterMessageAlerte("Votre compte a été créer. <br> Merci de la valider via le lien envoyé sur votre adresse mail.", "vert");
            header('location:' . URL . "accueil");
        } else {
            ajouterMessageAlerte("Echec de la création de votre compte.<br> Merci de recommencer.", "rouge");
            header('location:' . URL . "creerCompte");
        }
    } else {
        ajouterMessageAlerte("Ce nom est déja utilisé.<br> Merci d'en choisir un autre", "rouge");
        header('location:' . URL . "creerCompte");
    }
}

function sendMailValidation($login, $mail, $cle)
{
    $urlDeVerification = URL . "validationMail/" . $login . "/" . $cle;
    $sujet = "Création du compte";
    $message = "Pour valider votre compte, merci de cliquer sur le lien suivant : <br>" . $urlDeVerification;
    sendMail($mail, $sujet, $message);
}

function renvoyerMailValidation($login){
    $utilisateur = getUserInformation($login);
    sendMailValidation($login, $utilisateur['mail'], $utilisateur['cle']);
    header('location:' . URL . "login");
}

function validation_mailCompte($login, $cle){
    if(bdValidationMailCompte($login, $cle)){
        ajouterMessageAlerte("Le compte de ".$login." a été activé", "vert");
        $_SESSION['profil'] = [
            "login" => $login,
        ];
        header('location:' . URL . "compte/profil");
    }else{
        ajouterMessageAlerte("Le compte n'a pas été activé", "rouge");
        header('location:' . URL . "creerCompte");
    }
}

function validation_modificationMail($mail){
    if(bdModifMailUser($_SESSION['profil']['login'], $mail)){
        ajouterMessageAlerte("Le mail est modifié.", "vert");
    } else{
        ajouterMessageAlerte("Aucune modification effectuée.", "rouge");
    }
    header('location:' . URL . "compte/profil");
}