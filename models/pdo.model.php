<?php

// fichier de connexion à bdd

function setBDD()
{
    try {
        //connection à notre BDD, à modifier pour site en construction
        $pdo = new PDO(
            'mysql:host=89.116.147.103;
             dbname=u256533777_test',
            'u256533777_christophec',
            'Santa30420*',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $pdo;
}

function getBDD()
{
    $pdo = setBDD();
    if ($pdo === null) {
        setBDD();
    }
    return $pdo;
}
