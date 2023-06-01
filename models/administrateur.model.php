<?php


require_once("./models/pdo.model.php");


function getPasswordUser($login)
{
    $req = "SELECT password FROM connexionAdmin WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['password'];
}

function isCombinaisonValide($login, $password)
{
    $passwordBd = getPasswordUser($login);
    return password_verify($password, $passwordBd);
}

