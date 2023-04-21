<div class="animTitres <?= $css ?>">

    <h1>Titre Page 3</h1>

    <h2>Page 3 Contiendra</h2>

    <p>Contenu Page 3</p>
    <p>Connection BDD directe</p>

    <?php
    //connection directe à la bdd, sans passer par mainController/mainManager/pdo...
    try {
        $database = new PDO('mysql:host=localhost; dbname=test', 'root', "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('un pb de connexion !?! ' . $e->getMessage());
    }
    $results = $database->query("SELECT * from bd_mvc");
    afficherTableau($results->fetchAll(PDO::FETCH_ASSOC));
    ?>

</div>