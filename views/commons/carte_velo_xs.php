<div class="carte-velo">
    <img src="<?= URL ?>public/assets/images/velos/<?= $velo['photo'] ?>" alt="">

    <form action="<?= URL ?>velo_detaille" method="post" id="form_velo_plus<?= $velo['velo_id'] ?>">
        <input type="hidden" name="velo_id" value="<?= $velo['velo_id'] ?>">
    </form>

    <i class="fa-solid fa-circle-plus plus plus_form_velo_plus" data-num="<?= $velo['velo_id'] ?>"></i>

    <div class="info">
        <div class="info-content">
            <p><u><b>Marque</b></u> : <?= $velo['marque'] ?></p>
            <p><u><b>Modèle</b></u> : <?= $velo['modele'] ?></p>
        </div>
        <div class="info-content">
            <p><b><u>Prix :</u></b> </p>
            <p><?= $velo['prix'] ?> €</p>
        </div>
    </div>





</div>