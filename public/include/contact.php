<section id="contact">
    <?php
    chapter('Contact');

    /// vérification des données du formulaire.
    ///
    if (!empty($_POST)) {
        if (count($mistakes) > 0) {
            ?>
            <div class="errorPOST">
                <ul>
                    <?php
                    for ($i = 0; $i < count($mistakes); $i++) {
                        echo "<li>" . $mistakes[$i] . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
    }
 ?>
<div class="content">

    <form id="comments" action="index.php#contact" method="post">
        <div class="bloc left">
            <p>
                <label for="form_name">Nom</label><br>
                <input id="form_name" name="name" type="text" value="<?= $answers['name'] ?? '' ?>" title="Votre nom" placeholder="Ex: Philippe NAVEILHAN" required>
            </p>
            <p>
                <label for="form_mel">Mail</label><br>
                <input id="form_mel" name="email" type="email" value="<?= $answers['email'] ?? '' ?>" title="Votre mail" placeholder="Ex: philippe@naveilhan.com">
            </p>
            <p>
                <label for="form_tel">Téléphone</label><br>
                <input id="form_tel" name="tel" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="<?= $answers['tel'] ?? '' ?>" title="Votre téléphone" placeholder="Ex: 01.23.45.67.89">
            </p>
            <p>
                <label for="form_web">Site de votre entreprise</label><br>
                <input id="form_web" name="url" type="url" value="<?= $answers['url'] ?? '' ?>" title="Votre site web" placeholder="Ex: http://www.votre-entreprise.fr">
            </p>
        </div>
        <div class="bloc right">
            <p><label for="form_message">Message</label><br><textarea id="form_message" name="comment" cols="30" rows="6" class="required" title="Votre message" placeholder="Que puis-je pour vous ?." required><?= $answers['comment'] ?? '' ?></textarea></p>
            <p class="submit"><button>Envoyer mon message</button></p>
        </div>
    </form>
</section>