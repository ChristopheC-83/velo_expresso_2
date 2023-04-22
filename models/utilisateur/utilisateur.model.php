<?php


require_once("./models/pdo.model.php");


function getPasswordUser($login){
    $req="SELECT password FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['password'];
     
}

function isCombinaisonValide($login, $password){
    $passwordBd = getPasswordUser($login);
    // on compare le password de la bd et celui du formulaire
    afficherTableau($passwordBd);
    return password_verify($password, $passwordBd);
}

function compteActif($login){
    $req="SELECT est_valide FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return ((int)$resultat['est_valide'] === 1);
}

function getUserInformation($login){
    $req="SELECT * FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;


}