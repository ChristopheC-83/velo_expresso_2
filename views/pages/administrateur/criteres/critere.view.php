<div class="pageCriteres">
    <h1>Visualisation :</h1>
    <h2> <?= $critere ?></h2>


    <?php
    $id_critere =  $nomColonnes[0]['nomColonne'];
    $nom_critere =  $nomColonnes[1]['nomColonne'];

    // echo $id_critere;
    // echo $nom_critere;

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
                    <td><?= $criteresItem[$id_critere] ?></td>
                    <td><?= $criteresItem[$nom_critere] ?></td>
                    <td><button class="modifier">Mod.</button></td>
                    <td>
                        <form 
                        action="<?= URL ?>admin/<?= $critere ?>/validationSuppression" 
                        method="post"
                        onSubmit="return confirm('On valide la suppression ?')"
                        >
                            <input type="hidden" name="id_critere" value="<?= $criteresItem[$id_critere] ?>">
                            <input type="hidden" name="nom_colonne_id_critere" value="<?= $id_critere ?>">
                            <input type="hidden" name="critere" value="<?= $critere ?>">
                            <button class="supprimer" type="submit">Supp.</button>
                        </form>



                    </td>
                </tr>



            <?php endforeach ?>
        </tbody>


    </table>






</div>