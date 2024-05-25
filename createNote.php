<?php
    include "conf.php";

    $isCreate = false;
    $isCreateResult = "";

    if ($_POST["noteName"] != "" && $_POST["noteText"] != "")
    {
        $newNote = fopen($CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt", "w");
        fwrite($newNote, $_POST["noteText"]);
        fclose($newNote);

        $isCreate = true;
        $isCreateResult = "Заметка успешно создана";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/createNote.css">
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

        <div class="createNote">
            <form action="createNote.php" method="post">
                <p>Имя заметки:</p>
                <input type="text" name="noteName">
                <p>Текст заметки:</p>
                <textarea name="noteText" id="noteText" rows="15"></textarea>
                <input type="submit" value="Создать">
            </form>

            <?php
                if ($isCreate == true)
                {
                    print("<p>" . $isCreateResult . "</p>");
                }
            ?>
            <p> <a href="./">На главную</a> </p>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
