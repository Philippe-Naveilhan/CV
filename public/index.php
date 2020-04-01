<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/print.css" media="print">
    <title>CV Philippe NAVEILHAN</title>
</head>
<?php
require  '../src/connect.php';
$pdo = new PDO(DSN, USER, PASS);
$statement = $pdo->query("SELECT * FROM competences WHERE visible=1");
$competences = $statement->fetchAll();

include '../src/mail.php';
include '../src/functions.php';
include '../src/data.php';
?>
<body id="aboutMe">
    <header>
        <?php
        include 'include/header.php';
        ?>
    </header>
    <main>
        <?php
        if (!empty($_GET)){
            if ($_GET['message']=='ok') {?>
                     <div class="errorPOST AR_form">
                         <p>Votre message a bien été envoyé, <br>je ne manquerai pas de revenir vers vous au plus vite.</p>
                    </div>
                <?php
            }
        }

        foreach($parts as $part=>$title){
            $path = "include/".$part.".php";
            include $path;
        }
        include 'include/footer.php';
        ?>
    </main>
</body>
</html>


