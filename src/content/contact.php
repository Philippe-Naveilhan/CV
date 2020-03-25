<section id="contact">
    <?php
    chapter('Contact');
    ?>
<div class="content">
    <form id="comments" action="../src/content/mail.php" method="post">
        <div class="bloc left">
            <p>
                <label for="form_nom">Nom </label>
                <input id="form_nom" name="name" type="text" value="" title="Votre nom" placeholder="your name" required>
            </p>
            <p>
                <label for="form_mel">E-mail </label>
                <input id="form_mel" name="email" type="email" value="" title="Votre mail" placeholder="you@domain.xxx">
            </p>
            <p>
                <label for="form_tel">Tél </label>
                <input id="form_tel" name="tel" type="tel" value="" title="Votre téléphone" placeholder="xx.xx.xx.xx.xx">
            </p>
            <p>
                <label for="form_web">Site web </label>
                <input id="form_web" name="url" type="url" value="" title="Votre site web" placeholder="http://www...">
            </p>
        </div>
        <div class="bloc right">
            <p><label for="form_message"></label><textarea id="form_message" name="comment" cols="30" rows="11" class="required" title="Votre message *" placeholder="Message..." required></textarea></p>
            <p class="submit"><button>Envoyer ma requête</button></p>
        </div>
    </form>
</section>