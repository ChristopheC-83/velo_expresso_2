<div class="pageCreationVelo">


    <h1>Modification du vélo</h1>
    <h3><?= $velo['marque']." " .$velo['modele'] ?></h3>
    <h3>
        <?php echo($velo['prix']." € / ")?>
        <?php if($velo['neuf']==1){ echo "neuf";}else{echo "occasion";} ?>
    </h3>

    <?php  afficherTableau($velo )?>


    <form action="<?= URL ?>admin/velos/validationModificationVelo" method="post" enctype="multipart/form-data">
        <input type="hidden" name="velo_id" value="<?=$velo['velo_id'];?>">
        <!-- Marque -->
        <div class="creation-velo-form">
            <label for="marque">Marque : </label>
            <select name="marque" id="marque">
                <option></option>
                <?php foreach ($marques as $marque) : ?>

                <option value="<?= $marque['marque_id']  ?>"
                <?=($marque['marque_id']==$velo['marque_id'])?"selected":""; ?>
                > <?= $marque['marque']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Modele -->
        <div class="creation-velo-form">
            <label for="modele">Modèle : </label>
            <input type="text" id="modele" name="modele" value="<?= $velo['modele'] ?>">
        </div>
        <!-- Prix -->
        <div class="creation-velo-form">
            <label for="prix">Prix : </label>
            <input type="text" id="prix" name="prix" value="<?= $velo['prix'] ?>">
        </div>

        <!-- Description -->
        <div class="creation-velo-form">
            <label for="description">Description :</label>
            <textarea type="text" id="description" name="description" cols="30"
                rows="8"><?= $velo['description'] ?></textarea>
        </div>
        <!-- Message Perso -->
        <div class="creation-velo-form">
            <label for="message_perso">Message Perso :</label>
            <textarea type="text" id="message_perso" name="message_perso" cols="30"
                rows="8"><?= $velo['message_perso'] ?></textarea>
        </div>

        <!-- Nb_Vitesses -->
        <div class="creation-velo-form">
            <label for="nb_vitesses">Nombre de Vitesses : </label>
            <select name="nb_vitesses" id="nb_vitesses">
                <option value=""></option>
                <?php foreach ($nb_vitesses as $vitesses) : ?>
                <option value="<?= $vitesses['vitesses_id']  ?>"
                <?=($vitesses['vitesses_id']==$velo['vitesses_id'])?"selected":""; ?>
                > <?= $vitesses['nb_vitesses']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>
        <!-- Cadre -->
        <div class="creation-velo-form">
            <label for="cadre">Taille Cadre : </label>
            <select name="cadre" id="cadre">
                <option value=""></option>
                <?php foreach ($taille_cadre as $cadre) : ?>
                <option value="<?= $cadre['taille_cadre_id']  ?>"
                <?=($cadre['taille_cadre_id']==$velo['taille_cadre_id'])?"selected":""; ?>
                > <?= $cadre['taille_cadre']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Roues -->
        <div class="creation-velo-form">
            <label for="roues">Taille Roues : </label>
            <select name="roues" id="roues">
                <option value=""></option>
                <?php foreach ($taille_roues as $roues) : ?>
                <option value="<?= $roues['taille_roues_id']  ?>"
                <?=($roues['taille_roues_id']==$velo['taille_roues_id'])?"selected":""; ?>
                > <?= $roues['taille_roues']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Type -->
        <div class="creation-velo-form">
            <label for="type">Type de Vélo : </label>
            <select name="type" id="type">
                <option value=""></option>
                <?php foreach ($type_velo as $type) : ?>
                <option value="<?= $type['type_id']  ?>"
                <?=($type['type_id']==$velo['type_id'])?"selected":""; ?>
                
                > <?= $type['type_velo']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Suspension -->
        <div class="creation-velo-form">
            <label for="suspension">Type de Suspension : </label>
            <select name="suspension" id="suspension">
                <option value=""></option>
                <?php foreach ($suspension as $susp) : ?>
                <option value="<?= $susp['suspension_id']  ?>"
                <?=($susp['suspension_id']==$velo['suspension_id'])?"selected":""; ?>
                > <?= $susp['suspension']  ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Electrique -->
        <div class="creation-velo-form">
            <p> Electrique ?</p>
            <input type="radio" name="electrique" id="electrique" value=1 
            <?= ($velo['electrique']==1)?"checked":"";  ?>
            ><label for="electrique">oui</label>
            <input type="radio" name="electrique" id="electrique" value=0
            <?= ($velo['electrique']==0)?"checked":"";  ?>><label for="electrique">non</label>
        </div>

        <!-- Vendu -->
        <div class="creation-velo-form">
            <p> Vendu ?</p>
            <input type="radio" name="vendu" id="vendu" value=1 
            
            <?= ($velo['vendu']==1)?"checked":"";  ?>
            ><label for="vendu">oui</label>
            <input type="radio" name="vendu" id="vendu" value=0
            
            <?= ($velo['vendu']==0)?"checked":"";  ?>
            ><label for="vendu">non</label>
        </div>

        <!-- Neuf -->
        <div class="creation-velo-form">
            <p> Neuf ?</p>
            <input type="radio" name="neuf" id="neuf" value=1
            <?= ($velo['neuf']==1)?"checked":"";  ?>
            ><label for="neuf">neuf</label>
            <input type="radio" name="neuf" id="neuf" value=0
            <?= ($velo['neuf']==0)?"checked":"";  ?>
            ><label for="neuf">occasion</label>
        </div>

        <!-- Promo -->
        <div class="creation-velo-form">
            <p> Promotion ?</p>
            <input type="radio" name="promo" id="promo" value=1
            <?= ($velo['promo']==1)?"checked":"";  ?>
            ><label for="promo">oui</label>
            <input type="radio" name="promo" id="promo" value=0
            <?= ($velo['promo']==0)?"checked":"";  ?>
            ><label for="promo">non</label>
        </div>

        <!-- photo -->
        <div class="creation-velo-form ">
            <img src="<?= URL ?>/public/assets/images/velos/<?=$velo['photo']?>" alt="" width="250px">
            <input type="hidden" name="old_photo" value="<?=$velo['photo']?>">
            <label for="photo">Photo :</label>
            <input type="file" name="photo" id="photo">
        </div>




        <div class="entryForm">
            <!-- Pour éviter d'envoyer à l'appui de la touche ENTER -->
            <!-- <input class="buttonEntryForm" type="button" value="Connexion"onclick="submit()"> -->
            <!-- sinon : -->
            <button type="submit">Modifier</button>
        </div>
        <div class="entryForm">
            <button><a href="<?= URL ?>admin/accueilAdmin">Retour</a></button>
        </div>


    </form>

</div>