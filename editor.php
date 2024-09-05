<?php
    include "conf.php";

    $isEdit = false;
    $isEditResult = "";

    if ($_POST["noteName"] != "" && $_POST["oldName"] != "" && $_POST["noteText"] != "")
    {
        rename($CONF["pathNotes"] . "/" . $_POST["oldName"] . ".txt", $CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt");

        $editNote = fopen($CONF["pathNotes"] . "/" . $_POST["noteName"] . ".txt", "w");
        fwrite($editNote, $_POST["noteText"]);
        fclose($editNote);

        $_POST["oldName"] = $_POST["noteName"];

        $isEdit = true;
        $isEditResult = "Успешно изменено";
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
        <link rel="stylesheet" href="css/editor.css">
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

        <div class="editorNote">
            <form action='editor.php' method='post'>
                <p>Изменение имени заметки: </p>
                <?php
                    print("<input type='text' name='oldName' value='" . $_POST["oldName"] . "' hidden>");
                    print("<input type='text' name='noteName' id='noteName' value='" . $_POST["oldName"] . "'>");
                ?>

                <p>Изменение текста заметки:</p>

                <div class="editorButtons">
                    <button type="button" onclick="insertHeader('1')">h1</button>
                    <button type="button" onclick="insertHeader('2')">h2</button>
                    <button type="button" onclick="insertHeader('3')">h3</button>
                    <button type="button" onclick="insertHeader('4')">h4</button>
                    <button type="button" onclick="insertHeader('5')">h5</button>
                    <button type="button" onclick="insertHeader('6')">h6</button>
                    <button type="button" onclick="insertList('ol')">1.</button>
                    <button type="button" onclick="insertList('ul')">*</button>
                    <button type="button" onclick="insertLink()">link</button>
                    <button type="button" onclick="insertImg()">img</button>
                    <button type="button" onclick="insertCode()">code</button>
                </div>

                <?php print("<a href='viewer.php?name=" . $_POST["oldName"] . "'>Открыть просмотр</a>"); ?>

                <?php
                    $noteText = file_get_contents($CONF["pathNotes"] . "/" . $_POST["oldName"] . ".txt");
                    print("<textarea name='noteText' id='noteText' rows='15'>" . $noteText . "</textarea>");
                ?>

                <input type="submit" value="Сохранить">

                <?php
                    if ($isEdit == true)
                    {
                        print("<p>" . $isEditResult . "</p>");
                    }
                ?>
            </form>

            <a href="./">На главную</a>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>

        <script src="js/editor.js"></script>
    </body>
</html>
