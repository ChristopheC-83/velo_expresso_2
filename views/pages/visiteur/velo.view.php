<div class="velo">

    <h2><?= $velo['marque'] ?> <?= $velo['modele'] ?></h2>

    <div class="carte-velo-detaille">
        <img src="<?= URL ?>public/assets/images/velos/<?= $velo['photo'] ?>" alt="">

        <table class="table-velo-detaille">
            <tr>
                <th>Marque</th>
                <td><?= $velo['marque'] ?></td>
            </tr>
            <tr>
                <th>Modèle</th>
                <td><?= $velo['modele'] ?></td>
            </tr>
            <tr>
                <th>Transmission</th>
                <td><?= $velo['nb_vitesses'] ?></td>
            </tr>
            <tr>
                <th>Taille des roues</th>
                <td><?= $velo['taille_roues'] ?> pouces</td>
            </tr>
            <tr>
                <th>Taille du cadre</th>
                <td><?= $velo['taille_cadre'] ?></td>
            </tr>
            <tr>
                <th>Electrique ?</th>
                <td><?= $velo['electrique'] === 0 ? "Non" : "Oui"?></td>
            </tr>
            <tr>
                <th>Type de vélo</th>
                <td><?= $velo['type_velo'] ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?= $velo['description'] ?></td>
            </tr>
           






        </table>



    </div>

   




</div>