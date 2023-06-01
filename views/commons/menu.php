<nav class="navigation ">

    <div class="navlinks-container">
        <a href="<?= URL ?>accueil" >
            Accueil
        </a>
        <a href="<?= URL ?>velos">
            Vélos
        </a>
        <a href="<?= URL ?>occasions">
            Occasions
        </a>
        <a href="<?= URL ?>locations">
            Location
        </a>
        <a href="<?= URL ?>mecanique">
            Mécanique
        </a>
        <a href="<?= URL ?>sorties">
            RDV des passionnés
        </a>
        <?php if(estConnecte()) : ?>
            <a href="<?= URL ?>admin/accueilAdmin">
            Accueil Admin
        </a>
            <a href="<?= URL ?>admin/deconnexion">
         Déconnexion
        </a>

            <?php endif ; ?>
    </div>
 






</nav>