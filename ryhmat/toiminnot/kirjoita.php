<?php
require_once '../../ohjaus.php';
require_once '../../Kyselyt.php';
onko_kirjautunut(0);

if (empty($_POST['aihe']) || empty($_POST['teksti'])){
echo '<p>Aiheen lisääminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}
if ($kyselija->kirjoita($_POST['ryhman_id'] , $sessio->id , 
        htmlspecialchars($_POST['aihe']) , htmlspecialchars($_POST['teksti']))){
    ohjaa('../ryhmanakyma.php?=ryhman_id=' . $_POST['ryhman_id']);
} else {
    echo '<p>Kirjoituksen lisääminen epäonnistui. <a href="/tsoha/index.php">alkuun</a></p>';
}

?>
