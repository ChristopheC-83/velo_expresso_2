<div class="animTitres <?= $css ?>">

    <h1>Page de création de compte</h1>

    <form action="validation_creerCompte" method="post" class="form_entry_form">

        <div class="entryForm">
            <label for="login">Nom : </label>
            <input type="text" id="login" name="login">
        </div>
        <div class="entryForm">
            <label for="password">Password : </label>
            <input type="password" id="passwordCreation" name="password">
        </div>
        <div class="entryForm">
            <label for="password">Vérification Password : </label>
            <input type="password" id="verif_passwordCreation" name="password">
        </div>
        <div class="entryForm">
            <label for="mail">Mail :  </label>
            <input type="mail" id="mail" name="mail">
        </div>

        <div class="entryForm" >
            <button id="btnEnregistrement">Enregistrer</button>
        </div>

    </form>

    <!-- créer une table personnaliser pour todo list -->
    <!-- faire un bouton pour afficher mot de passe -->



</div>