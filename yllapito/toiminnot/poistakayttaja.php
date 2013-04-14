<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if ($kyselija->poista_kayttaja($_POST['tunnus'])) {
    ohjaa('../kayttajienmuokkaus.php');
} else {
    ohjaa('../../index.php');
}
?>
