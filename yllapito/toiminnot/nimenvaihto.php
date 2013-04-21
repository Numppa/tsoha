<?php

require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(1);

if ($kyselija->vaihda_ryhman_nimi($_POST['id'], $_POST['nimi'])) {
    ohjaa('../ryhmienmuokkaus.php');
} else {
    echo '<p>Nimen vaihtaminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
?>
