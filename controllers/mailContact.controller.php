<?php

use Random\Engine\Secure;

require_once "./controllers/functions.controller.php";
require_once "./models/visiteurs.model.php";



function mailContact()
{
    // afficherTableau($_POST);
    if (!empty($_POST['nomFormulaire']) && !empty($_POST['mailFormulaire']) && !empty($_POST['messageFormulaire'])) {
        $nom = htmlentities($_POST['nomFormulaire']);
        $mail = htmlentities($_POST['mailFormulaire']);
        $message = htmlentities($_POST['messageFormulaire']);
        $destinataire = "kiketdule@gmail.com";
        $sujet = "Mail du site de " . $nom . " : " . $mail;

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $headers= 'MIME-Version: 1.0';
            $headers .= 'Content-type: text/html; charset=iso-8859-1';
            $headers .= "Formulaire de contact";
            $headers .= "From : " . $mail;
            if (mail($destinataire, $sujet, $message, $headers)) {
                ajouterMessageAlerte("Mail envoyé. Il sera lu dès que possible.", "vert");
            } else {
                ajouterMessageAlerte("Mail non parti à " . $destinataire . " ! <br> Merci de réessayer.", "rouge");
            }
            header('location:' . URL . "accueil");
        } else {
            header('location:' . URL . "accueil");
            ajouterMessageAlerte("Adresse mail non valide.", "orange");
        }
    } else {
        header('location:' . URL . "accueil");
        ajouterMessageAlerte("Il faut remplir les 3 champs de contact !", "orange");
    }
}
