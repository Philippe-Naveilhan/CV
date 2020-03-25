<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>CV Philippe NAVEILHAN</title>
</head>
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
?>
<body id="home">
    <header>
        <?php
        include '../src/content/header.php';
        ?>
    </header>
    <main>
        <?php
        include '../src/content/aboutMe.php';
        include '../src/content/competences.php';
        include '../src/content/experiences.php';
/*        include '../src/content/realisations.php';
        include '../src/content/contact.php';
        include '../src/content/footer.php';*/
        ?>
    </main>
</body>
</html>