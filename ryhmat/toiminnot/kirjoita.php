<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (empty($_POST['aihe']) || empty($_POST['teksti'])){
    ohjaa('../../index.php');
}
if ($kyselija->kirjoita($_POST['ryhman_id'] , $sessio->id , $_POST['aihe'] , $_POST['teksti'])){
    ohjaa('../../index.php');
} else {
    echo 'jotain meni vikaan, kirjoitusta ei onnistuttu lisäämään';
}

?>
