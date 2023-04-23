<?php


require_once("./models/pdo.model.php");


function getPasswordUser($login)
{
    $req = "SELECT password FROM user_management WHERE login = :login";
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
    // on compare le password de la bd et celui du formulaire
    afficherTableau($passwordBd);
    return password_verify($password, $passwordBd);
}

function compteActif($login)
{
    $req = "SELECT est_valide FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return ((int)$resultat['est_valide'] === 1);
}

function getUserInformation($login)
{
    $req = "SELECT * FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;
}

function verifLoginDispo($login)
{
    $utilisateur = getUserInformation($login);
    return empty($utilisateur);
}

function bdCreerCompte($login, $passwordCrypte, $mail, $cle)
{
    $req = "INSERT INTO user_management (login, password, mail, est_valide, role, cle, image)
            VALUES(:login, :password, :mail, 0, 'utilisateur', :cle, '')";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
    $stmt->bindValue(":cle", $cle, PDO::PARAM_INT);
    $stmt->execute();
    $creationOK = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $creationOK;
}

function bdValidationMailCompte($login, $cle)
{
    $req = "UPDATE user_management set est_valide = 1 
            WHERE login = :login
            and cle = :cle
            ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":cle", $cle, PDO::PARAM_INT);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;

}