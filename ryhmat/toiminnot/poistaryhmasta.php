<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (!$kyselija->onko_pomo($sessio->id , $_POST['ryhman_id'])){
    ohjaa('../../index.php');
}

if ($kyselija->poista_ryhmasta($_POST['ryhman_id'] , $_POST['tunnus'])){
    ohjaa('../../index.php');
} else {
    ohjaa('../../index.php');
}
?>