<?php
    include "conf.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/viewer.css">
    </head>

    <body>
        <header>
            <div class="header_logo">
                <a href="./"> <img src="img/favicon.png" width="75px" height="75px"> </a>
            </div>

            <div class="header_link">
                <a href="./"> <b> <i> <?php print($CONF["company"]); ?> </i> </b> </a>
            </div>
        </header>

        <div class="viewerNote">
            <?php print("<p> <a href='./edit.php?name=" . $_GET["name"] . "'>Редактировать</a> </p>"); ?>
            <p>Имя заметки: <b> <?php print($_GET["name"]); ?> </b> </p>
            <p>Текст заметки:</p>

            <?php
                $noteText = file_get_contents($CONF["pathNotes"] . "/" . $_GET["name"] . ".txt");
                print("<textarea name='noteText' id='noteText' rows='15'>" . $noteText . "</textarea>");
            ?>

            <a href="./">На главную</a>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
