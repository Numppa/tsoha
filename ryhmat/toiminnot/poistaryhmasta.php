<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (!$kyselija->onko_pomo($sessio->id , $_POST['ryhman_id'])){
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}

if ($kyselija->poista_ryhmasta($_POST['ryhman_id'] , $_POST['tunnus'])){
    ohjaa('../muokkaaryhmaa.php?ryhman_id=' . $_POST['ryhman_id']);
} else {
    echo '<p>Poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>