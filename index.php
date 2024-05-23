<?php
    include "conf.php";

    $notesArray = scandir($CONF["pathNotes"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
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

        <div class="notesBox">
            <?php
                for ($i = 2; $i < count($notesArray); $i++)
                {
                    print("<p>---------</p>");
                    print("<p><b>" . basename($notesArray[$i], ".txt") . "</b></p>");
                    $readFile = file_get_contents($CONF["pathNotes"] . "/" . $notesArray[$i]);
                    print("<p>" . $readFile . "</p>");
                    print("<p>---------</p>");
                }
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
