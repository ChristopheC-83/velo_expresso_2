<div class="animTitres <?= $css ?>">

    <h1>Titre Page 2</h1>

    <h2>Page 2 Contiendra</h2>

    <p>Contenu Page 2</p>
    <br>

    <?php

    foreach ($datas as $data) {
        echo $data["nom"] . " / " . $data["classe"] . " / " . $data["pv"] . " / " . $data["atk"] . "<br>";
        afficherTableau($data);
        echo "<br><hr>";
    }
    ?>
    <br>
    <hr>
    <?php afficherTableau($datas) ?>

</div>