<?php

function secureHTML($chaine)
{
    return htmlentities($chaine);
}

function estConnecte()
{
    return (!empty($_SESSION['access']) && $_SESSION['access']==="admin");
}
