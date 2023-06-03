<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

require_once("./controllers/visiteur.controller.php");
require_once("./controllers/mailContact.controller.php");
require_once("./controllers/administrateur.controller.php");
require_once("./controllers/functions.controller.php");
require_once("./controllers/security.controller.php");
require_once("./controllers/criteres.controller.php");
// require_once("./controllers/images.controller.php");

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
        case "velos":
            pageVelos();
            break;
        case "occasions":
            pageOccasions();
            break;
        case "locations":
            pageLocation();
            break;
        case "mecanique":
            pageMecanique();
            break;
        case "sorties":
            pageSorties();
            break;
        case "mailContact":
            mailContact();
            break;
        case "velo_detaille":
            pageVelo($_POST['velo_id']);
            break;
        case "adminVE":
            pageLogin();
            break;
        case "validation_login":

            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = secureHTML($_POST['login']);
                $password = secureHTML($_POST['password']);
                validation_login($login, $password);
            } else {
                ajouterMessageAlerte('Login ou mot de passe non renseigné.', 'rouge');
                header('location:' . URL . "adminVE");
                exit;
            }
            break;


        case "admin":
            if (!estConnecte()) {
                header('location:' . URL . "accueil");
                session_unset();
                ajouterMessageAlerte("Voie sans issue ! 😅", "rouge");
            } else {
                switch ($url[1]) {
                    case "accueilAdmin":
                        accueilAdmin();
                        break;
                    case "deconnexion":
                        deconnexion();
                        break;
                    case "marques":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                            case "validationModification":
                                modification($url[1]);
                                break;
                                // case "creation":
                                //     creation($url[2]);
                                //     break;
                        }
                        break;
                    case "nb_vitesses":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                            case "validationModification":
                                modification($url[1]);
                                break;
                                // case "creation":
                                //     echo "creation nb_vitesses";
                                // marquesVisualisation();
                                // break;
                        }
                        break;
                    case "suspension":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                                case "validationModification":
                                    modification($url[1]);
                                    break;
                            case "creation":
                                echo "creation suspension";
                                // marquesVisualisation();
                                break;
                        }
                        break;
                    case "taille_cadres":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                                case "validationModification":
                                    modification($url[1]);
                                    break;
                            case "creation":
                                echo "creation cadre";
                                // marquesVisualisation();
                                break;
                        }
                        break;
                    case "taille_roues":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                                case "validationModification":
                                    modification($url[1]);
                                    break;
                            case "creation":
                                echo "creation roues";
                                // marquesVisualisation();
                                break;
                        }
                        break;
                    case "type_velo":
                        switch ($url[2]) {
                            case "visualisation":
                                visualisation($url[1]);
                                break;
                            case "validationSuppression":
                                suppression($url[1]);
                                break;
                                case "validationModification":
                                    modification($url[1]);
                                    break;
                            case "creation":
                                echo "creation type";
                                // marquesVisualisation();
                                break;
                        }
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
