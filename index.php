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
        <link rel="stylesheet" href="css/index.css">
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

        <div class="notesPanel">
            <a class="addNote" href="./createNote.php">Добавить заметку</a>
        </div>

        <div class="notesBox">
            <?php
                for ($i = 2; $i < count($notesArray); $i++)
                {
                    print("<div class='note'>");
                    print("<div class='noteHead'>");
                    print("<a class='noteName' href='./viewer.php?name=" . basename($notesArray[$i], ".txt") . "'> <b>" . basename($notesArray[$i], ".txt") . "</b></a>");
                    print("<a class='noteAction' href='deleteQuestion.php?name=" . basename($notesArray[$i], ".txt") . "'> <img src='img/delete.png' width='25px' height='25px'> </a>");
                    print("</div>");
                    print("<div class='noteText'>");

                    $openNote = fopen($CONF["pathNotes"] . "/" . $notesArray[$i], "r");
                    print("<p>" . fgets($openNote) . "</p>");

                    if (!feof($openNote))
                    {
                        print("<p>...</p>");
                    }
                    else
                    {
                        print("<br>");
                    }

                    fclose($openNote);

                    print("</div>");
                    print("</div>");
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
