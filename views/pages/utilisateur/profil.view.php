<div class="animTitres <?= $css ?>">

    <h1><?= $utilisateur['login'] ?> : votre profil</h1>
    <h2>Profil et modifications</h2>

    <div class="imgProfil">
        <img src="<?=URL?>/public/assets/images/<?=$utilisateur['image']?>" alt="photo de profil">
        <form action="<?=URL?>compte/validation_modifImage" enctype="multipart/form-data" method="post">
            <label for="image">Changer votre image de profil</label><br>
            <input type="file" id="image" name="image" onchange="submit()">

        </form>
    </div>


    <p>Nom : <?= $utilisateur['login'] ?></p>
    <br>
    <p>Mail : <?= $utilisateur['mail'] ?> <i class="fa-solid fa-square-pen" id="btn_modif_mail"></i></p>
    <br>


    <p>Statut : <?= $utilisateur['role'] ?></p>
    <br>
    <p>Compte :
        <?php if ($utilisateur['est_valide'] === 1) : ?>
            validé
        <?php else : ?>
            en attente de validation
        <?php endif ?>
    </p>
    <br>
    <p>Modifier le mot de passe <i class="fa-solid fa-square-pen" id="btn_modif_mdp"></i></p>
    <br>
    <p >Supprimer mon compte <span id="btn_suppression_compte">❌</span></p>

    <div id="suppression_compte" class="dnone">
        <a href="<?=URL?>compte/suppressionCompte">
            <div class="entryForm">
                <button id="btn_validation_suppression_compte" class="btn_suppression">Valider la suppression irréversible<br> de mon compte.</button>
            </div>
        </a>
    </div>
    <div id="modif_mail" class="dnone">
        <br>
        <form action="<?= URL ?>compte/validation_modificationMail" method="post" class="form_entry_form">
            <div class="entryForm">
                <input type="mail" id="mail" name="mail" placeholder="Nouveau Mail">
            </div>
            <div class="entryForm">
                <button id="btn_validation_modif_mail">Valider nouveau mail</button>
            </div>
        </form>

    </div>
    <div id="modif_mdp" class="dnone">
        <br>
        <form action="<?= URL ?>compte/validation_modificationMDP" method="post" class="form_entry_form">
            <div class="entryForm">
                <input type="password" id="oldPassword" name="oldPassword" placeholder="Ancien Mot de passe">
            </div>
            <div class="entryForm formPsw">
                <input type="password" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
            </div>
            <div class="entryForm">
                <input type="password" id="verifNewPassword" name="verifNewPassword" placeholder="Confirmation nouveau mot de passe">
            </div>

            <div class="entryForm">
                <button id="msg_psw_diff" class="btn_info dnone">Les 2 mots de passe ne correspondent pas !</button>
            </div>
            <div class="entryForm">
                <button id="btn_validation_modif_mdp" class="btn_disable">Valider nouveau mot de passe</button>
            </div>
        </form>

    </div>



</div>