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
            "page_description" => "Viusalisation des marques",
            "page_title" => "VE _ Visu Marques",
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
        if (deleteDBCritereItem($_POST['critere'], $_POST['nom_colonne_id_critere'], $_POST['id_critere'])) {
            ajouterMessageAlerte("Suppression effectuée.", "vert");
            header('location:' . URL . "admin/accueilAdmin");
        };
    } else {
        ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
        header('location:' . URL . "accueil");
    }
}
