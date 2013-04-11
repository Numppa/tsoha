<?php

require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if (empty($_POST['tunnus']) || empty($_POST['rooli']) || empty($_POST['id'])) {
    ohjaa('../../index.php');
}
if($kyselija->kayttajan_jasenyys($_POST['tunnus'], $_POST['id'], $_POST['rooli'])) {
    ohjaa('../ryhmienmuokkaus.php');
} else {
    ohjaa('../../index.php');
}
?>
