<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (empty($_POST['tekstin_id'])){
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
if($kyselija->poista_aihe($_POST['tekstin_id'])){
    ohjaa('../../index.php');
} else {
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
