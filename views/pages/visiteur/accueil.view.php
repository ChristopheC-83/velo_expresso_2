<div class="animTitres <?= $css ?>">

    <h1>Titre Site / Accueil</h1>
    <h2>Accueil Contiendra</h2>

    <p>Contenu Accueil</p>
    <?php
    if (!empty($_SESSION['profil'])) {
        afficherTableau($_SESSION['profil']);
    } else {
        echo "Session vide !";
    }


    ?>



</div>