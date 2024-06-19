<?php

include_once "config.php";
$config = new Config();

$file = fopen('contacts.list', 'r') or die("Bestand niet gevonden");

$contacts = [];

$size = filesize("contacts.list");
if ($size > 0) {
    $contents = fread($file, $size);
    fclose($file);
    
    $contacts = explode($config->contactDelimiter, $contents);
}

?>

<!DOCTYPE html>
<html>
    <body>
        <h1>Contactenlijst</h1>
        <?php if (count($contacts) > 0): ?>
            <ul>
                <?php foreach ($contacts as $contact): ?>
                    <?php $item = explode($config->itemDelimiter, $contact); ?>
                    <li><? htmlspecialchars ($item[0] )?> - <a href="mailto:<? htmlspecialchars ($item[1]) ?>"><? htmlspecialchars ($item[1]) ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            Geen contacten in je lijst, klik <a href="/add.php">hier</a> om er een toe te voegen.
        <?php endif; ?>   
        
        <h2>Acties</h2>
        <a href="/add.php"><button>Nieuw contact aanmaken</button></a>
        <button type="submit" form="clear">Lijst legen</button>

        <form action="/clear.php" method="Post" id="clear">
            <input type="hidden" value="1" name="clear" />
        </form>
    </body>
</html>