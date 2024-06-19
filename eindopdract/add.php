<?php

include_once "config.php";
$config = new Config();

if (isset($_POST["name"]) && isset($_POST["email"])) {
    $file = fopen('contacts.list', 'a+') or die("Bestand niet gevonden");    

    $add = $_POST["name"] . $config->itemDelimiter . $_POST["email"];

    if (filesize('contacts.list') > 0) {
        $add =  $config->contactDelimiter . $add;
    }

    if (fwrite($file, $add) === FALSE) {
        die();
    }
    fclose($file);

    header("Location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Contact toevoegen</h1>

        <form action="/add.php" method="post">
            Naam: <input type="text" name="name" /> <br/>
            Email: <input type="email" name="email" /> <br/>
            <button type="submit">Toevoegen</button>
        </form>
    </body>
</html>