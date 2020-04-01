<?php
function chapter($title)
{ ?>
    <div class="chapter">
        <div class="titleChapter radius">
            <h2><?= $title ?></h2>
        </div>
        <div>
            <div class="line"></div>
        </div>
    </div>
    <?php
}

    $dir='../images';
    $listPictures = scandir($dir);

?>