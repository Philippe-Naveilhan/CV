<section id="competences">
    <?php
    chapter('Compétences');
    ?>
    <div class="content comp_list">
            <?php
            $competences = [
                'Illustrator' => ['illustrator.png', 13],
                'Photoshop' => ['photoshop.png', 10],
                'Ubuntu '=> ['ubuntu.png', 12],
                'HTML' => ['html.png', 15],
                'CSS' => ['css.png', 15],
                'PHP 7' => ['php.png', 12],
                'Symfony'=> ['symphony.png', 12],
                'Git '=> ['github.png', 15],
                'MySQL' => ['MySQL.png', 14]
            ];
            $fdGris=0;
            foreach ($competences as $competence => $items) {
                ?>
                <div class="radius comp_bloc <?php
                if ($fdGris==0){
                    echo " fd_medium";
                    $fdGris++;
                } else {
                    echo " fd_dark";
                    $fdGris--;
                };
                ?>">
                    <div class="comp_log">
                        <div class=""><?= $competence ?></div>
                        <div class=""><img src="../src/images/<?= $items[0] ?>" alt="<?= $items[0]?>"></div>
                    </div>
                    <div class="comp_grad">
                            <?php
                            for ($i=0;$i<$items[1];$i++)
                            {
                                echo "<div class='grad grad_color'>|</div>";
                            }
                            ?>
                            <?php
                            for ($i=0;$i<(20-$items[1]);$i++)
                            {
                                echo "<div class='grad'>|</div>";
                            }

                            ?>
                    </div>
                </div>
            <?php } ?>
    </div>
</section>
