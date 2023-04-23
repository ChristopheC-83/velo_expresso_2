<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

require_once("./controllers/visiteur/visiteur.controller.php");
require_once("./controllers/utilisateur/utilisateur.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/security.controller.php");

try {
    if (empty($_GET['page'])) {
        $url[0] = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($url[0]) {
        case "accueil":
            pageAccueil();
            break;
        case "login":
            pageLogin();
            break;
        case "validation_login":
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = secureHTML($_POST['login']);
                $password = secureHTML($_POST['password']);
                validation_login($login, $password);
            } else {
                ajouterMessageAlerte('Login ou mot de passe non renseigné.', 'rouge');
                header('location:' . URL . "login");
                exit;
            }
            break;
        case "creerCompte":
            creerCompte();
            break;
        case "validation_creerCompte":
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail'])) {
                $login = secureHTML($_POST['login']);
                $password = secureHTML($_POST['password']);
                $mail = secureHTML($_POST['mail']);
                validation_creerCompte($login, $password, $mail);
            } else {
                ajouterMessageAlerte("Les 3 champs sont obligatoires !", "rouge");
                header('location:' . URL . "creerCompte");
            }
            break;
        case "renvoyerMailValidation":
            renvoyerMailValidation($url[1]);
            break;
        case "validationMail":
            validation_mailCompte($url[1], $url[2]);
            break;
        case "compte":
            if (!estConnecte()) {
                header('location:' . URL . "accueil");
                session_unset();
                ajouterMessageAlerte("Vous devez vous connecter ou vous inscrire.", "orange");
            } else {
                switch ($url[1]) {
                    case "profil":
                        profil();
                        break;
                    case "deconnexion":
                        deconnexion();
                        break;
                    default:
                        throw new Exception("La page demandée n'existe pas.");
                }
            }
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    pageErreur($e->getMessage());
}
