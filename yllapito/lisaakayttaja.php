<?php
require_once '../ohjaus.php';
require_once '../Kyselyt.php';

onko_kirjautunut(1);

if ($_POST['salasana'] != $_POST['uudestaan'] || empty($_POST['salasana'])){
    ohjaa('uusikayttaja.php');
} else if ($_POST['rooli'] != 'admin' && $_POST['rooli'] != 'tavallinen') {
    ohjaa('uusikayttaja.php');
} else if (empty($_POST['tunnus']) || empty($_POST['nimi']) || empty($_POST['rooli'])) {
    ohjaa('uusikayttaja.php');
}
$nimi = $kyselija->hae_nimi($_POST['tunnus']);

if (!is_null($nimi)){
    ohjaa('uusikayttaja.php');
}

$lisays = $kyselija->luo_kayttaja($_POST['tunnus'] , $_POST['nimi'] , $_POST['salasana'] , $_POST['rooli']);
if ($lisays){ 
    ohjaa('../index.php');
} else {
    ohjaa('uusikayttaja.php');
}

?>
