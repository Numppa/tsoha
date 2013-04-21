<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';

onko_kirjautunut(1);

if ($_POST['salasana'] != $_POST['uudestaan'] || empty($_POST['salasana'])){
echo '<p>Käyttäjän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
} else if ($_POST['rooli'] != 'admin' && $_POST['rooli'] != 'tavallinen') {
echo '<p>Käyttäjän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
} else if (empty($_POST['tunnus']) || empty($_POST['nimi']) || empty($_POST['rooli'])) {
echo '<p>Käyttäjän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
$nimi = $kyselija->hae_nimi($_POST['tunnus']);

if (!is_null($nimi)){
echo '<p>Käyttäjän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}

$lisays = $kyselija->luo_kayttaja($_POST['tunnus'] , $_POST['nimi'] , $_POST['salasana'] , $_POST['rooli']);
if ($lisays){ 
    ohjaa('../../index.php');
} else {
echo '<p>Käyttäjän luominen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}

?>
