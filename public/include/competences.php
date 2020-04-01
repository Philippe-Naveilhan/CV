<section id="competences">
    <?php
    chapter('Compétences');
    ?>
    <div class="content comp_list">
            <?php
            $bottomLine=1;
            foreach ($competences as $competence => $items) {
                if ($items[4]==1){
                ?>
                <div class="radius comp_bloc<?php
                    if ($bottomLine<count($competences)){?>
                     bottom_line <?php
                    }
                    $bottomLine++;
                ?>
                ">
                    <div>
                    <div class="comp_log">
                        <div class=""><b><?= $items[0] ?></b></div>
                        <div class=""><img src="images/<?= $items[1] ?>" alt="<?= $items[0]?>"></div>
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
                </div>
            <?php
            }}
            ?>
    </div>
</section>