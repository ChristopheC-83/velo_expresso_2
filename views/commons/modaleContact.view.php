<div class="overlay-contact"></div>
<div class="content-modale ">

    <h2>Formulaire de contact</h2>
    <form action="mailContact" method="post" id="contactForm">
        <div class="content-form">
            <div class="content-form-info">
                <input type="text" placeholder="votre nom" name="nomFormulaire" id="nomFormulaire">
                <input type="email" placeholder="votre email" name="mailFormulaire" id="mailFormulaire">
                <h4 class="numTel">📞 : <a href="tel:+0466951709">04.66.95.17.09</a></h4>


            </div>
            <button type="submit" class="envoyerMessage">
                <h4>✅Envoyer</h4>
            </button>
            <h4 class="fermerModaleContact">❌ Annuler</h4>
            <div class="content-form-message">
                <label for="messageFormulaire">Votre message :</label>
                <textarea name="messageFormulaire" id="messageFormulaire" cols="30" rows="10" placeholder="Nous y répondrons dès que possible !
                Merci !"></textarea>
            </div>
        </div>
    </form>

    <div id="contact-loading-animation">
        <div class="contact-spinner"></div>
        <p>Envoi du formulaire en cours...</p>
    </div>
</div>