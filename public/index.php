<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CV Philippe NAVEILHAN</title>
</head>
<?php
include '../src/functions.php'
?>
<body id="home">
    <header>
        <?php
        include 'include/header.php';
        ?>
    </header>
    <main>
        <?php
        include 'include/aboutMe.php';
        include 'include/competences.php';
        include 'include/experiences.php';
        include 'include/realisations.php';
        include 'include/contact.php';
        include 'include/footer.php';
        ?>
    </main>
</body>
</html>