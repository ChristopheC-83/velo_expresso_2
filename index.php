<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

require_once("./controllers/visiteur.controller.php");
// require_once("./controllers/administrateur.controller.php");
// require_once("./controllers/functionController.controller.php");
// require_once("./controllers/security.controller.php");
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
        case "login":
            pageLogin();
            break;
        // case "validation_login":
        //     if (!empty($_POST['login']) && !empty($_POST['password'])) {
        //         $login = secureHTML($_POST['login']);
        //         $password = secureHTML($_POST['password']);
        //         validation_login($login, $password);
        //     } else {
        //         ajouterMessageAlerte('Login ou mot de passe non renseigné.', 'rouge');
        //         header('location:' . URL . "login");
        //         exit;
        //     }
        //     break;
       
        
        // case "admin":
        //     if (!estConnecte()) {
        //         header('location:' . URL . "accueil");
        //         session_unset();
        //         ajouterMessageAlerte("Voie sans issue ! 😅", "rouge");
        //     } else {
        //         switch ($url[1]) {
        //             case "modifNeufs":
        //                 pageModifNeufs();
        //                 break;
        //             case "validationModifNeufs":
        //                 pageValidationModifNeufs();
        //                 break;
        //                 case "modifOccasions":
        //                 pageModifOccasions();
        //                 break;
        //             case "validationModifOccasions":
        //                 pageValidationModifOccasions();
        //                 break;
                    
        //             }
        //     }

            // break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    pageErreur($e->getMessage());
}
