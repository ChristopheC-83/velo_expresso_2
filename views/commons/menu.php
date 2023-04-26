<nav class="navigation">
    <ul>
        <a href="<?= URL ?>accueil">
            <li>Accueil</li>
        </a>

        <?php if (!estConnecte()) :  ?>
            <a href="<?= URL ?>login">
                <li>Se connecter</li>
            </a>
            <a href="<?= URL ?>creerCompte">
                <li>S'enregistrer</li>
            </a>

        <?php else : ?>
            <a href="<?= URL ?>compte/profil">
                <li>Profil</li>
            </a>

            <?php if (estAdministrateur()) :  ?>
                <a href="<?= URL ?>admin/gestion_droits">
                    <li>Gestion des droits</li>
                </a>

            <?php endif ?>
            <a href="<?= URL ?>compte/deconnexion">
                <li>Déconnexion</li>
            </a>

        <?php endif ?>

    </ul>
</nav>