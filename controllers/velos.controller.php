<?php


require_once("./controllers/functions.controller.php");
require_once("./controllers/security.controller.php");
require_once("./models/velos.model.php");
require_once("./models/visiteurs.model.php");
require_once("./controllers/images.controller.php");


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
    // afficherTableau($velo);
    $photo = $velo[0]['photo'];
    if ($photo) {
      unlink("public/assets/images/velos/" . $photo);
    }
    $veloNeuf = secureHTML($velo[0]['neuf']);
    if (deleteDBVelo($id_velo)) {

      ajouterMessageAlerte("Vélo supprimé !", "vert");
      if ($veloNeuf == 0) {
        header('location:' . URL . "admin/velos/visualisationVelosOccasion");
      } else {
        header('location:' . URL . "admin/velos/visualisationVelosNeufs");
      }
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
    $taille_cadre = getCadre();
    $taille_roues = getRoues();
    $type_velo = getTypeVelo();
    $suspension = getSuspension();

    $data_page = [
      "page_description" => "Création d'un vélo dans la bdd",
      "page_title" => "VE _ Création Velo",
      "view" => "views/pages/administrateur/velos/creationVelo.view.php",
      "template" => "views/commons/template.php",
      "marques" => $marques,
      "nb_vitesses" => $nb_vitesses,
      "taille_cadre" => $taille_cadre,
      "taille_roues" => $taille_roues,
      "type_velo" => $type_velo,
      "suspension" => $suspension,
    ];
    genererPage($data_page);
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}

function validationCreationVelo()
{
  if (estConnecte()) {

    // afficherTableau($_POST['promo']);
    $photo = "";
    if ($_FILES['photo']['size'] > 0) {
      $repertoire = "public/assets/images/velos/";
      $photo = ajoutImage($_FILES['photo'], $repertoire);
    }


    $infoVelo = [
      'marque' => secureHTML($_POST['marque']),
      'modele' => secureHTML($_POST['modele']),
      'photo' => $photo,
      'electrique' => (int)secureHTML($_POST['electrique']),
      'prix' => (int)secureHTML($_POST['prix']),
      'description' => secureHTML($_POST['description']),
      'nb_vitesses' => (int)secureHTML($_POST['nb_vitesses']),
      'cadre' => secureHTML($_POST['cadre']),
      'roues' => (int)secureHTML($_POST['roues']),
      'type' => (int)secureHTML($_POST['type']),
      'promo' => (int)secureHTML($_POST['promo']),
      'vendu' => (int)secureHTML($_POST['vendu']),
      'suspension' => (int)secureHTML($_POST['suspension']),
      'neuf' => (int)secureHTML($_POST['neuf']),
      'message_perso' => secureHTML($_POST['message_perso'])
    ];
    // afficherTableau($infoVelo);
    // echo($_FILES['photo']['name']);


    if (createDBVelo($infoVelo)) {


      ajouterMessageAlerte("Vélo ajouté !", "vert");
      if ($_POST['neuf'] == 1) {
        header('location:' . URL . "admin/velos/visualisationVelosNeufs");
      } else {
        header('location:' . URL . "admin/velos/visualisationVelosOccasion");
      }
    } else {

      ajouterMessageAlerte("Echec de la creation", "rouge");
      header('location:' . URL . "admin/accueilAdmin");
    }
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}

function modificationVelo($velo_id)
{
  if (estConnecte()) {

    $velo = getVelo($velo_id);
    // afficherTableau($velo);
    $marques = getMarques();
    $nb_vitesses = getVitesses();
    $taille_cadre = getCadre();
    $taille_roues = getRoues();
    $type_velo = getTypeVelo();
    $suspension = getSuspension();

    $data_page = [
      "page_description" => "Modification d'un vélo dans la bdd",
      "page_title" => "VE _ Modification Velo",
      "view" => "views/pages/administrateur/velos/modificationVelo.view.php",
      "template" => "views/commons/template.php",
      "velo" => $velo[0],
      "marques" => $marques,
      "nb_vitesses" => $nb_vitesses,
      "taille_cadre" => $taille_cadre,
      "taille_roues" => $taille_roues,
      "type_velo" => $type_velo,
      "suspension" => $suspension,
    ];
    genererPage($data_page);
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}


function validationModificationVelo()
{
  if (estConnecte()) {
    // afficherTableau($_POST);
    // afficherTableau($_FILES);
    $old_photo = $_POST['old_photo'];
    $photo="";

    if ($_FILES['photo']['size'] > 0) {
      unlink("public/assets/images/velos/".$old_photo);
      $repertoire = "public/assets/images/velos/";
      $photo = ajoutImage($_FILES['photo'], $repertoire);
    }else{
      $photo=$old_photo;
    }

    $infoVelo = [
      'velo_id' => secureHTML($_POST['velo_id']),
      'marque' => secureHTML($_POST['marque']),
      'modele' => secureHTML($_POST['modele']),
      'photo' => $photo,
      'electrique' => (int)secureHTML($_POST['electrique']),
      'prix' => (int)secureHTML($_POST['prix']),
      'description' => secureHTML($_POST['description']),
      'nb_vitesses' => (int)secureHTML($_POST['nb_vitesses']),
      'cadre' => secureHTML($_POST['cadre']),
      'roues' => (int)secureHTML($_POST['roues']),
      'type' => (int)secureHTML($_POST['type']),
      'promo' => (int)secureHTML($_POST['promo']),
      'vendu' => (int)secureHTML($_POST['vendu']),
      'suspension' => (int)secureHTML($_POST['suspension']),
      'neuf' => (int)secureHTML($_POST['neuf']),
      'message_perso' => secureHTML($_POST['message_perso'])
    ];
    afficherTableau($infoVelo);
    if (updateDBVelo($infoVelo)) {

      ajouterMessageAlerte("Vélo modifié !", "vert");
      if ($_POST['neuf'] == 1) {
        header('location:' . URL . "admin/velos/visualisationVelosNeufs");
      } else {
        header('location:' . URL . "admin/velos/visualisationVelosOccasion");
      }
    } else {

      ajouterMessageAlerte("Echec de la modification", "rouge");
      header('location:' . URL . "admin/accueilAdmin");
    }
  } else {
    ajouterMessageAlerte("Vous n'avez le droit d'être là !", "rouge");
    header('location:' . URL . "accueil");
  }
}
