<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (empty($_POST['tekstin_id'])){
    ohjaa('../../index.php');
}
if($kyselija->poista_aihe($_POST['tekstin_id'])){
    ohjaa('../../index.php');
} else {
    ohjaa('../../index.php');
}
?>
