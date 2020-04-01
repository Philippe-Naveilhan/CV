<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administration du CV Philippe NAVEILHAN</title>
</head>
<?php
include '../../src/functions.php';
include '../../src/data.php';
require '../../src/connect.php';
$pdo = new PDO(DSN, USER, PASS);
?>
<body id="aboutMe">
    <header>

    </header>
    <main>
        <?php
        include '../../src/update.php';
        ?>
        <section id="aboutMe">
            <div class="name">
                <h1>Philippe NAVEILHAN</h1>
                <h2>Administration du CV<br/>et de ses données</h2>
            </div>

        </section>

        <section id="competences">
            <?php
            chapter('Compétences');
            ?>

            <?php
            $statement = $pdo->query("SELECT * FROM competences WHERE visible=1");
            $competences = $statement->fetchAll();
            foreach ($competences as $competence => $items) {
                ?>
                <div class="radius comp_bloc">
                    <div>
                        <div class="comp_log">
                            <div class=""><b><?= $items[0] ?></b></div>
                            <div class=""><img src="../images/<?= $items[1] ?>" alt="<?= $items[0]?>"></div>
                        </div>
                        <div class="comp_grad">
                            <?php
                            for ($i=0;$i<$items[2];$i++)
                            {
                                echo "<div class='grad grad_color'>|</div>";
                            }
                            ?>
                            <?php
                            for ($i=0;$i<(20-$items[2]);$i++)
                            {
                                echo "<div class='grad'>|</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="overText"><p>
                            <?=
                            $items[3];
                            ?>
                        </p></div>
                    <div class="modifSuppr"><a href="admin.php?action=modif&domain=competences&key=<?=$items[0]?>">MODIF</a> - <a href="admin.php?action=suppr&domain=competences&key=<?=$items[0]?>">SUPPR</a></div>
                </div>
                <?php
            }
            ?>
            <div class="radius comp_bloc AJOUT">
                <div class="ajout_div"><a href="admin.php?action=add&domain=competences">
                        AJOUT DE COMPETENCES<br><big>+</big></a>
                </div>
            </div>
        </section>



        <section id="experiences">
            <?php
            chapter('Experiences');
            ?>
            <div class="content">
                <div class="timeline">
                    <?php
                    $statement = $pdo->query("SELECT * FROM experiences");
                    $experiences = $statement->fetchAll();
                    ?>

                    <?php
                    foreach($experiences as $experience => $poste){
                        ?>
                        <div class="blocExp">
                            <div class="time">
                                <div class="begin"><b><?= $poste[1]?></b></div>
                                <div class="end"><b><?= $poste[2]?></b></div>
                            </div>
                            <div class="poste">
                                <div class="posteTitre"><h2><?= $poste[3]?></h2><?= $poste[4]?></div>
                                <div class="posteSsTitre">
                                    <?= $poste[5] ?>
                                </div>

                            </div>
                            <div class="modifSuppr MSExp">
                                <a href="admin.php?action=modif&domain=experiences&key=<?= $poste[0] ?>">MODIF</a>
                                <a href="admin.php?action=suppr&domain=experiences&label=<?= $poste[3] ?>&key=<?= $poste[0] ?>">SUPPR</a>
                            </div>
                        </div>
                        <?php
                    };
                    ?>
                    <div class="blocExp">
                        <div class="time">
                            <div class="begin"><b>Début</b></div>
                            <div class="end"><b>Fin</b></div>
                        </div>
                        <div class="poste">
                            <div class="posteTitre"><h2>Job</h2>Country</div>
                            <div class="posteSsTitre addExp">
                                <div class="ajout_div"><a href="admin.php?action=add&domain=experiences">
                                        AJOUTER UNE EXPERIENCE<br><big>+</big></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    include '../include/footer.php';
?>
    </main>
</body>
</html>


