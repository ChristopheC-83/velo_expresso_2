<div class="pageCreationVelo">

    <h1>Création d'un vélo</h1>
    <!-- <?= afficherTableau($marques)  ?> -->

    <form action="<?= URL ?>admin/velo/validationCreationVelo" method="post" enctype="multipart/form-data">

        <!-- Marque -->
        <div class="creation-velo-form">
            <label for="modele">Marque : </label>
            <select name="modele" id="modele">
                <option value=""></option>
                <?php foreach ($marques as $marque) : ?>
                    <option value="<?= $marque['marque_id']  ?>"> <?= $marque['marque']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Modele -->
        <div class="creation-velo-form">
            <label for="modele">Modèle : </label>
            <input type="text" id="modele" name="modele">
        </div>

        <!-- Description -->
        <div class="creation-velo-form">
            <label for="description">Description :</label>
            <textarea type="text" id="description" name="description" cols="30" rows="8"></textarea>
        </div>

        <!-- Nb_Vitesses -->
        <div class="creation-velo-form">
            <label for="electrique">Nombre de Vitesses : </label>
            <select name="modele" id="modele">
                <option value=""></option>
                <?php foreach ($nb_vitesses as $vitesses) : ?>
                    <option value="<?= $vitesses['vitesses_id']  ?>"> <?= $vitesses['nb_vitesses']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- photo -->
        <div class="creation-velo-form">
            <label for="photo">Photo :</label>
            <input type="file" name="photo" id="photo">
        </div>




        <div class="entryForm">
            <!-- Pour éviter d'envoyer à l'appui de la touche ENTER -->
            <!-- <input class="buttonEntryForm" type="button" value="Connexion"onclick="submit()"> -->
            <!-- sinon : -->
            <button>Création</button>
        </div>
        <div class="entryForm">
            <button><a href="<?= URL ?>admin/accueilAdmin">Retour</a></button>
        </div>


    </form>

</div>