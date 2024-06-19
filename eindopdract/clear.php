<?php



if (isset($_POST["clear"])) {
    file_put_contents('contacts.list', '');
    header("Location: ../index.php");
    exit();
}