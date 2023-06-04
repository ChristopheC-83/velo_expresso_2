<div class="pageCriteres visualisation-velos">

    <h1>Visualisation des vélos <?= $neufs ?></h1>



    <table class="tableVE">

        <thead>
            <tr>
                <th>Marque</th>
                <th>Modele</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($velos as $velo) : ?>
                <tr>
                    <td><?= $velo['marque']  ?></td>
                    <td><?= $velo['modele']  ?></td>
                    <td><?= $velo['prix']  ?></td>
                    <td><button class="modifier">
                        <a href="<?= URL ?>admin/velos/modificationVelo/<?= $velo['velo_id'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </button></td>
                    <td>
                        <form action="<?= URL ?>admin/velos/validationVeloSuppression" method="post" onSubmit="return confirm('On valide la suppression ?')">
                            <input type="hidden" name="id" value="<?= $velo['velo_id'] ?>">
                            <button class="supprimer" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                        </form>


                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>



    <!-- <?= afficherTableau($velos) ?> -->

</div>