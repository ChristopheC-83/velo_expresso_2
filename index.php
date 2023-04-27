<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

require_once("./controllers/visiteur/visiteur.controller.php");
require_once("./controllers/administrateur/administrateur.controller.php");
require_once("./controllers/utilisateur/utilisateur.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/security.controller.php");
require_once("./controllers/images.controller.php");

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
                    case "validation_modifImage":
                        // afficherTableau($_FILES['image']);
                        // afficherTableau($_SESSION);
                        if ($_FILES['image']['size'] > 0) {
                            validation_modifImage($_FILES['image']);
                        } else {
                            ajouterMessageAlerte("Image non modifiée", "rouge");
                            header('location:' . URL . "profil");
                        }
                        // validation_modifImage(secureHTML($_POST['mail']));
                        break;
                    case "validation_modificationMail":
                        validation_modificationMail(secureHTML($_POST['mail']));
                        break;
                    case "validation_modificationMDP":
                        if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['verifNewPassword'])) {
                            $oldPassword = secureHTML($_POST['oldPassword']);
                            $newPassword = secureHTML($_POST['newPassword']);
                            $verifNewPassword = secureHTML($_POST['verifNewPassword']);
                            validation_modificationMDP($oldPassword, $newPassword, $verifNewPassword);
                        } else {
                            ajouterMessageAlerte("Il faut remplir les 3 champs", "rouge");
                            header('location:' . URL . "compte/profil");
                        }
                        break;
                    case "suppressionCompte":
                        validation_suppressionCompte();
                        break;
                    default:
                        throw new Exception("La page demandée n'existe pas.");
                }
            }
            break;
        case "admin":
            if (!estConnecte()) {
                ajouterMessageAlerte("Vous devez vous connecter.", "rouge");
                session_unset();
                header('location:' . URL . "login");
            } elseif (!estAdministrateur()) {
                ajouterMessageAlerte("Zone réservée aux administrateurs.", "rouge");
                header('location:' . URL . "accueil");
            } else {
                switch ($url[1]) {
                    case "gestion_droits":
                        droits();
                        break;
                    case "validation_modificationValidation":
                        validation_modificationValidation($_POST['login'], $_POST['est_valide']);
                        break;
                    case "validation_modificationRole":
                        validation_modificationRole($_POST['login'], $_POST['role']);
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
