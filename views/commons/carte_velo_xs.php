<div class="carte-velo">
    <img src="<?= URL ?>public/assets/images/velos/<?= $velo['photo'] ?>" alt="">
    <form action="detail_velo" method="post">
        <input type="hidden" name="idVelo" value="<?= $velo['id'] ?>">
        <div class="soumettre"><i class="fa-solid fa-circle-plus plus"></i></div>
    </form>

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