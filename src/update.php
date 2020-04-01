<?php

if (!empty($_GET)) {

    if ($_GET['domain'] == 'competences') {

        if ($_GET['action'] == 'suppr') { ?>
            <div class="errorPOST AR_form">
                <p>Vous souhaitez supprimer <?= $_GET['key'] ?> ? </p>
                <p><a href="admin.php?action=delete&domain=competences&key=<?= $_GET['key'] ?>">OUI</a><a
                            href="admin.php">NON</a>
                </p>
            </div>
            <?php

        } elseif ($_GET['action'] == 'delete') {
            $pdo->query("UPDATE competences SET visible='0' WHERE name = '$_GET[key]'"); ?>
            <div class="errorPOST AR_form">
                <p>Votre compétence a été supprimée.<br> Vous m'en voyez désolé... <br><a href="admin.php">Continuer ma
                        mise à jour</a>
                </p>
            </div>

            <?php

        } elseif ($_GET['action'] == 'modif') {
            $statement = $pdo->query("SELECT * FROM competences WHERE name='$_GET[key]'");
            $mod_comps = $statement->fetchAll();
            foreach ($mod_comps as $mod_comp => $donnees) {
                ?>

                <div class="errorPOST AR_form">
                    <form method="post" action="admin.php?action=update&domain=competences">
                        <p>
                            <label for="form_name">Domaine</label>
                            <input id="form_name" name="form_name" type="text" value="<?= $donnees['name'] ?>"
                                   title="Votre compétence" required>
                        </p>
                        <p>
                            <label for="logo">Image</label>
                            <select id="logo" name="logo" type="text" value="<?= $donnees['logo'] ?>"
                                   title="logo" required>
                                <?php
                                for ($i = 2; $i < count($listPictures); $i++) { ?>
                                    <option value="<?= $listPictures[$i] ?>"<?php
                                    if ($listPictures[$i] == $donnees['logo']) {
                                        ?> selected="selected"<?php
                                    }
                                    ?>><?= $listPictures[$i] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </p>
                        <p>
                            <label for="note">Note</label>
                            <select id="note" name="note" required>
                                <?php
                                for ($i = 1; $i <= 20; $i++) {
                                    ?>
                                    <option value="<?= $i ?>"<?php
                                    if ($i == $donnees['note']) { ?> selected="selected"<?php
                                    }
                                    ?>><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </p>
                        <p>
                            <label for="content">Texte</label><br><textarea id="content" name="content" cols="20"
                                                                            rows="3"
                                                                            class="required" title="Votre commentaire"
                                                                            required><?= $donnees['comment'] ?></textarea>
                        </p>
                        <button>Modifier</button>
                    </form>
                </div>
                <?php
            }
        } elseif ($_GET['action'] == 'add') { ?>
            <div class="errorPOST AR_form">
                <form method="post" action="admin.php?action=add_comp&domain=competences">
                    <p>
                        <label for="form_name">Domaine</label>
                        <input id="form_name" name="form_name" type="text" value=""
                               title="Votre compétence" required>
                    </p>
                    <p>
                        <label for="logo">Image</label>
                        <select id="logo" name="logo" type="text" title="logo">
                            <?php
                            for ($i = 2; $i < count($listPictures); $i++) { ?>
                                <option value="<?= $listPictures[$i] ?>"><?= $listPictures[$i] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <label for="note">Note</label>
                        <select id="note" name="note" value="" required>
                            <?php
                            for ($i = 1; $i <= 20; $i++) {
                                ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <label for="content">Texte</label><br><textarea id="content" name="content" cols="20" rows="3"
                                                                        class="required" title="Votre commentaire"
                                                                        required></textarea>
                    </p>
                    <button>Ajouter</button>
                </form>
            </div>
            <?php
        } elseif ($_GET['action'] == 'add_comp') { ?>
            <div class="errorPOST AR_form"><?php
            $valAddComp['name'] = addslashes($_POST['form_name']);
            $valAddComp['logo'] = $_POST['logo'];
            $valAddComp['note'] = $_POST['note'];
            $valAddComp['comment'] = addslashes($_POST['content']);
            $pdo->query("INSERT INTO competences VALUES ('$valAddComp[name]','$valAddComp[logo]','$valAddComp[note]','$valAddComp[comment]',1)"); ?>
            <p>Nouvelle compétence acquise ! Allez fêter ça !</p>
            </div><?php
        }
        if (!empty($_POST) && $_GET['action'] == 'update') {
            $form_data = $_POST;
            $form_data['content'] = addslashes($form_data['content']);

            $pdo->query("UPDATE competences SET name='$_POST[form_name]', logo='$_POST[logo]', note='$_POST[note]', comment='$form_data[content]' WHERE name = '$_POST[form_name]'");
        }
    }

    if ($_GET['domain'] == 'experiences') {

        if ($_GET['action'] == 'add') { ?>
            <div class="errorPOST AR_form">
                <form id="comments" action="admin.php?domain=experiences&action=add_exp" method="post">
                    <div class="bloc left">
                        <p>
                            <label for="date_begin">Debut</label>
                            <input id="date_begin" name="date_begin" type="text" title="date_begin"
                                   placeholder="de quand..." required>
                        </p>
                        <p>
                            <label for="date_end">Fin</label>
                            <input id="date_end" name="date_end" type="text" title="date_end" placeholder="... à quand">
                        </p>
                        <p>
                            <label for="job">Métier</label>
                            <input id="job" name="job" type="text" value=""
                                   title="job" placeholder="Intitulé métier"">
                        </p>
                        <p>
                            <label for="country">Où ?</label>
                            <input id="country" name="country" type="text" title="country"
                                   placeholder="Lieu, entreprise...">
                        </p>
                    </div>
                    <div class="bloc right">
                        <p><label for="content">Descriptif</label><br><textarea id="content" name="content"
                                                                                cols="30" rows="6" class="required"
                                                                                title="Decrivez vos actions et missions"
                                                                                required></textarea>
                        </p>
                        <p class="submit">
                            <button>Valider cette expérience</button>
                        </p>
                    </div>
                </form>
            </div>
            <?php
        } elseif ($_GET['action'] == 'modif') {
            $statement = $pdo->query("SELECT * FROM experiences WHERE id='$_GET[key]'");
            $mod_exps = $statement->fetchAll();
            foreach ($mod_exps as $mod_exp => $donnees) {
                ?>
                <div class="errorPOST AR_form">
                    <form id="comments" action="admin.php?domain=experiences&action=update&key=<?= $donnees['id'] ?>"
                          method="post">
                        <div class="bloc left">
                            <p>
                                <label for="date_begin">Debut</label>
                                <input id="date_begin" name="date_begin" type="text" title="date_begin"
                                       value="<?= $donnees['date_begin'] ?>" placeholder="de quand..." required>
                            </p>
                            <p>
                                <label for="date_end">Fin</label>
                                <input id="date_end" name="date_end" type="text" title="date_end"
                                       value="<?= $donnees['date_end'] ?>" placeholder="... à quand">
                            </p>
                            <p>
                                <label for="job">Métier</label>
                                <input id="job" name="job" type="text" value="<?= $donnees['job'] ?>"
                                       title="job" placeholder="Intitulé métier"">
                            </p>
                            <p>
                                <label for="country">Où ?</label>
                                <input id="country" name="country" type="text" value="<?= $donnees['country'] ?>"
                                       title="country" placeholder="Lieu, entreprise...">
                            </p>
                        </div>
                        <div class="bloc right">
                            <p><label for="content">Descriptif</label><br><textarea id="content" name="content"
                                                                                    cols="30" rows="6" class="required"
                                                                                    title="Decrivez vos actions et missions"
                                                                                    required><?= $donnees['content'] ?></textarea>
                            </p>
                            <p class="submit">
                                <button>Modifier cette experience cette expérience</button>
                            </p>
                        </div>
                    </form>
                </div>
            <?php }
        } elseif (!empty($_POST) && $_GET['action'] == 'update') {
            $valAddExp['id'] = $_GET['key'];
            $valAddExp['date_begin'] = htmlentities($_POST['date_begin']);
            $valAddExp['date_begin'] = addslashes($valAddExp['date_begin']);
            $valAddExp['date_end'] = htmlentities($_POST['date_end']);
            $valAddExp['date_end'] = addslashes($valAddExp['date_end']);
            $valAddExp['job'] = htmlentities($_POST['job']);
            $valAddExp['job'] = addslashes($valAddExp['job']);
            $valAddExp['country'] = htmlentities($_POST['country']);
            $valAddExp['country'] = addslashes($valAddExp['country']);
            $valAddExp['content'] = htmlentities($_POST['content']);
            $valAddExp['content'] = addslashes($valAddExp['content']);

            $pdo->query("UPDATE experiences SET date_begin='$valAddExp[date_begin]', date_end='$valAddExp[date_end]', job='$valAddExp[job]', country='$valAddExp[country]', content='$valAddExp[content]' WHERE id='$valAddExp[id]'");
            ?>
            <div class="errorPOST AR_form">
                <p>Mise à jour OK !</p>
            </div>
            <?php
        } elseif ($_GET['action'] == 'suppr') { ?>
            <div class="errorPOST AR_form">
                <p>Vous souhaitez supprimer <?= $_GET['label'] ?> ? </p>
                <p><a href="admin.php?action=delete&domain=experiences&key=<?= $_GET['key'] ?>">OUI</a><a
                            href="admin.php">NON</a>
                </p>
            </div>
            <?php

        } elseif ($_GET['action'] == 'delete') {
            settype($_GET['key'],"integer");
            $pdo->query("DELETE FROM experiences WHERE id='$_GET[key]'");
            ?>

            <div class="errorPOST AR_form">
                <p>Cette expérience a été supprimée.<br><a href="admin.php">Continuer ma
                        mise à jour</a>
                </p>
            </div>

            <?php

        } elseif ($_GET['action'] == 'add_exp') {
            $valAddExp['date_begin'] = htmlentities($_POST['date_begin']);
            $valAddExp['date_begin'] = addslashes($valAddExp['date_begin']);
            $valAddExp['date_end'] = htmlentities($_POST['date_end']);
            $valAddExp['date_end'] = addslashes($valAddExp['date_end']);
            $valAddExp['job'] = htmlentities($_POST['job']);
            $valAddExp['job'] = addslashes($valAddExp['job']);
            $valAddExp['country'] = htmlentities($_POST['country']);
            $valAddExp['country'] = addslashes($valAddExp['country']);
            $valAddExp['content'] = htmlentities($_POST['content']);
            $valAddExp['content'] = addslashes($valAddExp['content']);

            $pdo->query("INSERT INTO experiences (date_begin,date_end,job,country,content) VALUES ('$valAddExp[date_begin]','$valAddExp[date_end]','$valAddExp[job]','$valAddExp[country]','$valAddExp[content]')"); ?>
            <div class="errorPOST AR_form">
            <p>Nouvelle expérience enregistrée !</p>
            </div><?php
        }
    }
}
?>
