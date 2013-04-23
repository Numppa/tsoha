<?php

require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if (empty($_POST['tunnus']) || empty($_POST['rooli']) || empty($_POST['id'])) {
echo '<p>Käyttäjän lisääminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
if($kyselija->kayttajan_jasenyys($_POST['tunnus'], $_POST['id'], $_POST['rooli'])) {
    ohjaa('../muokkaaryhmaa.php?id=' . $_POST['id']);
} else {
echo '<p>Käyttäjän lisääminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
