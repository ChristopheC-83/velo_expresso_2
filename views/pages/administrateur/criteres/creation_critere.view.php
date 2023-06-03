<div class="pageCreationCritere">

<h1>Création :</h1>
    <h2> <?= $critere ?></h2>

    <form action="<?= URL ?>admin/<?= $critere ?>/validationCreation" method="post" class="form_entry_form">

        <div class="entryForm">
            <label for="infoCritere">Nouvelle Information : </label>
            <input type="text" id="infoCritere" name="infoCritere">
        </div>
       

        <div class="entryForm">
            <!-- Pour éviter d'envoyer à l'appui de la touche ENTER -->
            <!-- <input class="buttonEntryForm" type="button" value="Connexion"onclick="submit()"> -->
            <!-- sinon : -->
            <button>Création</button>
        </div>
        <div class="entryForm">
            <button><a href="<?= URL ?>admin/accueilAdmin">Retour</a></button>
        </div>
        
        
    </form>

</div>