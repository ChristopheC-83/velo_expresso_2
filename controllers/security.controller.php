<?php

function secureHTML($chaine)
{
    return htmlentities($chaine);
}

function estConnecte()
{
    return (!empty($_SESSION['profil']));
}
function estUtilisateur()
{
    return (!empty($_SESSION['profil']['role'] === "utilisateur"));
}
function estAdministrateur()
{
    return (!empty($_SESSION['profil']['role'] === "administrateur"));
}
