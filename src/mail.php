<?php
/* traitement des données formulaires $_POST[] */
/* puis retour sur page accueil */
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    if (!empty($_POST)) {
        foreach ($_POST AS $KEY => $VALUE) {
            $answers[$KEY] = trim($VALUE);
        }

        $mistakes = array();

        /* verifier nom */

        if ($answers['name'] == '') {
            $mistakes[] = "Merci de m'indiquer votre nom.";
        }

        /* verif mail & tel */

        if (($answers['email'] == '') && ($answers['tel'] == '')) {
            $mistakes[] = "Une adresse mail ou un numéro de téléphone est nécessaire.";
        }

        if (!empty($answers['email'])) {
            if (!filter_var($answers['email'], FILTER_VALIDATE_EMAIL)) {
                $mistakes[] = "Votre adresse mail ne semble pas valide.";
            }
        }
        if (!empty($answers['url'])) {
            if (!filter_var($answers['url'], FILTER_VALIDATE_URL)) {
                $mistakes[] = "L'URL saisie ne semble pas valide.";
            }
        }

        /* verif url */


        /* verif message */

        if ($answers['comment'] == '') {
            $mistakes[] = "Quel est votre message ?";
        }
        if (empty($mistakes)) {
            ///traitement des données & vidage des données
            $answers = [];
            header('location:index.php?message=ok#aboutMe');
        }
    }
}
?>