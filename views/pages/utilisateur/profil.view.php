<div class="animTitres <?= $css ?>">

    <h1><?= $utilisateur['login'] ?> : votre profil</h1>
    <h2>Profil et modifications</h2>


    <p>Nom : <?= $utilisateur['login'] ?></p>
    <br>
    <p>Mail : <?= $utilisateur['mail'] ?> <i class="fa-solid fa-square-pen" id="btn_modif_mail"></i></p>
    <br>
    <div id="modif_mail" class="dnone">
    <br>
        <form action="<?URL?>compte/validation_modificationMail" method="post" class="form_entry_form">
            <div class="entryForm">
                <input type="text" id="login" name="login" placeholder="Nouveau Mail">
            </div>
            <div class="entryForm">
                <button id="btn_validation__modif_mail">Valider nouveau mail</button>
            </div>
        </form>

    </div>
   
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



</div>