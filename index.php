<?php
    include "conf.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <header>
            <?php print($CONF["company"]); ?>
        </header>

        <footer>
            <?php print($CONF["copyright"]); ?>            
        </footer>
    </body>
</html>
