<?php


require_once("./controllers/functionController.controller.php");
require_once("./models/visiteur/visiteur.model.php");
require_once("./models/utilisateur/utilisateur.model.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/images.controller.php");

function validation_login($login, $password)
{
    if (isCombinaisonValide($login, $password)) {

        ajouterMessageAlerte("Hello " . $login . " ! You're welcome !", "vert");
        $_SESSION['profil'] = [
            "login" => $login,
        ];
        header('location:' . URL . "compte/profil");
    } else {
        ajouterMessageAlerte("Combinaison Login / Mot de passe non valide.", "rouge");
        header('location:' . URL . "login");
    }
}

function deconnexion()
{
    session_unset();
    setcookie(COOKIE_NAME, "", time() - 3600);
    header('location:' . URL . "accueil");
    ajouterMessageAlerte("Vous êtes bien déconnecté.", "vert");
}
