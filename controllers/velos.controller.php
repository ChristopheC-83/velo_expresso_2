<?php


require_once("./controllers/functions.controller.php");
require_once("./controllers/security.controller.php");
require_once("./models/velos.model.php");
require_once("./models/visiteurs.model.php");
// require_once("./controllers/images.controller.php");


function visualisationVelos($neufs)
{
  if (estConnecte()) {

    if ($neufs === 1) {
      $neufs = "neufs";
      $velos = getNeufs();
    } else {
      $neufs = "d'occasion";
      $velos = getOccasions();
    }

    $data_page = [
      "page_description" => "Viusalisation des Neufs ",
      "page_title" => "VE _ Visu Velos Neufs",
      "view" => "views/pages/administrateur/velos/visualisationVelos.view.php",
      "template" => "views/commons/template.php",
      "velos" => $velos,
      "neufs" => $neufs,

    ];
    genererPage($data_page);
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}
function validationVeloSuppression()
{
  if (estConnecte()) {

    $id_velo = secureHTML($_POST['id']);
    $velo = getVelo($id_velo);
    afficherTableau($velo);

    if (deleteDBVelo($id_velo)) {

      ajouterMessageAlerte("Vélo supprimé !", "vert");
      header('location:' . URL . "admin/accueilAdmin");
    } else {

      ajouterMessageAlerte("Echec de la suppression", "rouge");
      header('location:' . URL . "admin/accueilAdmin");
    }
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}
function creationVelo()
{
  if (estConnecte()) {

    $marques = getMarques();
    $nb_vitesses = getVitesses();

    $data_page = [
      "page_description" => "Création d'un vélo dans la bdd",
      "page_title" => "VE _ Création Velo",
      "view" => "views/pages/administrateur/velos/creationVelo.view.php",
      "template" => "views/commons/template.php",
      "marques" => $marques,
      "nb_vitesses" => $nb_vitesses,
    ];
    genererPage($data_page);
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}
