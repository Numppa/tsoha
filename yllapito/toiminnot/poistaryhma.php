<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if ($kyselija->poista_ryhma($_POST['ryhman_id'])){
    ohjaa('../ryhmienmuokkaus.php');
} else {
    echo '<p>Ryhmän poistaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
