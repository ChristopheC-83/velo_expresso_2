<div class="pageCriteres">
    <h1>Visualisation :</h1>
    <h2> <?= $critere ?></h2>


    <?php
    $id_critere =  $nomColonnes[0]['nomColonne'];
    $nom_critere =  $nomColonnes[1]['nomColonne'];
    ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th><?= $critere ?></th>
                <th>modifier</th>
                <th>supprimer</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($criteresItems as $criteresItem) : ?>

                <tr>
                    <td><?=$criteresItem[$id_critere]?></td>
                    <td><?=$criteresItem[$nom_critere]?></td>
                    <td><button class="modifier">Mod.</button></td>
                    <td><button class="supprimer">Supp.</button></td>




                </tr>



            <?php endforeach ?>
        </tbody>


    </table>






</div>