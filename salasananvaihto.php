<?php
require_once 'ohjaus.php';
require_once 'Kyselyt.php';
onko_kirjautunut(0);

if (!$kyselija->kirjaudu($sessio->id , $_POST['vanha'])){
    ohjaa('asetukset.php');
}
if ($_POST['uusi'] != $_POST['uudestaan'] || empty($_POST['uusi'])){
    ohjaa('asetukset.php');
}
if ($kyselija->vaihda_salasana($sessio->id , $_POST['uusi'])){
    ohjaa('index.php');
} else {
    ohjaa('asetukset.php');
}
?>
