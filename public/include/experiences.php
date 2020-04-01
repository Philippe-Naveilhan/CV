<section id="experiences">
    <?php
    chapter('Expérience');
    ?>
    <div class="content">
        <div class="timeline">
            <?php
            $statement = $pdo->query("SELECT * FROM experiences ORDER BY date_begin ASC ");
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
            </div>
            <?php
            };
            ?>
        </div>
    </div>
</section>
