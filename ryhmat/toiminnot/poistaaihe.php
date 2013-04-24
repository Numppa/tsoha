<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);
onko_pomo($sessio->id, $_POST['ryhman_id']);

if (empty($_POST['tekstin_id'])){
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
if($kyselija->poista_aihe($_POST['tekstin_id'])){
    ohjaa('../ryhmanakyma.php?ryhman_id=' . $_POST['ryhman_id']);
} else {
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
