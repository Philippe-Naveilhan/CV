<section id="experiences">
    <?php
    chapter('Expérience');
    ?>
    <div class="content">
        <div class="timeline">
            <?php
            ?>

            <?php
            foreach($experiences as $experience => $poste){
            ?>
            <div class="blocExp">
                <div class="time">
                    <div class="begin"><b><?= $poste[0]?></b></div>
                    <div class="end"><b><?= $poste[1]?></b></div>
                </div>
                <div class="poste">
                    <div class="posteTitre"><h2><?= $poste[2]?></h2><?= $poste[3]?></div>
                    <div class="posteSsTitre">
                        <ol>
                            <?php
                            foreach($poste[4] as $activities=>$activity)
                            {
                            ?>
                            <li><?= $activity ?></li>
                            <?php
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
            <?php
            };
            ?>
        </div>
    </div>
</section>
