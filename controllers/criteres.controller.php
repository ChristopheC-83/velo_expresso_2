<?php


require_once("./controllers/functions.controller.php");
require_once("./controllers/security.controller.php");
require_once("./models/criteres.model.php");

function visualisation($critere)
{
    if (estConnecte()) {

        $nomColonnes = getNomColonnes($critere);
        $nom_critere =  $nomColonnes[1]['nomColonne'];
        $criteresItems = getInfosCriteres($critere, $nom_critere);

        $data_page = [
            "page_description" => "Viusalisation des " . $critere,
            "page_title" => "VE _ Visu " . $critere,
            "view" => "views/pages/administrateur/criteres/critere.view.php",
            "template" => "views/commons/template.php",
            "critere" => $critere,
            "criteresItems" => $criteresItems,
            "nomColonnes" => $nomColonnes,
        ];
        genererPage($data_page);
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}

function suppression($critere)
{
    if (estConnecte()) {
        // afficherTableau($_POST['critere']);
        // afficherTableau($_POST['nom_colonne_id_critere']);
        // afficherTableau($_POST['id_critere']);
        // echo "nb dans l'id = ".compterVelos($_POST['nom_colonne_id_critere'], $_POST['id_critere']);

        if (compterVelos($_POST['nom_colonne_id_critere'], $_POST['id_critere']) > 0) {
            ajouterMessageAlerte($_POST['critere'] . " non vide, suppression non effectuée.", "rouge");
            header('location:' . URL . "admin/accueilAdmin");
        } else {
            if (deleteDBCritereItem($_POST['critere'], $_POST['nom_colonne_id_critere'], $_POST['id_critere'])) {
                ajouterMessageAlerte("Suppression effectuée dans " . $critere . " .", "vert");
                header('location:' . URL . "admin/" . $critere . "/visualisation");
            }
        }
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}

function modification($critere)
{
    if (estConnecte()) {
        // afficherTableau($_POST['critere']);
        // afficherTableau($_POST['nom_colonne_id_critere']);
        // afficherTableau($_POST['nom_colonne_critere']);
        // afficherTableau($_POST['id_critere']);
        // afficherTableau($_POST['new_nom_critere']);

        $table = secureHTML($_POST['critere']);
        $colonne_id_critere = secureHTML($_POST['nom_colonne_id_critere']);
        $colonne_nom_critere = secureHTML($_POST['nom_colonne_critere']);
        $id = secureHTML($_POST['id_critere']);
        $new = secureHTML($_POST['new_nom_critere']);

        if (updateCritere($table, $colonne_id_critere, $colonne_nom_critere, $id, $new)) {
            ajouterMessageAlerte("Modification effectuée", "vert");
        } else {
            ajouterMessageAlerte("Modification non faite", "rouge");
        }
        header('location:' . URL . "admin/" . $critere . "/visualisation");
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}

function creation($critere)
{
    if (estConnecte()) {

        $nomColonnes = getNomColonnes($critere);
        $nom_critere =  $nomColonnes[1]['nomColonne'];
        $criteresItems = getInfosCriteres($critere, $nom_critere);

        // afficherTableau($nomColonnes);
        // afficherTableau($nom_critere); //nom colonne dans table $critere
        // afficherTableau($critere);


        $data_page = [
            "page_description" => "Modification des " . $critere,
            "page_title" => "VE _ Modif " . $critere,
            "view" => "views/pages/administrateur/criteres/creation_critere.view.php",
            "template" => "views/commons/template.php",
            "critere" => $critere,
            "criteresItems" => $criteresItems,
            "nomColonnes" => $nomColonnes,
        ];
        genererPage($data_page);
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}

function validationCreation($critere)
{
    if (estConnecte()) {

        $nomColonnes = getNomColonnes($critere);
        $nom_critere =  $nomColonnes[1]['nomColonne'];
        $criteresItems = getInfosCriteres($critere, $nom_critere);
        $table = secureHTML($critere);
        $info_critere = secureHTML($_POST['infoCritere']);


        // afficherTableau($nomColonnes);
        // afficherTableau($nom_critere); //nom colonne dans table $critere
        // afficherTableau($critere);
        // afficherTableau($_POST['infoCritere']);


        // afficherTableau($table);
        // afficherTableau($nom_critere);
        // afficherTableau($info_critere);
        if (!empty($info_critere)) {
            createCritere($table, $nom_critere, $info_critere);
            ajouterMessageAlerte("Création de " . $info_critere . " effectuée", "vert");
            header('location:' . URL . "admin/" . $critere . "/visualisation");
        } else {

            ajouterMessageAlerte("Il faut rentrer une info pour créer un élément de : " . $critere, "rouge");
            header('location:' . URL . "admin/" . $critere . "/creation");
        }
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}
